<?php
require_once('includes/connect.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Gather form data
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

$errors = [];

// Validate the data
if (empty($lname)) {
    $errors[] = 'Last Name can\'t be empty';
}

if (empty($fname)) {
    $errors[] = 'First Name can\'t be empty';
}

if (empty($message)) {
    $errors[] = 'Message field can\'t be empty';
}

if (empty($email)) {
    $errors[] = 'You must provide an email';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'You must provide a valid email';
}

if (empty($errors)) {
    $query = "INSERT INTO contact_form (fname, lname, email, message) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $fname, PDO::PARAM_STR);
    $stmt->bindParam(2, $lname, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $message, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Send email
        $to = 'katrinamacadams@proton.me';
        $subject = 'New Contact Form Submission';
        $email_message = 
        "First Name: " . $fname . "\n" .
        "Last Name: " . $lname . "\n" .
        "Email: " . $email . "\n" .
        "Message: " . $message;

        $headers = 'From: ' . $email;

        mail($to, $subject, $email_message, $headers);

        echo json_encode(["message" => "Form submitted successfully."]);
    } else {
        echo json_encode(["errors" => ["Failed to save your message. Please try again later."]]);
    }
} else {
    echo json_encode(["errors" => $errors]);
}
?>