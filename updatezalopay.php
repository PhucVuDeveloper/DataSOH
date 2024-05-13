<?php
include "connect.php";
$token = $_POST['token'];
$idDon = $_POST['idDon'];
// check data email 
$query =  'UPDATE `dondatban` SET `zalo`= "'.$token.'" WHERE `idDon` =' . $idDon . '';
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
