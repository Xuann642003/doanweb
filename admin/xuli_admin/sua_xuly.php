<?php
include "../xuli_admin/connect.php";

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$loaihoa = isset($_POST['loaihoa']) ? $_POST['loaihoa'] : '';

if ($id > 0 && $loaihoa != '') {
    $sql = "UPDATE loaihoa SET loaihoa = '$loaihoa' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thành công.";
    } else {
        echo "Lỗi khi cập nhật: " . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}

$conn->close();

header("Location: index_admin.php");
exit;
?>
