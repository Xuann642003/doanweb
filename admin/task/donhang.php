<?php
session_start();

include "../xuli_admin/connect.php";

// Thực hiện truy vấn
$sql = "SELECT * FROM orders ORDER BY created_at DESC"; 
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Đơn Hàng</title>
    <link rel="stylesheet" href="./css/style_donhang.css"> <!-- Tùy chỉnh CSS của bạn -->
</head>
<body>
    <div class="container">
        <h1>Danh Sách Đơn Hàng</h1>

        <!-- Bao bọc bảng trong div có class "table-container" -->
        <div class="table-container">
            <table border="1" cellspacing="0" cellpadding="10">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người Gửi</th>
                        <th>Điện Thoại Gửi</th>
                        <th>Email Gửi</th>
                        <th>Người Nhận</th>
                        <th>Điện Thoại Nhận</th>
                        <th>Địa Chỉ Nhận</th>
                        <th>Thành Phố</th>
                        <th>Ngày Giao</th>
                        <th>Thời Gian Giao</th>
                        <th>Lời Nhắn</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Tạo</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Duyệt qua tất cả các đơn hàng và hiển thị
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . htmlspecialchars($row['sender_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['sender_phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['sender_email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['receiver_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['receiver_phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['receiver_address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['delivery_date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['delivery_time']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['note']) . "</td>";
                            echo "<td>" . number_format($row['total_amount'], 0, ',', '.') . " VND</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "<td>
                                    <a href='xuli_admin/view_order.php?id=" . $row['id'] . "'>Xem</a> |
                                    <a href='xuli_admin/edit_order.php?id=" . $row['id'] . "'>Sửa</a> |
                                    <a href='xuli_admin/delete_order.php?id=" . $row['id'] . "' onclick='return confirm(\"Bạn có chắc muốn xóa đơn hàng này?\");'>Xóa</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='14'>Không có đơn hàng nào.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Đóng kết nối cơ sở dữ liệu sau khi sử dụng
$conn->close();
?>

