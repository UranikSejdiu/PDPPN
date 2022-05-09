<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$db = "pdppn";

$con = mysqli_connect($hostname, $username, $password, $db);

if ($con->connect_error) {
    die("Gabim ne lidhje: " .$con->connect_error);
}

$con1 = mysqli_connect($hostname, $username, $password, $db);

if ($con->connect_error) {
    die("Gabim ne lidhje: " .$con->connect_error);
}
?>