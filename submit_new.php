<?php
include "connect.php";
if(isset($_POST['submit_password']) && $_POST['Email'])
{
  $email=$_POST['Email'];
  $pass=$_POST['PassWord'];

  $query = "update user set PassWord='$pass' where Email='$email'";
  $data = mysqli_query($conn, $query);

  if($data==true){
    echo "Thanh cong";
  }

}
