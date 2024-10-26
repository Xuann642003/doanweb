<?php
include 'xuli/connect.php';

if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $sql = "SELECT * FROM sanpham WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Calculate the discount percentage
        $giagoc = $row["giagoc"];
        $giagiamgia = $row["giagiamgia"];
        $discount_percentage = round((($giagoc - $giagiamgia) / $giagoc) * 100);
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi tiết sản phẩm</title>
        <style>
            * {
                font-family: Arial, sans-serif;
            }
            .product-container {
                display: flex;
                gap: 20px;
                width: 80%;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
                background-color: #fff;
            }
            .product-image {
                width: 50%;
                text-align: center;
            }
            .product-image img {
                width: 100%;
                max-width: 300px;
                height: auto;
                border-radius: 8px;
            }
            .product-info {
                width: 50%;
            }
            .product-info h1 {
                font-size: 24px;
                margin-bottom: 10px;
            }
            .price-section {
                display: flex;
                align-items: center;
                gap: 10px;
                font-size: 18px;
                color: red;
                font-weight: bold;
            }
            .original-price {
                text-decoration: line-through;
                color: #999;
                font-size: 16px;
            }
            .discount-label {
                background-color: #FF4747;
                color: #fff;
                padding: 3px 8px;
                border-radius: 4px;
                font-size: 12px;
            }
            .promo-section {
                margin-top: 15px;
                padding: 10px;
                border: 1px solid #FF7474;
                border-radius: 4px;
                background-color: #FFF5F5;
            }
            .promo-button {
                background-color: #FF4747;
                color: #fff;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .order-buttons {
                margin-top: 20px;
                display: flex;
                gap: 10px;
            }
            .order-buttons button {
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            .order-now {
                background-color: orange;
                color: white;
            }
            .fast-order {
                background-color: #FF4747;
                color: white;
            }
            .note {
                margin-top: 15px;
                background-color: #FFF2D6;
                padding: 10px;
                border-radius: 4px;
                font-size: 14px;
                color: #FF4747;
            }
            .info-section {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-top: 20px;
                font-size: 14px;
                color: #666;
            }
            .icon {
                font-size: 18px;
                color: #FF4747;
            }
        </style>
    </head>
    <body>

    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo $row["hinhanh"]; ?>" alt="<?php echo $row["tenhoa"]; ?>">
        </div>
        <div class="product-info">
            <h1><?php echo $row["tenhoa"]; ?></h1>
            <div class="price-section">
                <span class="original-price"><?php echo number_format($giagoc); ?> VND</span>
                <span><?php echo number_format($giagiamgia); ?> VND</span>
                <span class="discount-label"><?php echo $discount_percentage; ?>% GIẢM</span>
            </div>
            <div class="order-buttons">
                <button class="order-now">
                    <a href="ordertoship.php?id=<?php echo $id; ?>&name=<?php echo urlencode($row["tenhoa"]); ?>&price=<?php echo $giagiamgia; ?>&original_price=<?php echo $giagoc; ?>">ĐẶT HÀNG</a>
                </button>
                <button class="fast-order">ĐẶT NHANH</button>
            </div>
            <div class="info-section">
                <span class="icon">🚀</span> Giao hoa NHANH trong 60 phút
                <span class="icon">🎁</span> Tặng miễn phí thiệp hoặc banner
            </div>
            <!-- Product description section -->
            <div class="description-section">
                <h2>Mô tả sản phẩm</h2>
                <p><?php echo $row["mota"]; ?></p>
            </div>
        </div>
    </div>

    </body>
    </html>
    <?php
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "Mã sản phẩm không được tìm thấy!";
}

$conn->close();
?>
