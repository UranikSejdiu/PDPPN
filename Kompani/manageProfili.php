<?php
include('checkSession.php');

if (isset($_POST['ruaj'])) {
    $updateName = mysqli_real_escape_string($con,  $_POST['updateName']);
    $updateFiskal = mysqli_real_escape_string($con,  $_POST['updateFiskal']);
    $updateLokacioni = mysqli_real_escape_string($con,  $_POST['updateLokacioni']);
    $updatePhone = mysqli_real_escape_string($con,  $_POST['updatePhone']);
    $updateEmail = mysqli_real_escape_string($con,  $_POST['updateEmail']);
    $updatePassword = mysqli_real_escape_string($con,  $_POST['updatePassword']);
    $updateIdKomp = mysqli_real_escape_string($con,  $_POST['updateIdKomp']);



    header("Location: profile.php?ID=$updateIdKomp");
}







?>
