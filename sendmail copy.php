<?php

require_once('includes/connect.php');

// Gather form data
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

$errors = [];

// Validate the data
if (empty($lname)) {
    $errors['lname'] = 'Last Name can\'t be empty';
}

if (empty($fname)) {
    $errors['fname'] = 'First Name can\'t be empty';
}

if (empty($message)) {
    $errors['message'] = 'Message field can\'t be empty';
}

if (empty($email)) {
    $errors['email'] = 'You must provide an email';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a valid email';
}

if (empty($errors)) {

    $query = "INSERT INTO contact_form (fname,lname,email, message) 
    VALUES (?,?,?,?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1,$_POST['fname'], PDO::PARAM_STR);
    $stmt->bindParam(2,$_POST['lname'], PDO::PARAM_STR);
    $stmt->bindParam(3,$_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(4,$_POST['message'], PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Send email
        $to = 'katrinamacadams@proton.me';
        $subject = 'New Contact Form Submission';
        $message = 
        "First Name: " . $_POST['fname'] . "\n" .
        "Last Name: " . $_POST['lname'] . "\n" .
        "Email: " . $_POST['email'] . "\n" .
        "Message: " . $_POST['message'];

        $headers = 'From: ' . $_POST['email'];

        mail($to, $subject, $message, $headers);

        header('Location: index.php');
        exit;
    } else {
        $errors['database'] = 'Failed to save your message. Please try again later.';
    }

    $stmt = null;
}

