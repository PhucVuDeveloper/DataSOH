<?php
include "connect.php";
$id = $_POST['IdCashier'];

$query = 'DELETE FROM `cashier` WHERE `IdCashier` = ' . $id;
$data = mysqli_query($conn, $query);

if ($data == true) {
       $arr = [
              'success' => true,
              'message' => "Thành công"
       ];
} else {
       $arr = [
              'success' => false,
              'message' => "Không thành công"
       ];
}

print_r(json_encode($arr));