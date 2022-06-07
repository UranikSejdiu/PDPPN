<?php
include('config.php');

switch ($_POST["action"]) {

    case "singleProduktData":
        $ID = $_POST['id'];
        $sql = "SELECT * FROM produktet WHERE produktID=$ID LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;

}
