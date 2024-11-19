<?php
include "../xuli_admin/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        echo "<script>
                alert('Lỗi: Không tìm thấy ID khách hàng!');
                window.history.back();
              </script>";
        exit;
    }

    $id = intval($_POST['id']);
    $hoten = $conn->real_escape_string($_POST['hoten']);
    $tendangnhap = $conn->real_escape_string($_POST['tendangnhap']);
    $matkhau = $conn->real_escape_string($_POST['matkhau']);
    $namsinh = intval($_POST['namsinh']);
    $email = $conn->real_escape_string($_POST['email']);
    $sodienthoai = $conn->real_escape_string($_POST['sodienthoai']);
    $diachi = $conn->real_escape_string($_POST['diachi']);

    $update_sql = "UPDATE nguoidung 
                   SET hoten='$hoten', tendangnhap='$tendangnhap', matkhau='$matkhau', 
                       namsinh='$namsinh', email='$email', sodienthoai='$sodienthoai', diachi='$diachi' 
                   WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>
                alert('Cập nhật thành công!');
                window.location.href = '../index_admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Lỗi khi cập nhật: " . $conn->error . "');
                window.history.back();
              </script>";
    }
    $conn->close();
} else {
    echo "<script>
            alert('Phương thức không hợp lệ!');
            window.history.back();
          </script>";
}
?>
