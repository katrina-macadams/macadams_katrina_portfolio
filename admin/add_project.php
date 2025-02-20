<?php
require_once('../includes/connect.php');

// Generate random name for image
$random = rand(10000,99999);
$newname = 'image'.$random;

// Get and check file type
$filetype = strtolower(pathinfo($_FILES['img_url']['name'], PATHINFO_EXTENSION));
if($filetype == 'jpeg') {
    $filetype = 'jpg';
}
if($filetype == 'exe') {
    exit('nice try');
}

// Create complete filename
$newname .= '.'.$filetype;
$target_file = '../images/'.$newname;

// Only proceed with database operations if file upload is successful
if(move_uploaded_file($_FILES['img_url']['tmp_name'], $target_file)) {
    // First insert into projects table
    $query = "INSERT INTO projects (name,tagline,description,image_url,date,service_id) VALUES (?,?,?,?,?,?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(2, $_POST['tagline'], PDO::PARAM_STR);
    $stmt->bindParam(3, $_POST['desc'], PDO::PARAM_STR);
    $stmt->bindParam(4, $newname, PDO::PARAM_STR);
    $stmt->bindParam(5, $_POST['date'], PDO::PARAM_STR);
    $stmt->bindParam(6, $_POST['service_id'], PDO::PARAM_STR);
    $stmt->execute();
    
    $lastid = $connection->lastInsertId();
    $stmt = null;

if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['img_url']['tmp_name']);
    if($check !== false) {
        echo 'File is an image - ' . $check['mime'] . '.';
        $uploadOk = 1;
    } else {
        echo 'File is not an image.';
        $uploadOk = 0;
    }
}

// Additional validation checks
if (file_exists($target_file)) {
    echo 'Sorry, file already exists.';
    $uploadOk = 0;
}

if ($_FILES['img_url']['size'] > 500000) { // 500KB limit
    echo 'Sorry, your file is too large.';
    $uploadOk = 0;
}

if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'
&& $imageFileType != 'gif' ) {
    echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    $uploadOk = 0;
} else {
}

if ($uploadOk == 0) {
    echo 'Sorry, your file was not img_url.';
} else {
    if (move_img_url_file($_FILES['img_url']['tmp_name'], $target_file)) {
        echo 'The file '.$target_file.' has been img_url.';
    } else {
        echo 'Sorry, there was an error uploading your file.';
    }
}
$mediaQuery = "INSERT INTO media (project_id, filename, filetype) VALUES (?,?,?)";
$stmt = $connection->prepare($mediaQuery);
$stmt->bindParam(1, $lastid, PDO::PARAM_INT);
$stmt->bindParam(2, $newname, PDO::PARAM_STR);
$stmt->bindParam(3, $filetype, PDO::PARAM_STR);
$stmt->execute();
$stmt = null;

header('Location: project_list.php');
exit();  
}
?>