<?php
include "connect.php";
$email = $_POST['Email'];
$password = $_POST['PassWord'];

$query = 'SELECT * FROM `user` WHERE `Email`="'.$email.'" AND `PassWord` = "'.$password.'"';
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
}else{
	$arr = [
		'success' => false,
		'message' => "khong thanh cong",
		'result' => $result
	];
}
print_r(json_encode($arr));
