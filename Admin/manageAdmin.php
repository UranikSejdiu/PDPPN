<?php
include('config.php');

switch ($_POST["action"]) {

    case "fetchalladmindata":

        $output = array();
        $sql = "SELECT * FROM admin";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " WHERE name like '" . $search_value . "%'";
            $sql .= " OR email like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY id desc";
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
            $sub_array[] = $row['id'];
            $sub_array[] = $row['name'];
            $sub_array[] = $row['email'];
            $sub_array[] = '<textarea style="overflow-y: auto;resize: none;border: none;">' . $row['password'] . '</textarea>';
            $sub_array[] = $row['status'];
            $sub_array[] = '<a href="javascript:void(0);" data-id="' . $row['id'] . '"  class="btn btn-success btn-sm editbtnadmin" >Ndrysho</a>';
            $sub_array[] =  '<a href="javascript:void(0);" data-id="' . $row['id'] . '"  class="btn btn-danger btn-sm deleteBtn" >Fshi</a>';
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

    case "addAdmin":
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $query = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);



        if (strlen($password) < '8') {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $data = array(
                'status' => 'passwordError'
            );
            echo json_encode($data);
            return;
        } elseif ($password != $cpassword) {
            $data = array(
                'status' => 'passwordVerify'
            );
            echo json_encode($data);
            return;
        } elseif ($fetch !== null) {
            $data = array(
                'status' => 'emailError'
            );
            echo json_encode($data);
            return;
        } else {
            $Fjalekalimi = password_hash($password, PASSWORD_BCRYPT);
            $status = "notverified";
            $code = "0";
            $sql = "INSERT INTO admin (name, email, password, code, status) values ('$name', '$email', '$Fjalekalimi', '$code', '$status')";
            $query = mysqli_query($con, $sql);
            $lastId = mysqli_insert_id($con);
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
        }
        break;

    case "updateAdmin":
        $update_emri = mysqli_real_escape_string($con,  $_POST['update_emri']);
        $update_email = mysqli_real_escape_string($con,  $_POST['update_email']);
        $updateidadmin = mysqli_real_escape_string($con,  $_POST['updateidadmin']);
        $password = mysqli_real_escape_string($con,  $_POST['update_password']);

        $query = "SELECT * FROM administratoret WHERE ID_admin=$updateidadmin LIMIT 1";
        $sql = mysqli_query($con, $query);
        while ($row = $sql->fetch_assoc()) {
            $fjalekalimibackup = $row['Fjalekalimi'];
            $emailbackup = $row['Email'];
        }
        if ($password) {
            if ($password != $fjalekalimibackup) {
                if (strlen($password) < '8') {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[0-9]+#", $password)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[A-Z]+#", $password)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                } elseif (!preg_match("#[a-z]+#", $password)) {
                    $data = array(
                        'status' => 'passwordError'
                    );
                    echo json_encode($data);
                    return;
                }
                $newPassword = MD5($password);
            } else {
                $newPassword = $password;
            }
        }
        if ($update_email == $emailbackup) {
            $update_email = $emailbackup;
        } else {
            $user_check_query = "SELECT * FROM administratoret WHERE Email='$update_email' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user['Email'] === $update_email) {
                $data = array('status' => 'emailError');
                echo json_encode($data);
                return;
            }
        }


        $sql = "UPDATE administratoret SET  EmriMbiemri='$update_emri' , Email= '$update_email', Fjalekalimi='$newPassword',date_created=CURRENT_TIMESTAMP WHERE ID_admin=$updateidadmin";
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

    case "singleAdminData":
        $id_admin = $_POST['id_admin'];
        $sql = "SELECT * FROM administratoret WHERE ID_admin='$id_admin' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
        break;

    case "deleteAdmin":
        $id_admin = $_POST['id_admin'];
        $sql = "DELETE FROM administratoret WHERE ID_admin=$id_admin";
        $delQuery = mysqli_query($con, $sql);
        if ($delQuery == true) {
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
