<?php
include "../xuli_admin/connect.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "DELETE FROM ten_bang WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa thành công.";
    } else {
        echo "Lỗi khi xóa: " . $conn->error;
    }
} else {
    echo "ID không hợp lệ.";
}

$conn->close();

header("Location: index_admin.php");
exit;
?>
