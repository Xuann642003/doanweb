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
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
                font-size: 12px;
            }
            .order-now {
                width: 140px;
                background-color: orange;
                color: white;
            }
            .fast-order {
                width: 120px;   
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
            .product-lienquan {
                display: flex;
                gap: 20px;
                width: 80%;
                height:500px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
            }
            .related-products {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
                gap: 20px;
                margin-top: 20px;
            }

            .product-card {
                background-color: #fff;
                border-radius: 8px;
                overflow: hidden;
                width: 200px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                transition: transform 0.3s;
            }

            .product-card:hover {
                transform: translateY(-5px);
            }

            .product-card img {
                width: 100%;
                max-height: 200px;
                object-fit: cover;
            }

            .product-name {
                font-size: 16px;
                font-weight: bold;
                margin: 10px 0 5px;
            }

            .product-price {
                color: red;
                font-size: 14px;
                margin-bottom: 10px;
            }

            .buy-button {
                display: inline-block;
                background-color: #FF4747;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                font-size: 14px;
                cursor: pointer;
            }

            .buy-button:hover {
                background-color: #e3376d;
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
            <hr style="width: 100%; height: 1px; background-color: brown; border: none;">
            <div class="price-section">
                <span class="original-price"><?php echo number_format($giagoc); ?> VND</span>
                <span><?php echo number_format($giagiamgia); ?> VND</span>
                <span class="discount-label"><?php echo $discount_percentage; ?>% SALE</span>
            </div>
            <hr style="width: 100%; height: 1px; background-color: brown; border: none;">
            
            
            <!-- Product description section -->
            <div class="description-section">
                <h2 style="font-size:13px">Mô tả sản phẩm</h2>
                <p><?php echo $row["mota"]; ?></p>
            </div>
            <div class="order-buttons">
                    <?php
                        echo '<a href="cart.php?action=add&id=' . $row["id"] . '&name=' . urlencode($row["tenhoa"]) . '&price=' . $giagiamgia . '&original_price=' . $giagoc . '">
                        <button class="buy-button">THÊM VÀO GIỎ HÀNG</button>
                         </a>';
                     ?>

                <!-- <button class="fast-order">ĐẶT NHANH</button> -->
            </div>
            <div class="info-section">
                <span class="icon">🚀</span> Giao hoa NHANH trong 60 phút
                <span class="icon">🎁</span> Tặng miễn phí thiệp hoặc banner
            </div>
        </div>
    </div>
    <div class="product-lienquan">
    <h2 style="font-size:20px; margin-top:-10px;">Sản phẩm liên quan</h2>
    <div class="related-products">
        <?php
        $related_sql = "SELECT * FROM sanpham WHERE id != '$id' AND loai = (SELECT loai FROM sanpham WHERE id = '$id') LIMIT 4";
        $related_result = $conn->query($related_sql);

        // Kiểm tra và hiển thị sản phẩm liên quan nếu có
        if ($related_result->num_rows > 0) {
            while ($related_row = $related_result->fetch_assoc()) {
                $related_id = $related_row["id"];
                $related_name = $related_row["tenhoa"];
                $related_price = $related_row["giagiamgia"];
                $related_image = $related_row["hinhanh"];
                ?>

                <div class="product-card">
                    <img src="<?php echo $related_image; ?>" alt="<?php echo $related_name; ?>" class="product-image">
                    <h3 class="product-name"><?php echo $related_name; ?></h3>
                    <p class="product-price"><?php echo number_format($related_price); ?> VND</p>
                    <?php  
                        echo '<a href="infosp.php?action=add&id=' . $related_id . '&name=' . urlencode($related_name) . '&price=' . $related_price . '">
                            <button class="buy-button">THÊM VÀO GIỎ HÀNG</button>
                        </a>'; 
                    ?>
                </div>

                <?php
            }
        } else {
            echo "<p>Không có sản phẩm liên quan nào.</p>";
        }
        ?>
    </div>
    
    </div>     
    </body>
    <?php include('intro_footer.php'); ?>
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
