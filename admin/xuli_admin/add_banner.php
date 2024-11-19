<?php
include "../xuli_admin/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['tenanh']) && $_FILES['tenanh']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../image/'; 
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        $fileName = basename($_FILES['tenanh']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['tenanh']['tmp_name'], $targetFilePath)) {
            $stmt = $conn->prepare("INSERT INTO banner (tenanh) VALUES (?)");
            $stmt->bind_param("s", $fileName);
            $stmt->execute();
            header("Location: ../index_admin.php");
            exit();
        } else {
            echo "Lỗi: Không thể tải lên tệp.";
        }
    } else {
        echo "Lỗi: Vui lòng chọn một tệp hợp lệ.";
    }
}
?>
