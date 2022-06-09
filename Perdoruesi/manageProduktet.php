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

    case "addReview":
        if (isset($_POST["rating_data"])) {
            $userName = $_POST['userName'];
            $user_ratig = $_POST['rating_data'];
            $user_review = $_POST['userReview'];
            $prodID  = $_POST['prodID'];
            $datetime = time();


            $sql = "INSERT INTO produktreview (perdoruesi,starRating,reviewText,datetime,produktID) VALUES ('$userName','$user_ratig', '$user_review', '$datetime','$prodID')";

            $query = mysqli_query($con, $sql);
            if ($query == true) {

                $data = array(
                    'status' => 'true'
                );
                echo json_encode($data);
            } else {
                $data = array(
                    'status' => 'false'
                );
                echo json_encode($data);
            }
        }else {
            $data = array(
                'status' => 'false'
            );
            echo json_encode($data);
        }
        break;
}
