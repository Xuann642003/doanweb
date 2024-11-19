<?php
session_start(); // Khởi động session

include "../xuli_admin/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy tin nhắn từ POST và username từ session
    $message = trim($_POST['message'] ?? '');
    $sender = $_SESSION['username'] ?? 'unknown'; // Lấy username từ session hoặc mặc định là 'unknown'
    
    if (!empty($message) && $sender !== 'unknown') {
        // Chuẩn bị câu truy vấn để lưu tin nhắn vào bảng
        $stmt = $conn->prepare("INSERT INTO messages (content, sender) VALUES (?, ?)");
        $stmt->bind_param("ss", $message, $sender);

        if ($stmt->execute()) {
            // Trả về kết quả JSON thành công
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Lưu tin nhắn thất bại.']);
        }
        $stmt->close();
    } else {
        // Lỗi khi không có username hoặc tin nhắn rỗng
        echo json_encode(['success' => false, 'error' => 'Tên người dùng hoặc tin nhắn không hợp lệ.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Phương thức không hợp lệ.']);
}
?>
