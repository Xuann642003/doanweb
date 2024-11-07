<?php
include "../xuli_admin/connect.php";

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $delete_query = "DELETE FROM sanpham WHERE id = $id";
    if ($conn->query($delete_query) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "no_id";
}

$conn->close();
?>
