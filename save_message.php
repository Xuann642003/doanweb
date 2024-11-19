<?php
include'xuli/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';
    $sender = $_POST['sender'] ?? 'user'; 
    
    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (content, sender) VALUES (?, ?)");
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
?>
