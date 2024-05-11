<?php
include "connect.php";
$iduser = $_POST['IdUser'];
$email = $_POST['Email'];
$username = $_POST['UserName'];
$mobile = $_POST['Mobile'];
$date = $_POST['Date'];
$note = $_POST['Note'];
$chitiet = $_POST['chitiet'];

$query = 'INSERT INTO `dondatban`(`IdUser`, `Email`, `UserName`, `Mobile`, `Date`, `Note`) 
            VALUES ('.$iduser.',"'.$email.'","'.$username.'","'.$mobile.'",'.$date.',"'.$note.'")';
$data = mysqli_query($conn, $query);
if($data == true){
    $query = 'SELECT IdDon AS IdDonDat FROM `đonatban` WHERE `iduser`= '.$iduser.' ORDER BY id DESC LIMIT 1';
    $data = mysqli_query($conn, $query);
        
    while ($row = mysqli_fetch_assoc($data)) {
        $iddonhang = ($row);
    }
    if(!empty($iddonhang)){
            //co don hang
        $chitiet = json_decode($chitiet, true);
        foreach ($chitiet as $key => $value) {
            $truyvan = 'INSERT INTO `chitietdondatban`(`IdDonDat`, `UserName`, `Quantity`, `Date`, `Note`)  
                            VALUES ('.$iddondat["IdDonDat"].','.$value["UserName"].','.$value["Quantity"].','.$value["Date"].',"'.$value["Note"].'")';  
            $data = mysqli_query($conn, $truyvan);

        }  
        if($data == true){
            $arr = [
                'success' => true,
                'message' => "thanh cong",
                'iddonhang' => $iddonhang["iddonhang"]
            ];
        }else{
            $arr = [
                'success' => false,
                'message' => "khong thanh cong"
            ];
        }  
        print_r(json_encode($arr));     
    }  
}else{
    $arr = [
		'success' => false,
		'message' => "khong thanh cong"
	];
    print_r(json_encode($arr));
}
