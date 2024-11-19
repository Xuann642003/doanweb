<?php
session_start();
include "../xuli_admin/connect.php";

// Fetch the latest orders (assuming orders are grouped by timestamp)
$query = "SELECT * FROM orders ORDER BY created_at DESC LIMIT 10"; // Adjust limit if needed
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $orders = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "<p>No recent orders found. <a href='main.php'>Go back to shopping</a></p>";
    exit();
}

// Calculate the total sales amount directly from the orders table
$total_sales = 0;
foreach ($orders as $order) {
    $total_sales += $order["total_amount"];  // Assuming the column for total amount is 'total_amount'
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
    <h1>Doanh thu bán hàng</h1>
    <table class="order-table">
        <tr>
            <th>Tên khách hàng</th>
            <th>Mã đơn hàng</th>       
            <th>Tổng</th>
            <th>Ngày đặt</th>           
        </tr>
        <?php
        foreach ($orders as $order) {
            echo '<tr>';
            echo '<td>'. $order["sender_name"]. '</td>'; 
            echo '<td>' . $order["id"] . '</td>';
            echo '<td>' . number_format($order["total_amount"], 0, ',', '.') . ' VND</td>';
            echo '<td>' . $order["created_at"] . '</td>'; 
            echo '</tr>';
        }
        ?>
        <tr>
            <td colspan="5" style="text-align: right; font-weight: bold;">Tổng tiền</td>
            <td colspan="2" style="font-weight: bold;"><?= number_format($total_sales, 0, ',', '.') ?> VND</td>
        </tr>
    </table>
</div>

</body>
</html>
