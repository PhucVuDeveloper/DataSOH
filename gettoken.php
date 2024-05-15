<?php
include "connect.php";
$Status = $_POST['Status'];
if ($status == 1) {
	$query = "SELECT * FROM `user` WHERE `Status` = " . $Status;
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
} else if ($status == 0) {

	$idUser = $_POST['idUser'];
	$query = "SELECT * FROM `user` WHERE `idUser` = " . $idUser . " AND `Status` =" . $Status;
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
}
print_r(json_encode($arr));
