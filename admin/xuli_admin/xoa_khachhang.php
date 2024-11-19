<?php
include "../xuli_admin/connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_sql = "DELETE FROM nguoidung WHERE id = $id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Customer deleted successfully!'); window.location='your_page.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid ID.";
}

$conn->close();
?>
