<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchalldata":

        $output = array();
        $sql = "SELECT * FROM kompanite";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE Emri like '" . $search_value . "%'";
            $sql .= " OR NumriFiskal like '" . $search_value . "%'";
            $sql .= " OR Email like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY ID_kompania desc";
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
            $sub_array[] = $row['ID_kompania'];
            $sub_array[] = '<img width="50" height="50" src="' . $row['Logo'] . '" alt="#" style="object-fit: cover; object-position:center;">';
            $sub_array[] = $row['Emri'];
            $sub_array[] = $row['NumriFiskal'];
            $sub_array[] = $row['Lokacioni'];
            $sub_array[] = $row['Telefoni'];
            $sub_array[] = $row['Email'];
            $sub_array[] = '<textarea style="overflow-y: auto;resize: none;border: none;">' . $row['Fjalekalimi'] . '</textarea>';
            $sub_array[] = $row['date_created'];
            $sub_array[] = '<a href="javascript:void(0)" data-id="' . $row['ID_kompania'] . '"  class="btn btn-success btn-sm editBtnKomp" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0)" data-id="' . $row['ID_kompania'] . '"  class="btn btn-danger btn-sm deleteBtnKomp" >Fshi</a>';
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

        $kompania_add = mysqli_real_escape_string($con, $_POST['kompania_add']);
        $fiskal_add = mysqli_real_escape_string($con, $_POST['fiskal_add']);
        $lokacioni_add = mysqli_real_escape_string($con, $_POST['lokacioni_add']);
        $tel_add = mysqli_real_escape_string($con, $_POST['tel_add']);
        $email_add = mysqli_real_escape_string($con, $_POST['email_add']);
        $pass_add = mysqli_real_escape_string($con, $_POST['pass_add']);

        $query = "SELECT * FROM kompanite WHERE Email='$email_add' LIMIT 1";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);


        if (isset($_FILES['logo_add'])) {
            $file_name = $_FILES['logo_add']['name'];
            $uniquename = time() . '-' . uniqid();
            $file_size = $_FILES['logo_add']['size'];
            $file_tmp = $_FILES['logo_add']['tmp_name'];
            $file_type = $_FILES['logo_add']['type'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");
            $filedestionation = "img/kompanite/" . $uniquename . '.' . $ext;
        }

        if (strlen($pass_add) < '8') {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[0-9]+#", $pass_add)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[A-Z]+#", $pass_add)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[a-z]+#", $pass_add)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif ($fetch !== null) {
            $data = array(
                'status' => 'emailError'
            );
            echo json_encode($data);
            return;
        } elseif (strlen($fiskal_add) < '8') {
            $data = array(
                'status' => 'nrFError'
            );
            echo json_encode($data);
            return;
        } elseif ($file_name && in_array($ext, $extensions) === false) {
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
            $pass_addMD5 = MD5($pass_add);
            $sql = "INSERT INTO kompanite (Logo,Emri,NumriFiskal,Lokacioni,Telefoni,Email,Fjalekalimi,date_created) values ('$filedestionation', '$kompania_add','$fiskal_add', '$lokacioni_add','$tel_add','$email_add','$pass_addMD5',CURRENT_TIMESTAMP)";
            $query = mysqli_query($con, $sql);
            $lastId = mysqli_insert_id($con);
            if ($query == true) {
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
        break;

    case "updateKompani":
        $kompania_update = mysqli_real_escape_string($con,  $_POST['kompania_update']);
        $fiskal_update = mysqli_real_escape_string($con,  $_POST['fiskal_update']);
        $lokacioni_update = mysqli_real_escape_string($con,  $_POST['lokacioni_update']);
        $tel_update = mysqli_real_escape_string($con,  $_POST['tel_update']);
        $email_update = mysqli_real_escape_string($con,  $_POST['email_update']);
        $pass_update = mysqli_real_escape_string($con,  $_POST['pass_update']);
        $updateIdKomp = mysqli_real_escape_string($con,  $_POST['updateIdKomp']);

        if (isset($_FILES['logo_update'])) {
            $file_name = $_FILES['logo_update']['name'];
            $uniquename = time() . '-' . uniqid();
            $file_size = $_FILES['logo_update']['size'];
            $file_tmp = $_FILES['logo_update']['tmp_name'];
            $file_type = $_FILES['logo_update']['type'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");
            $filedestionation = "img/kompanite/" . $uniquename . '.' . $ext;
        }


        $query1 = "SELECT * FROM kompanite WHERE ID_kompania=$updateIdKomp LIMIT 1";
        $sql = mysqli_query($con, $query1);
        while ($row = $sql->fetch_assoc()) {
            $fjalekalimibackup = $row['Fjalekalimi'];
            $emailbackup = $row['Email'];
            $photoBackup = $row['Logo'];
        }
        if ($pass_update) {
            if ($pass_update != $fjalekalimibackup) {
                if (strlen($password) <= '8') {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[0-9]+#", $pass_update)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[A-Z]+#", $pass_update)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[a-z]+#", $pass_update)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                }
                $newPassword = MD5($pass_update);
            } else {
                $newPassword = $pass_update;
            }
        }
        if ($email_update == $emailbackup) {
            $email_update = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM kompanite WHERE Email='$email_update' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['Email'] === $email_update) {
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
                $sql = "UPDATE kompanite SET Logo = '$filedestionation' WHERE ID_kompania = $updateIdKomp";
                unlink($photoBackup);
                move_uploaded_file($file_tmp, $filedestionation);
                mysqli_query($con, $sql);
            }
        }

        $sql = "UPDATE kompanite SET  Emri='$kompania_update' , NumriFiskal= '$fiskal_update', Lokacioni='$lokacioni_update', Telefoni='$tel_update', Email='$email_update', Fjalekalimi='$newPassword',date_created=CURRENT_TIMESTAMP WHERE ID_kompania=$updateIdKomp";
        $query = mysqli_query($con, $sql);
        $lastId = mysqli_insert_id($con);
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

    case "singleKompaniData":
        $id_kompania = $_POST['id_kompania'];
        $sql = "SELECT * FROM  kompanite WHERE ID_kompania='$id_kompania' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;


    case "deleteKompani":
        $id_kompania = $_POST['id_kompania'];

        $sql1 = "SELECT Logo FROM kompanite WHERE ID_kompania='$id_kompania' LIMIT 1";
        $query = mysqli_query($con, $sql1);
        while ($row = mysqli_fetch_assoc($query)) {
            $nameoffile = $row['Logo'];
        }



        $sql = "DELETE FROM kompanite WHERE ID_kompania=$id_kompania";
        $delQuery = mysqli_query($con, $sql);
        if ($delQuery == true) {
            unlink($nameoffile);
            $data = array(
                'status' => 'success',

            );

            echo json_encode($data);
        } else {
            $data = array(
                'status' => 'failed',

            );

            echo json_encode($data);
        }
        break;
}