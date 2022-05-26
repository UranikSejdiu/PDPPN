<?php
include('checkSession.php');
switch ($_POST["action"]) {

    case "fetchalldata":


        $output = array();
        $sql = "SELECT produktet.produktID, produktet.produkti, produktet.imazhi1, produktet.imazhi2, produktet.imazhi3, produktet.imazhi4, kategoria.kategoria, produktet.pershkrimi, produktet.qmimi, produktet.stoku, madhesit.madhesia, ngjyrat.ngjyra, produktet.kompaniaID
        FROM produktet
        LEFT OUTER JOIN kategoria ON produktet.kategoriaID=kategoria.kategoriaID 
        LEFT OUTER JOIN madhesit ON produktet.madhesiaID=madhesit.madhesiaID 
        LEFT OUTER JOIN ngjyrat ON produktet.ngjyraID=ngjyrat.ngjyraID
        WHERE  produktet.kompaniaID=$id";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);


        if (isset($_POST['search']['value'])) {
           $search_value = $_POST['search']['value'];
           $sql .= " AND produktet.produkti like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY produktet.produktID desc";
        }

        if ($_POST['length'] != -1) {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $sql .= " LIMIT  " . $start . ", " . $length;
        }
        $query = mysqli_query($con, $sql);
        $count_rows = mysqli_num_rows($query);
        $data = array();
        while ($row = mysqli_fetch_assoc($query)) {
           
            $sub_array = array();
            if ($row['madhesia'] == null) {
                $madhesia = '&#10005;';
            } else {
                $madhesia = $row['madhesia'];
            }
            if ($row['ngjyra'] == null) {
                $ngjyra = '&#10005;';
            } else {
                $ngjyra = $row['ngjyra'];
            }
            $sub_array[] = $row['produktID'];
            $sub_array[] = $row['produkti'];
            $sub_array[] = $row['imazhi1'];
            $sub_array[] = $row['imazhi2'];
            $sub_array[] = $row['imazhi3'];
            $sub_array[] = $row['imazhi4'];
            $sub_array[] = $row['kategoria'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none;">' . $row['pershkrimi'] . '</textarea>';
            $sub_array[] = $row['qmimi'].'€';
            $sub_array[] = $row['stoku'];
            $sub_array[] = $madhesia;
            $sub_array[] = $ngjyra;
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['produktID'] . '"  class="btn button-success btn-sm editbtnprd" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0);" data-id="' . $row['produktID'] . '"  class="btn button-danger btn-sm deleteBtn" >Fshi</a>';
            $data[] = $sub_array;
        }

        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $count_rows,
            'recordsFiltered' =>   $total_all_rows,
            'data' => $data,
        );
        echo  json_encode($output);

    break;

    case "addKompani":

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $kat = mysqli_real_escape_string($con, $_POST['kat']);
        $pershkrimi = mysqli_real_escape_string($con, $_POST['pershkrimi']);
        $qmimi = mysqli_real_escape_string($con, $_POST['qmimi']);
        $stok = mysqli_real_escape_string($con, $_POST['stok']);
        $madhesia = mysqli_real_escape_string($con, $_POST['madhesia']);
        $ngjyra = mysqli_real_escape_string($con, $_POST['ngjyra']);
        $kompania = mysqli_real_escape_string($con, $_POST['kompania']);

        if (isset($_FILES['logo'])) {
            $file_name = $_FILES['logo']['name'];
            $uniquename = time() . '-' . uniqid();
            $file_size = $_FILES['logo']['size'];
            $file_tmp = $_FILES['logo']['tmp_name'];
            $file_type = $_FILES['logo']['type'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");
            $filedestionation = "../images/kompani/" . $uniquename . '.' . $ext;
        }

        if  ($file_name && in_array($ext, $extensions) === false) {
            $data = array(
                'status' => 'logoFormat'
            );
            echo json_encode($data);
            return;
        } elseif ($file_size > 5097152) {
            $data = array(
                'status' => 'logoMB'
            );
            echo json_encode($data);
            return;
        } else {
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
            $status = "notverified";
            $code = rand(999999, 111111);
            $sql = "INSERT INTO kompanite (logo, name, nrfiskal, lokacioni, telefoni, email, password, code, status) values ('$filedestionation', '$name','$fiskal', '$lokacioni','$phone','$email','$hashPassword','$code','$status')";
            $insertData = mysqli_query($con, $sql);
            if ($insertData) {
                if (mail($email, $subject, $message, $sender)) {
                    move_uploaded_file($file_tmp, $filedestionation);
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
            }
        }
        break;

    case "updateKompani":
        $updateName = mysqli_real_escape_string($con,  $_POST['updateName']);
        $updateFiskal = mysqli_real_escape_string($con,  $_POST['updateFiskal']);
        $updateLokacioni = mysqli_real_escape_string($con,  $_POST['updateLokacioni']);
        $updatePhone = mysqli_real_escape_string($con,  $_POST['updatePhone']);
        $updateEmail = mysqli_real_escape_string($con,  $_POST['updateEmail']);
        $updatePassword = mysqli_real_escape_string($con,  $_POST['updatePassword']);
        $updateIdKomp = mysqli_real_escape_string($con,  $_POST['updateIdKomp']);

        if (isset($_FILES['updateLogo'])) {
            $file_name = $_FILES['updateLogo']['name'];
            $uniquename = time() . '-' . uniqid();
            $file_size = $_FILES['updateLogo']['size'];
            $file_tmp = $_FILES['updateLogo']['tmp_name'];
            $file_type = $_FILES['updateLogo']['type'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");
            $filedestionation = "../images/kompani/" . $uniquename . '.' . $ext;
        }


        $query1 = "SELECT * FROM kompanite WHERE id=$updateIdKomp LIMIT 1";
        $sql = mysqli_query($con, $query1);
        while ($row = $sql->fetch_assoc()) {
            $fjalekalimibackup = $row['password'];
            $emailbackup = $row['email'];
            $photoBackup = $row['logo'];
        }
        if ($updatePassword) {
            if ($updatePassword != $fjalekalimibackup) {
                if (strlen($updatePassword) <= '8') {
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
                $newPassword = $updatePassword;
            }
        }
        if ($updateEmail == $emailbackup) {
            $updateEmail = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM kompanite WHERE email='$updateEmail' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['email'] === $updateEmail) {
                $data = array('status' => 'emailError');
                echo json_encode($data);
                return;
            }
        }
        if (!empty($file_name)) {
            if ($file_name && in_array($ext, $extensions) === false) {
                $data = array(
                    'status' => 'logoFormat'
                );
                echo json_encode($data);
                return;
            } elseif ($file_size > 5097152) {
                $data = array(
                    'status' => 'logoMB'
                );
                echo json_encode($data);
                return;
            } else {
                $sql = "UPDATE kompanite SET logo = '$filedestionation' WHERE id = $updateIdKomp";
                unlink($photoBackup);
                move_uploaded_file($file_tmp, $filedestionation);
                mysqli_query($con, $sql);
            }
        }

        $sql = "UPDATE kompanite SET  name='$updateName' , nrfiskal= '$updateFiskal', lokacioni='$updateLokacioni', telefoni='$updatePhone', email='$updateEmail', password='$newPassword' WHERE id=$updateIdKomp";
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


    case "selMadhesia":
        $id = $_POST['id'];
        $madhesit = array();
        $sql = "SELECT * FROM  madhesit WHERE kategoriaID ='$id'";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $madhesiaID = $row['madhesiaID'];
            $madhesia = $row['madhesia'];

            $madhesit[] = array("madhesiaID" => $madhesiaID, "madhesia" => $madhesia);
        }
        // encoding array to json format
        echo json_encode($madhesit);
        break;

    case "selNgjyra":
        $id = $_POST['id'];
        $ngjyrat = array();
        $sql = "SELECT * FROM  ngjyrat WHERE kategoriaID ='$id'";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $ngjyraID = $row['ngjyraID'];
            $ngjyra = $row['ngjyra'];

            $ngjyrat[] = array("ngjyraID" => $ngjyraID, "ngjyra" => $ngjyra);
        }
        // encoding array to json format
        echo json_encode($ngjyrat);
        break;


    case "deleteKompani":

        break;
}
