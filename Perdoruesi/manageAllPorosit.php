<?php
include('checkSession.php');
switch ($_POST["action"]) {

    case "fetchalldata":


        $output = array();
        $sql = "SELECT porosit.porosiaID, produktet.produkti, produktet.imazhi1, porosit.qyteti, porosit.adresa, porosit.zipCode, porosit.mesazhi, porosit.menyraPageses, produktet.qmimi, porosit.sasia, porosit.pagesa, porosit.statusi
        FROM porosit
        JOIN produktet ON produktet.produktID=porosit.produktID
        WHERE  porosit.perdoruesID=$id";

        $totalQuery = mysqli_query($con, $sql);
        $total_all_rows = mysqli_num_rows($totalQuery);

/*
        if (isset($_POST['search']['value'])) {
            $search_value = $_POST['search']['value'];
            $sql .= " AND produktet.produkti like '" . $search_value . "%'";
        }

        if (isset($_POST['order'])) {
            $column_name = $_POST['order'][0]['column'];
            $order = $_POST['order'][0]['dir'];
            $sql .= " ORDER BY " . $column_name . " " . $order . "";
        } else {
            $sql .= " ORDER BY porosit.porosiaID desc";
        }
*/
        if ($_POST['length'] != -1) {
            $start = $_POST['start'];
            $length = $_POST['length'];
            $sql .= " LIMIT  " . $start . ", " . $length;
        }
        $query = mysqli_query($con, $sql);
        $count_rows = mysqli_num_rows($query);
        $data = array();
        while ($row = mysqli_fetch_assoc($query)) {

           
            $sub_array[] = $row['porosiaID'];
            $sub_array[] = $row['produkti'];
            $sub_array[] = '<img width="120" height="85" style="padding:2px;" src="' . $row['imazhi1'] . '">';
            $sub_array[] = $row['qmimi'] . '€';
            $sub_array[] = $row['sasia'];
            $sub_array[] = $row['pagesa'];
            $sub_array[] = $row['menyraPageses'];
            $sub_array[] = '<textarea disabled style="overflow-y: auto;resize: none;border: none;width:fit-content;">' . $row['mesazhi'] . '</textarea>';
            $sub_array[] = $row['qyteti'];
            $sub_array[] = $row['adresa'];
            $sub_array[] = $row['zipCode'];
            $sub_array[] = $row['statusi'];
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

    }
