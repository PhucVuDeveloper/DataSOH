<?php
include "connect.php";
$productname = $_POST['ProductName'];
$productprice = $_POST['ProductPrice'];
$image = $_POST['Image'];
$producttype = $_POST['ProductType'];
$productquantity = $_POST['ProductQuantity'];
$productstatus = $_POST['ProductStatus'];
// check data email 
$query =  'INSERT INTO `product`(`ProductName`, `ProductPrice`, `Image`, `ProductType`, `ProductQuantity`, `ProductStatus`) VALUES ("' . $productname . '","' . $productprice . '","' . $image . '","' . $producttype . '",' . $productquantity . ','.$productstatus.')';
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