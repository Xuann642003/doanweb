<?php
include "../xuli_admin/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';
    $sender = $_POST['sender'] ?? 'user'; // Mặc định là 'user'

    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (content, sender, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $message, $sender);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Không thể lưu tin nhắn.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Tin nhắn không được để trống.']);
    }
}

$conn->close();
?>
