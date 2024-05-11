<?php
include "connect.php";
$email = $_POST['Email'];
$password = $_POST['Password']; 
$username = $_POST['UserName'];
$mobile = $_POST['Mobile'];
// check data sdt 
$query =  'SELECT * FROM `user` WHERE `Email`= "' . $email . '"';
$data = mysqli_query($conn, $query);
$numrow = mysqli_num_rows($data);
if ($numrow > 0) {
       $arr = [
              'success' => false,
              'message' => "Email da ton tai",

       ];
} else {
       // insert tài khoản 
       $query = 'INSERT INTO `user`(`email`,`password`,`username`, `mobile`) VALUES ("' . $email . '","' . $password . '","' . $username . '","' . $mobile . '")';
       $data = mysqli_query($conn, $query);
       if ($data == true) {
              $arr = [
                     'success' => true,
                     'message' => "thanh cong",

              ];
       } else {
              $arr = [
                     'success' => false,
                     'message' => "khong thanh cong",
              ];
       }
}


print_r(json_encode($arr));
