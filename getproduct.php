<?php
include "connect.php";

// Xử lý yêu cầu tìm kiếm theo floor (nếu có)
if (isset($_GET['ProductType'])) {
       $ProductType = $_GET['ProductType'];
   
       // Thực hiện truy vấn SQL với điều kiện WHERE floor = ?
       $query = "SELECT * FROM `product` WHERE ProductType = ?";
       $stmt = mysqli_prepare($conn, $query);
   
       // Kiểm tra và bind giá trị cho tham số truy vấn
       if ($stmt) {
           mysqli_stmt_bind_param($stmt, 's', $ProductType); // 's' là kiểu dữ liệu của tham số ($floor) là string
           mysqli_stmt_execute($stmt);
           $data = mysqli_stmt_get_result($stmt);
   
           $result = array();
           while ($row = mysqli_fetch_assoc($data)) {
               $result[] = $row;
           }
   
           // Kiểm tra kết quả trả về
           if (!empty($result)) {
               $arr = [
                   'success' => true,
                   'message' => "Tìm kiếm thành công",
                   'result' => $result
               ];
           } else {
               $arr = [
                   'success' => false,
                   'message' => "Không có dữ liệu cho tầng này",
                   'result' => []
               ];
           }
   
           mysqli_stmt_close($stmt);
   
           // Trả về kết quả dưới dạng JSON
           echo json_encode($arr);
           exit; // Kết thúc và không thực hiện hiển thị toàn bộ danh sách
       } else {
           $arr = [
               'success' => false,
               'message' => "Lỗi trong quá trình thực hiện truy vấn"
           ];
       }
   }

$query = "SELECT * FROM `product`";
$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
       foreach ($row as $key => $value) {
              $row[$key] = is_numeric($value) ? intval($value) : $value;
          }
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