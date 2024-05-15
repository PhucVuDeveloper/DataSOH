<?php
include "connect.php";
$idUser = $_POST['idUser'];
$Status = $_POST['Status']
// check data email 
$query = "UPDATE `user` SET `Status` = $Status WHERE `idUser` = $idUser";
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