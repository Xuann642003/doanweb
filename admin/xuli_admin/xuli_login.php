<?php
session_start();

include '../xuli_admin/connect.php';

// Nhận dữ liệu từ form
$taikhoan = $_POST['username'];
$matkhau = $_POST['password'];

// Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM admin WHERE taikhoan = ? AND matkhau = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $taikhoan, $matkhau);
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra xem có kết quả không
if ($result->num_rows > 0) {
    // Nếu đúng, lưu thông tin đăng nhập và chuyển hướng đến trang quản trị
    $_SESSION['admin'] = $taikhoan;
    echo "<script>alert('Đăng nhập thành công!');</script>";
    echo "<script>window.location.href = '../index_admin.php';</script>";
} else {
    // Nếu sai, thông báo lỗi và quay lại trang đăng nhập
    echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!');</script>";
    echo "<script>window.location.href = '../login_admin.php';</script>";
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
