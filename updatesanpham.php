<?php
include "connect.php";
$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$hinhanh = $_POST['hinhanh'];
$mota = $_POST['mota'];
$loai = $_POST['loai'];
$id = $_POST['id'];
$sl = $_POST['slsp'];
// check data email 
$query =  'UPDATE `sanphammoi` SET `tensp`="' . $tensp . '", `sltonkho`='.$sl.' , `gia`="' . $gia . '",`hinhanh`="' . $hinhanh . '",`mota`="' . $mota . '",`loai`=' . $loai . ' WHERE `id` = ' . $id . '';
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
