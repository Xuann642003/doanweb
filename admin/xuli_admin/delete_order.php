<?php
include "../xuli_admin/connect.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "DELETE FROM orders WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Xóa đơn hàng thành công.";
} else {
    echo "Lỗi khi xóa: " . $conn->error;
}

$conn->close();
header("Location: ../index_admin.php"); 
exit;
?>
