<?php
include "../xuli_admin/connect.php";

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

$updates = [];
foreach ($_POST as $key => $value) {
    if ($key !== 'id') {
        $updates[] = "$key = '" . $conn->real_escape_string($value) . "'";
    }
}

$sql = "UPDATE orders SET " . implode(', ', $updates) . " WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật đơn hàng thành công.";
} else {
    echo "Lỗi khi cập nhật: " . $conn->error;
}

$conn->close();
header("Location: ../index_admin.php"); 
exit;
?>
