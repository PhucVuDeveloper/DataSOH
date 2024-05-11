<?php
include "connect.php";
$tensp = $_POST['ProductName'];
$hinhanh = $_POST['Image'];
$loai = $_POST['ProductType'];
$mota = $_POST['ProductNote'];
$gia = $_POST['ProductPrice'];
// 
$query =  'INSERT INTO `newproduct`(`ProductName`, `Image`, `ProductType`, `ProductNote`, `ProductPrice`) VALUES ("' . $tensp . '","' . $hinhanh . '","' . $loai . '","' . $mota . '", ' . $gia . ')';
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
