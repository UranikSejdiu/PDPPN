<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$db = "pdppn";

$con = new mysqli($hostname, $username, $password, $db);

if ($con->connect_error) {
    die("Gabim ne lidhje: " .$con->connect_error);
}

?>