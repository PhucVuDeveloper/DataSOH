<?php
include "connect.php";
$page = $_POST['page'];
$total = 7;
$pos = ($page - 1) * $total;
$producttype = $_POST['ProductType'];
$query = 'SELECT * FROM `newproduct` WHERE `ProductType` = ' . $producttype . ' LIMIT ' . $pos . ',' . $total . '';
$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
       $result[] = ($row);
       // code....
}
if (!empty($result)) {
       $arr = [
              'success' => true,
              'message' => "thanh cong",
              'result' => $result
       ];
} else {
       $arr = [
              'success' => false,
              'message' => "khong thanh cong",
              'result' => $result
       ];
}
print_r(json_encode($arr));
