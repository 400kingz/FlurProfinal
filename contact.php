<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // collect form data
    $name = $_POST['cf_name'];
    $email = $_POST['cf_email'];
    $message = $_POST['cf_message'];

    // validate form data
    if (empty($name) || empty($email) || empty($message)) {
        echo 'Please fill out all fields';
        exit;
    }

    // send the email
    $to = 'hello@flur.pro';
    $subject = 'New Contact Form Submission';
    $body = "From: $name\nEmail: $email\nMessage:\n$message";
    mail($to, $subject, $body);

    echo 'Thank you for your message';
    exit;
}

?>
