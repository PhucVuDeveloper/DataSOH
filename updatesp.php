<?php
include "connect.php";
$tensp = $_POST['ProductName'];
$gia = $_POST['ProductPrice'];
$hinhanh = $_POST['Image'];
$loai = $_POST['ProductType'];
$sl = $_POST['ProductQuantity'];
$trangthai = $_POST['ProductStatus'];
$id = $_POST['IdProduct'];
// check data email 
$query =  'UPDATE `product` SET `ProductName`="' . $tensp . '", `ProductQuantity`='.$sl.' , `ProductPrice`="' . $gia . '",`Image`="' . $hinhanh . '",`ProductStatus`="' . $trangthai . '",`ProductType`=' . $loai . ' WHERE `IdProduct` = ' . $id . '';
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
