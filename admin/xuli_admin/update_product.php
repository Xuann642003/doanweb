<?php
include "../xuli_admin/connect.php";

session_start();

// Kiểm tra phương thức POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra và lấy dữ liệu từ form
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);
        $loai = mysqli_real_escape_string($conn, $_POST['loai']);
        $hinhanh = mysqli_real_escape_string($conn, $_POST['hinhanh']);
        $tenhoa = mysqli_real_escape_string($conn, $_POST['tenhoa']);
        $giagiamgia = floatval($_POST['giagiamgia']);
        $giagoc = floatval($_POST['giagoc']);
        $mota = mysqli_real_escape_string($conn, $_POST['mota']);
        $soluongton = intval($_POST['soluongton']);

        // Câu truy vấn cập nhật
        $updateSql = "UPDATE sanpham 
                      SET loai='$loai', hinhanh='$hinhanh', tenhoa='$tenhoa', giagiamgia='$giagiamgia', giagoc='$giagoc', mota='$mota', soluongton='$soluongton' 
                      WHERE id=$id";

        // Thực hiện truy vấn
        if ($conn->query($updateSql) === TRUE) {
            $_SESSION['message'] = "Cập nhật sản phẩm thành công!";
            header("Location: ../index_admin.php");
            exit(); // Dừng thực thi mã sau khi điều hướng
        } else {
            echo "Lỗi cập nhật: " . $conn->error;
        }
    } else {
        echo "ID sản phẩm không hợp lệ.";
    }
} else {
    echo "Phương thức không được hỗ trợ.";
}

// Đóng kết nối
$conn->close();
?>
