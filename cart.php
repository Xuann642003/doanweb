<?php
session_start();
include 'xuli/connect.php';

if (!isset($_SESSION['tendangnhap'])) {
    $_SESSION['tendangnhap'] = $_SESSION['username'];
}

if (!isset($_SESSION['cart'])) {
    if (isset($_COOKIE['cart'])) {
        $_SESSION['cart'] = json_decode($_COOKIE['cart'], true); 
    } else {
        $_SESSION['cart'] = array(); 
    }
}

if (isset($_GET['action']) && $_GET['action'] == "add") {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id='$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = array(
                "tenhoa" => $product['tenhoa'],
                "price" => $product['giagiamgia'],
                "image" => $product['hinhanh'],
                "quantity" => 1
            );
        }

        setcookie('cart', json_encode($_SESSION['cart']), time() + (86400 * 30), "/"); // 86400 = 1 day
    }
}

if (isset($_GET['action']) && $_GET['action'] == "remove") {
    $product_id = $_GET['id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        setcookie('cart', json_encode($_SESSION['cart']), time() + (86400 * 30), "/"); // 86400 = 1 day
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        /* Cart Container Styling */
        .cart-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Cart Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }

        .cart-item img {
            width: 80px;
            height: auto;
            border-radius: 10px;
        }

        /* Button Styling */
        .remove-button, .back-button {
            background-color: #d40a5f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
        }

        .remove-button:hover, .back-button:hover {
            background-color: #b3084b;
        }

        .back-button {
            display: inline-block;
        }
        h1 {
            font-size: 2em;
            color: #d40a5f;
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .back-button, .checkout-button {
            background-color: #d40a5f;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            text-align: center;
            text-decoration: none;
            width: 200px; 
            height:30px;
        }

        .back-button:hover, .checkout-button:hover {
            background-color: #b3084b;
        }



    </style>
</head>
<body>

<div class="cart-container">
    <h1>Giỏ hàng của bạn</h1>
    
    <?php
    if (!empty($_SESSION['cart'])) { 
        echo '<table>';
        echo '<tr>';
        echo '<th>Tên sản phẩm</th>';
        echo '<th>Giá</th>';
        echo '<th>Số lượng</th>';
        echo '<th>Tổng</th>';
        echo '<th>Xác nhận</th>';
        echo '</tr>';

        // Loop through each item in the cart
        foreach ($_SESSION['cart'] as $id => $product) {
            $item_total = $product["price"] * $product["quantity"];
            echo '<tr class="cart-item">';
            echo '<td><img src="' . $product["image"] . '" alt="' . $product["tenhoa"] . '"><br>' . $product["tenhoa"] . '</td>';
            echo '<td>' . number_format($product["price"], 0, ',', '.') . ' VND</td>';
            echo '<td>' . $product["quantity"] . '</td>';
            echo '<td>' . number_format($item_total, 0, ',', '.') . ' VND</td>';
            echo '<td><a href="cart.php?action=remove&id=' . $id . '"><button class="remove-button">Remove</button></a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>

    <!-- Back Button -->
    <div class="button-container">
    <a href="main.php" class="back-button">Trở lại</a>
    <?php if (!empty($_SESSION['cart'])): ?>
        <a href="checkout.php" class="checkout-button">Thanh Toán</a>
    <?php endif; ?>
</div>

</div>

</body>
</html>

<?php $conn->close(); ?>
