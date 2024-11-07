<?php
session_start();
include 'xuli/connect.php';

// Initialize the cart if it's not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if "add to cart" action is triggered
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id='$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Add product to cart (or increment quantity if it’s already in the cart)
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
    }
}

// Remove item from cart
if (isset($_GET['action']) && $_GET['action'] == "remove") {
    $product_id = $_GET['id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
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
            margin-top: 20px;
            display: inline-block;
        }

        /* Title Styling */
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

<div class="cart-container">
    <h1>Your Cart</h1>
    
    <?php
    if (!empty($_SESSION['cart'])) { 
        echo '<table>';
        echo '<tr>';
        echo '<th>Product</th>';
        echo '<th>Price</th>';
        echo '<th>Quantity</th>';
        echo '<th>Total</th>';
        echo '<th>Action</th>';
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
    <a href="main.php" class="back-button">Go Back to Shopping</a>
</div>

</body>
</html>

<?php $conn->close(); ?>
