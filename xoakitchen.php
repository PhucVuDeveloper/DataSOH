<?php
include "connect.php";
$id = $_POST['IdKitchen'];

$query = 'DELETE FROM `kitchen` WHERE `IdKichen` = ' . $id;
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