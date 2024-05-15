<?php
include "connect.php";
$idUser = $_POST['idUser'];
if($idUser == 0 ){
	$query = 'SELECT dondatban.Status,dondatban.idDon,dondatban.Date,dondatban.Mobile,dondatban.Email,dondatban.TotalBill,user.UserName,dondatban.idUser FROM `dondatban` INNER JOIN user ON dondatban.idUser = user.idUser ORDER BY dondatban.idDon DESC';
}else{
	$query = 'SELECT * FROM `dondatban` WHERE `idUser` ='.$idUser;
}

$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
    $truyvan = 'SELECT * FROM `chitietdondatban` INNER JOIN tablenumber ON chitietdondatban.idTable = tablenumber.idTable WHERE chitietdondatban.idDon = '.$row['idDon'];
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




