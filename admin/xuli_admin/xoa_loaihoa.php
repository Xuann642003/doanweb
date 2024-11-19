<?php
include "../xuli_admin/connect.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "DELETE FROM loaihoa WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                alert('Xóa thành công.');
                window.location.href = '../index_admin.php'; 
              </script>";
    } else {
        echo "Lỗi khi xóa: " . $conn->error;
    }
} else {
    echo "ID không hợp lệ.";
}

$conn->close();

exit;
?>
