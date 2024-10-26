<style>
        .product-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .product-card {
            width: 250px;
            padding: 20px;
            margin: 20px;
            text-align: center;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-card h3 {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .price {
            color: #d40a5f;
            font-size: 1.2em;
        }
        .old-price {
            text-decoration: line-through;
            color: gray;
            font-size: 0.9em;
        }
        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            padding: 5px;
            border-radius: 50%;
        }
        .buy-button {
            background-color: #d40a5f;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buy-button:hover {
            background-color: #b3084b;
        }
        h1 {
            margin-top: 10px;
            margin-left: 20px;
            font-size: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
        }
</style>
<?php include'xuli/connect.php'; ?>

    <h1>ĐANG GIẢM GIÁ</h1>
    <div class="product-container">
    <?php
    $sql = "SELECT * FROM sanpham";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // $discount = 100 - ($row["giagiamgia"] / $row["giagoc"] * 100);
            echo '<div class="product-card">';
            // echo '<div class="discount-badge">'.round($discount).'% GIẢM</div>';
            echo '<img src="' . $row["hinhanh"] . '" alt="' . $row["tenhoa"] . '">';
            echo '<h3>' . $row["tenhoa"] . '</h3>';
            echo '<p class="price">' . number_format($row["giagiamgia"], 0, ',', '.') . ' VND</p>';
            echo '<p class="old-price">' . number_format($row["giagoc"], 0, ',', '.') . ' VND</p>';
            echo '<a href="login.php"><button class="buy-button">ĐẶT HÀNG</button></a>';
            echo '</div>';
        }
    } else {
        echo "<p>No products available</p>";
    }
    $conn->close();
    ?>
    </div>