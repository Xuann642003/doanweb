<?php
session_start();
include "../xuli_admin/connect.php";

// Fetch the latest orders (assuming orders are grouped by timestamp)
$query = "SELECT * FROM orders ORDER BY ngaydat DESC LIMIT 10"; // Adjust limit if needed
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $orders = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "<p>No recent orders found. <a href='main.php'>Go back to shopping</a></p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <style>
        /* Styling */
        .order-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-table th, .order-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .order-table th {
            background-color: #f8f9fa;
        }

        h1 {
            font-size: 2em;
            color: #d40a5f;
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>
<body>

<div class="order-container">
    <h1>Thông tin đơn hàng</h1>
    <table class="order-table">
        <tr>
            <th>Tên khách hàng</th>
            <th>Mã đơn hàng</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Ngày đặt</th>           
        </tr>
        <?php
        foreach ($orders as $order) {
            echo '<tr>';
            echo '<td>'. $order["tendangnhap"]. '</td>';
            echo '<td>' . $order["id"] . '</td>';
            echo '<td>' . $order["tensanpham"] . '</td>';
            echo '<td>' . number_format($order["gia"], 0, ',', '.') . ' VND</td>';
            echo '<td>' . $order["soluong"] . '</td>';
            echo '<td>' . number_format($order["tong"], 0, ',', '.') . ' VND</td>';
            echo '<td>' . $order["ngaydat"] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

</div>

</body>
</html>
