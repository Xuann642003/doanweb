<?php
session_start();
if (!isset($_SESSION['tendangnhap'])) {
    header("Location: login.php");
    exit();
}

$tendangnhap = $_SESSION['tendangnhap'];
$hoten = $_SESSION['hoten'] ?? 'Guest'; 

$total_amount = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'xuli/connect.php'; // Kết nối cơ sở dữ liệu
    $ngaydat = date("Y-m-d H:i:s");

    foreach ($_SESSION['cart'] as $id => $product) {
        $tensanpham = $product["tenhoa"];
        $gia = $product["price"];
        $soluong = $product["quantity"];
        $tong = $gia * $soluong;

        $update_stock_query = "UPDATE sanpham SET soluongton = soluongton - ? WHERE id = ?";
        $stmt_stock = $conn->prepare($update_stock_query);
        $stmt_stock->bind_param("ii", $soluong, $id);
        $stmt_stock->execute();

    }
    $_SESSION['selected_products'] = $_SESSION['cart'];  // Lưu giỏ hàng vào session

    header("Location: ordertoship.php");
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
    <div style="text-align: center; margin-bottom: 20px;">
        <p><strong>Xin chào, <?php echo htmlspecialchars($hoten); ?> (<?php echo htmlspecialchars($tendangnhap); ?>)!</strong></p>
    </div>

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

    <form method="post" action="checkout.php">
        <button type="submit" class="confirm-button">Xác nhận thanh toán</button>
        <a href="main.php" class="cancel-button">Hủy</a>
    </form>
</div>

</body>
</html>
