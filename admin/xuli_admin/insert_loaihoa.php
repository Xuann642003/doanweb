<?php
// Include database connection file
include "../xuli_admin/connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the flower type from the form
    $loaihoa = $_POST['loaihoa'];

    // Prepare an SQL statement to insert the new flower type into the loaihoa table
    $sql = "INSERT INTO loaihoa (loaihoa) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $loaihoa);

    // Execute the statement and check if the insertion was successful
    if ($stmt->execute()) {
        echo "<script>alert('Loại hoa mới đã được thêm thành công.'); window.location.href = '../index_admin.php';</script>";
    } else {
        echo "<script>alert('Lỗi: " . $conn->error . "'); window.location.href = '../themdanhmuc.php';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
