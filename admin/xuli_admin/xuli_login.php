<?php
session_start();

include '../xuli_admin/connect.php';

$taikhoan = $_POST['username'];
$matkhau = $_POST['password'];

$sql = "SELECT * FROM admin WHERE taikhoan = ? AND matkhau = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $taikhoan, $matkhau);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['admin'] = $taikhoan;
    echo "<script>alert('Đăng nhập thành công!');</script>";
    echo "<script>window.location.href = '../index_admin.php';</script>";
} else {
    echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!');</script>";
    echo "<script>window.location.href = '../login_admin.php';</script>";
}
$stmt->close();
$conn->close();
?>
