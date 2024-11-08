<?php
include "../xuli_admin/connect.php"; // Kết nối đến cơ sở dữ liệu

// Kiểm tra xem có ID của sản phẩm không
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Chuyển đổi ID thành số nguyên để tránh lỗi bảo mật SQL Injection

    // Câu lệnh SQL để xóa sản phẩm
    $sql = "DELETE FROM sanpham WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Xóa sản phẩm thành công!";
    } else {
        echo "Lỗi khi xóa sản phẩm: " . $conn->error;
    }
} else {
    echo "ID sản phẩm không tồn tại.";
}

// Đóng kết nối
$conn->close();

// Chuyển hướng về trang sản phẩm
echo '<script>alert("Xóa sản phẩm thành công!"); window.location.href = "../index_admin.php";</script>';
exit();
?>
