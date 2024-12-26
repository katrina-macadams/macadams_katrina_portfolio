<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');

// Get the project name from the URL
$project_name = mysqli_real_escape_string($connect, $_GET['name']);

// Fetch project details from the database
$query = "SELECT * FROM projects 
          JOIN media ON projects.id = media.project_id 
          WHERE projects.name = '$project_name'";

$results = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($results);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/casestudy.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <title>Case Study</title>
</head>
<body>
 <!-- HEADER -->
 <header id="main-header" class="grid-con">
 <a href="index.php">
    <img id="logo" class="col-span-1" src="images/invert_logo.svg" alt="girl sitting on moon looking at star icon">
</a>
        <nav id="main-nav" class="grid-con col-start-4 m-col-start-6 m-col-span-full">
            <label id="checkbox" class="grid-con col-start-2">
                <input type="checkbox" id="toggleCheckbox">
                <svg width="60" height="60" viewBox="0 0 100 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG content -->
                </svg>
            </label>
        </nav>
    </header>

    <main>
        <section id="project-details" class="grid-con">
            <h1 class="col-span-full"><?php echo htmlspecialchars($row['name']); ?></h1>
            <p class="col-span-full"><?php echo htmlspecialchars($row['description']); ?></p>
            <div class="col-span-full">
                <img src="images/<?php echo $row['filename'] . $row['filetype']; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
            </div>
        </section>
    </main>
</body>
</html>