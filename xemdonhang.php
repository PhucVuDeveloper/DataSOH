<?php
include "connect.php";
$iduser = $_POST['IdUser'];
if($iduser == 0 ){
	$query = 'SELECT donhang.trangthai,donhang.id,donhang.diachi,donhang.sodienthoai,donhang.email,donhang.soluong,donhang.tongtien,user.username,donhang.iduser FROM `donhang` INNER JOIN user ON donhang.iduser = user.id ORDER BY donhang.id DESC';
}else{
	$query = 'SELECT * FROM `donhang` WHERE `iduser` ='.$iduser;
}

$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
    $truyvan = 'SELECT * FROM `chitietdonhang` INNER JOIN sanphammoi ON chitietdonhang.idsp = sanphammoi.id WHERE chitietdonhang.iddonhang = '.$row['id'];
    $data1 = mysqli_query($conn, $truyvan);
    $item = array();
    while ($row1 = mysqli_fetch_assoc($data1)) {
        $item[] = $row1;
    }
    $row['item'] = $item;
	$result[] = ($row);
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

?>




