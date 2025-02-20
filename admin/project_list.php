<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login_form.php');
}
require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT id,name,description,image_url FROM projects ORDER BY name ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '<p class="project-list">'.
  $row['name'].
  '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.

  '<a href="delete_project.php?id='.$row['id'].'">delete</a></p>';
}

$stmt = null;

?>
<br><br><br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="name">project name: </label>
    <input name="name" type="text" required><br><br>
    <label for="tagline">project tagline: </label>
    <input name="tagline" type="text" required><br><br>
    <label for="desc">project description: </label>
    <textarea name="desc" required></textarea><br><br>
    <label for="img_url">project image: </label>
    <input name="img_url" type="file" required><br><br>
    <label for="date">project comepletion date: </label>
    <input name="date" type="text" required><br><br>
    <label for="service_id">service id: </label>
    <input name="service_id" type="text" required><br><br>
    <input name="submit" type="submit" value="Add">
</form>
<br><br><br>
<a href="logout.php">log out</a>
</body>
</html>
