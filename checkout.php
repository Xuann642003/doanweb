<?php
session_start();
include 'xuli/connect.php';

if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty. <a href='main.php'>Go back to shopping</a></p>";
    exit();
}

$total_amount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save order details to the database
    $ngaydat = date("Y-m-d H:i:s"); // Current timestamp in the format YYYY-MM-DD HH:MM:SS

    foreach ($_SESSION['cart'] as $product) {
        $tensanpham = $product["tenhoa"];
        $gia = $product["price"];
        $soluong = $product["quantity"];
        $tong = $gia * $soluong;

        // Insert into the 'orders' table, including the ngaydat
        $query = "INSERT INTO orders (tensanpham, gia, soluong, tong, ngaydat) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siids", $tensanpham, $gia, $soluong, $tong, $ngaydat);
        $stmt->execute();
    }

    // Clear the cart
    $_SESSION['cart'] = array();
    
    // Redirect to a thank-you page or display a success message
    header("Location: thankyou.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* Styling */
        .checkout-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .checkout-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .checkout-table th, .checkout-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .checkout-table th {
            background-color: #f8f9fa;
        }

        .confirm-button, .cancel-button {
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            text-align: center;
            color: white;
        }

        .confirm-button {
            background-color: #28a745;
        }

        .confirm-button:hover {
            background-color: #218838;
        }

        .cancel-button {
            background-color: #6c757d;
            margin-left: 10px;
            text-decoration: none;
            display: inline-block;
        }

        .cancel-button:hover {
            background-color: #5a6268;
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

<div class="checkout-container">
    <h1>Thông tin sản phẩm</h1>
    <table class="checkout-table">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </tr>
        <?php
        foreach ($_SESSION['cart'] as $product) {
            $item_total = $product["price"] * $product["quantity"];
            $total_amount += $item_total;
            echo '<tr>';
            echo '<td>' . $product["tenhoa"] . '</td>';
            echo '<td>' . number_format($product["price"], 0, ',', '.') . ' VND</td>';
            echo '<td>' . $product["quantity"] . '</td>';
            echo '<td>' . number_format($item_total, 0, ',', '.') . ' VND</td>';
            echo '</tr>';
        }
        ?>
        <tr>
            <td colspan="3" style="text-align: right;"><strong>Tổng tiền:</strong></td>
            <td><strong><?php echo number_format($total_amount, 0, ',', '.'); ?> VND</strong></td>
        </tr>
    </table>

    <!-- Confirm Purchase Button -->
    <form method="post" action="checkout.php">
        <button type="submit" class="confirm-button">Xác nhận thanh toán</button>
        <a href="main.php" class="cancel-button">Hủy</a>
    </form>
</div>

</body>
</html>
