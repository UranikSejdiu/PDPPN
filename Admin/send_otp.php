<?php

// Start session   
session_start();

// Include database connection file

include_once('config.php');

// Send OTP to email Form post
if (isset($_POST['email'])) {

    $email  = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $query  = "SELECT * FROM admin WHERE email = '$email'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        sendMail($email, $otp);
        $_SESSION['email'] = $email;
        echo "yes";
    } else {
        echo "no";
    }
}
// Create function for send email

function sendMail($to, $msg)
{
    $body = "You'r verification code is: ".$msg;
    $subject = "PDPPN Email Verification";
    if (mail($to, $subject, $body)) {
        return true;
    } else {
        return false;
    }
}
