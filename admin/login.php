<?php
session_start();

require_once('../includes/connect.php');
$query = 'SELECT * FROM users WHERE username=? AND password=?';
$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['username'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['password'], PDO::PARAM_STR);
$stmt->execute();

// if successful, bring back one row

// if not successful, bring back no rows

if ($stmt->rowCount() == 1) {
    // success stuff
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['username'] = $row['username'];
header('Location: project_list.php');

}else{ 
    header('Location: login_form.php');
    // go back to the login form, try again
}



$stmt = null;
?>