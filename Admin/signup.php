<?php

  // Include database connection file

  include_once('config.php');


  if (isset($_POST['email'])) {
    
    $name   = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $password  = $con->real_escape_string($_POST['password']);

    $otp    = mt_rand(1111, 9999);

    $query  = "INSERT INTO admin (name,email,password,otp) VALUES ('$name','$email','$password','$otp')";
    $result = $con->query($query);

    if ($result) {
        echo "yes";
    }else{
        echo "no";
    }   

  }
  
  

?>