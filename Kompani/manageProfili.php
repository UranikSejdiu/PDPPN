<?php
include('config.php');

switch ($_POST["action"]) {

    case "updateAdmin":
        $updateName = mysqli_real_escape_string($con,  $_POST['updateName']);
        $updateEmail = mysqli_real_escape_string($con,  $_POST['updateEmail']);
        $updateidadmin = mysqli_real_escape_string($con,  $_POST['updateidadmin']);
        $updatePassword = mysqli_real_escape_string($con,  $_POST['updatePassword']);
        $updateCpassword = mysqli_real_escape_string($con,  $_POST['updateCpassword']);

        $query = "SELECT * FROM admin WHERE id=$updateidadmin LIMIT 1";
        $sql = mysqli_query($con, $query);
        while ($row = $sql->fetch_assoc()) {
            $fjalekalimibackup = $row['password'];
            $emailbackup = $row['email'];
        }
        if ($updatePassword == $updateCpassword) {
                if (strlen($updatePassword) < '8') {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[0-9]+#", $updatePassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[A-Z]+#", $updatePassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[a-z]+#", $updatePassword)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                }
                $newPassword = password_hash($updatePassword, PASSWORD_BCRYPT);
            } else {
                $data = array(
                    'status' => 'passwordVerify'
                );
                echo json_encode($data);
                return;
            }
        
        if ($updateEmail == $emailbackup) {
            $updateEmail = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM admin WHERE email='$updateEmail' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $updateEmail) {
                $data = array('status' => 'emailError');
                echo json_encode($data);
                return;
            }
        }


        $sql = "UPDATE admin SET  name='$updateName' , email= '$updateEmail', password='$newPassword' WHERE id=$updateidadmin";
        $query = mysqli_query($con, $sql);
        if ($query == true) {

            $data = array(
                'status' => 'true',

            );

            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'false',

            );

            echo json_encode($data);
        }
    
        break;
    
    case "selectData":
        $hiddenID = $_POST['hiddenID'];
        $sql = "SELECT * FROM kompanite WHERE id='$hiddenID' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;
}
