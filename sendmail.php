<?php

require_once('includes/connect.php');

// Gather form data
$fname = trim($_POST['first_name']);
$lname = trim($_POST['last_name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

$errors = [];

// Validate the data
if (empty($lname)) {
    $errors['last_name'] = 'Last Name can\'t be empty';
}

if (empty($fname)) {
    $errors['first_name'] = 'First Name can\'t be empty';
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
    // Correct INSERT query with proper column names
    $query = "INSERT INTO contact_form (fname, lname, email, message) VALUES ('$fname', '$lname', '$email', '$message')";

    if (mysqli_query($connect, $query)) {
        // Send email
        $to = 'katrinamacadams@proton.me';
        $subject = 'Message from your Portfolio site!';
        $mail_body = "You have received a new contact form submission:\n\n";
        $mail_body .= "Name: $fname $lname\n";
        $mail_body .= "Email: $email\n\n";
        $mail_body .= "Message:\n$message\n";

        mail($to, $subject, $mail_body);

        // Redirect on success
        header('Location: index.php');
        exit();
    } else {
        echo 'Database error: ' . mysqli_error($connect);
    }
} else {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}

?>