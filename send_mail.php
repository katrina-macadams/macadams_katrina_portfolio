<?php
// connect to portfolio database
require_once('includes/connect.php');

// gather elements from the submitted form

$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$message = $_POST['message'];

// check form items for errors

$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$message = trim($message);
// trims special characters and stuff

// insert new row in the contacts table

$query = "INSERT INTO contact_form (id, fname, lname, email, message) VALUES (NULL,'".$fname."','".$lname."','".$email."','".$message."')";

mysqli_query($connect,$query);

header('Location: contact.php');

// format an email and email it to myself

?>