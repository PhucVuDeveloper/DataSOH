<?php
include "connect.php";

// Xử lý yêu cầu tìm kiếm theo floor (nếu có)
if (isset($_GET['floor'])) {
    $floor = $_GET['floor'];

    // Thực hiện truy vấn SQL với điều kiện WHERE floor = ?
    $query = "SELECT * FROM `tablenumber` WHERE floor = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Kiểm tra và bind giá trị cho tham số truy vấn
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $floor); // 's' là kiểu dữ liệu của tham số ($floor) là string
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

if (isset($_GET['tablestatus'])) {
    $tablestatus = $_GET['TableStatus'];

    // Thực hiện truy vấn SQL với điều kiện WHERE floor = ?
    $query = "SELECT * FROM `tablenumber` WHERE TableStatus = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Kiểm tra và bind giá trị cho tham số truy vấn
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $tablestatus); // 's' là kiểu dữ liệu của tham số ($floor) là string
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

// Nếu không có yêu cầu tìm kiếm theo floor, hiển thị toàn bộ danh sách
$query = "SELECT * FROM `tablenumber`";
$data = mysqli_query($conn, $query);

$result = array();
while ($row = mysqli_fetch_assoc($data)) {
    foreach ($row as $key => $value) {
        $row[$key] = is_numeric($value) ? intval($value) : $value;
    }
    $result[] = $row;
}

// Kiểm tra kết quả trả về
if (!empty($result)) {
    $arr = [
        'success' => true,
        'message' => "Hiển thị danh sách thành công",
        'result' => $result
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "Không có dữ liệu",
        'result' => []
    ];
}

// Trả về kết quả dưới dạng JSON
echo json_encode($arr);