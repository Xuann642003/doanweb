<?php
include "../xuli_admin/connect.php"; // Kết nối đến cơ sở dữ liệu

// Truy vấn dữ liệu từ bảng messages
$sql = "SELECT id, content, sender, created_at FROM messages ORDER BY created_at ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $class = ($row['sender'] === 'user') ? 'user' : 'admin';
        echo '<div class="message ' . $class . '">';
        echo '<p>' . htmlspecialchars($row['content']) . '</p>';
        echo '<span style="font-size: 0.8em; color: #666;">' . htmlspecialchars($row['created_at']) . '</span>';
        echo '</div>';
    }
} else {
    echo '<p>Không có tin nhắn nào.</p>';
}

$conn->close();
?>
