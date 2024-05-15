<?php
include "connect.php";
$tenban = $_POST['TableNum'];
$trangthai = $_POST['TableStatus'];
$tang = $_POST['Floor'];
$id = $_POST['IdTable'];
// check data email 
$query =  'UPDATE `tablenumber` SET `TableNum`="' . $tenban . '", `TableStatus`='.$trangthai.' , `Floor`=' . $tang . ' WHERE `IdTable` = ' . $id . '';
$data = mysqli_query($conn, $query);
if ($data == true) {
       $arr = [
              'success' => true,
              'message' => "Thanh cong",

       ];
} else {
       $arr = [
              'success' => false,
              'message' => "Khong thanh cong",
       ];
}
print_r(json_encode($arr));