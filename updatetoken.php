<?php
include "connect.php";
$Token = $_POST['Token'];
$idUser = $_POST['idUser'];
// check data email 
$query =  'UPDATE `user` SET `Token`="' . $Token . '" WHERE `idUser` =' . $idUser . '';
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
