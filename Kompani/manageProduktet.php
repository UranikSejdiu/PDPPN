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
            if ($row['madhesia'] == '0') {
                $madhesia = '&#10005;';
            } else {
                $madhesia = $row['madhesia'];
            }
            if ($row['ngjyra'] == '0') {
                $ngjyra = '&#10005;';
            } else {
                $ngjyra = $row['ngjyra'];
            }
            $sub_array[] = $row['produktID'];
            $sub_array[] = $row['produkti'];
            $sub_array[] = '<img width="120" height="120" style="padding:2px;" src="'. $row['imazhi1'] .'">';
            $sub_array[] = '<img width="120" height="120" style="padding:2px;" src="'. $row['imazhi2'] .'">';
            $sub_array[] = '<img width="120" height="120" style="padding:2px;" src="'. $row['imazhi3'] .'">';
            $sub_array[] = '<img width="120" height="120" style="padding:2px;" src="'. $row['imazhi4'] .'">';
            $sub_array[] = $row['kategoria'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none;">' . $row['pershkrimi'] . '</textarea>';
            $sub_array[] = $row['qmimi'] . '€';
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

    case "addProdukt":

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $kat = mysqli_real_escape_string($con, $_POST['kat']);
        $pershkrimi = mysqli_real_escape_string($con, $_POST['pershkrimi']);
        $qmimi = mysqli_real_escape_string($con, $_POST['qmimi']);
        $stok = mysqli_real_escape_string($con, $_POST['stok']);
        $madhesia = mysqli_real_escape_string($con, $_POST['madhesia']);
        $ngjyra = mysqli_real_escape_string($con, $_POST['ngjyra']);
        $kompania = mysqli_real_escape_string($con, $_POST['kompania']);

        if (isset($_FILES['image1'])) {
            $file_name1 = $_FILES['image1']['name'];
            $uniquename1 = time() . '-' . uniqid();
            $file_size1 = $_FILES['image1']['size'];
            $file_tmp1 = $_FILES['image1']['tmp_name'];
            $file_type1 = $_FILES['image1']['type'];
            $ext1 = pathinfo($file_name1, PATHINFO_EXTENSION);
            $extensions1 = array("jpeg", "jpg", "png");
            $filedestionation1 = "../images/produktet/" . $uniquename1 . '.' . $ext1;
        }
        if (isset($_FILES['image2'])) {
            $file_name2 = $_FILES['image2']['name'];
            $uniquename2 = time() . '-' . uniqid();
            $file_size2 = $_FILES['image2']['size'];
            $file_tmp2 = $_FILES['image2']['tmp_name'];
            $file_type2 = $_FILES['image2']['type'];
            $ext2 = pathinfo($file_name2, PATHINFO_EXTENSION);
            $extensions2 = array("jpeg", "jpg", "png");
            $filedestionation2 = "../images/produktet/" . $uniquename2 . '.' . $ext2;
        }

        if (isset($_FILES['image3'])) {
            $file_name3 = $_FILES['image3']['name'];
            $uniquename3 = time() . '-' . uniqid();
            $file_size3 = $_FILES['image3']['size'];
            $file_tmp3 = $_FILES['image3']['tmp_name'];
            $file_type3 = $_FILES['image3']['type'];
            $ext3 = pathinfo($file_name3, PATHINFO_EXTENSION);
            $extensions3 = array("jpeg", "jpg", "png");
            $filedestionation3 = "../images/produktet/" . $uniquename3 . '.' . $ext3;
        }else

        if (isset($_FILES['image4'])) {
            $file_name4 = $_FILES['image4']['name'];
            $uniquename4 = time() . '-' . uniqid();
            $file_size4 = $_FILES['image4']['size'];
            $file_tmp4 = $_FILES['image4']['tmp_name'];
            $file_type4 = $_FILES['image4']['type'];
            $ext4 = pathinfo($file_name4, PATHINFO_EXTENSION);
            $extensions4 = array("jpeg", "jpg", "png");
            $filedestionation4 = "../images/produktet/" . $uniquename4 . '.' . $ext4;
        }

        if ($file_name1 && in_array($ext1, $extensions1) === false || $file_name2 && in_array($ext2, $extensions2) === false || $file_name3 && in_array($ext3, $extensions3) === false || $file_name4 && in_array($ext4, $extensions4) === false) {
            $data = array(
                'status' => 'logoFormat'
            );
            echo json_encode($data);
            return;
        } elseif ($file_size1 > 5097152 || $file_size2 > 5097152 || $file_size3 > 5097152 || $file_size4 > 5097152) {
            $data = array(
                'status' => 'logoMB'
            );
            echo json_encode($data);
            return;
        } else {

            $sql = "INSERT INTO produktet (produkti, imazhi1, imazhi2, imazhi3, imazhi4, kategoriaID, pershkrimi, qmimi, stoku, madhesiaID, ngjyraID, kompaniaID) values ('$name', '$filedestionation1', '$filedestionation2','$filedestionation3', '$filedestionation4', '$kat', '$pershkrimi', '$qmimi', '$stok', '$madhesia', '$ngjyra', '$kompania')";
            $query = mysqli_query($con, $sql);
            if ($query) {
                move_uploaded_file($file_tmp1, $filedestionation1);
                move_uploaded_file($file_tmp2, $filedestionation2);
                move_uploaded_file($file_tmp3, $filedestionation3);
                move_uploaded_file($file_tmp4, $filedestionation4);
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
