<?php
include "connect.php";
$id = $_POST['idDon'];

$query = 'DELETE FROM `dondatban` WHERE `idDon` = ' . $id;
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
