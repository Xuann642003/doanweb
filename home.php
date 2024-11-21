<style>
/* Container chứa toàn bộ các sản phẩm */
.product-container {
    display: flex;
    justify-content: center; /* Căn giữa các sản phẩm */
    align-items: flex-start; /* Căn trên cho đồng nhất */
    flex-wrap: wrap; /* Tự động xuống dòng khi không đủ chỗ */
    gap: 20px; /* Khoảng cách giữa các sản phẩm */
    padding: 20px;
    background-color: #f9f9f9;
}

/* Thẻ sản phẩm */
.product-card {
    width: 270px; /* Đảm bảo kích thước đồng đều */
    height: auto; /* Tự điều chỉnh chiều cao nếu cần */
    padding: 25px;
    text-align: center;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column; /* Sắp xếp dọc các phần tử */
    transition: transform 0.3s ease-in-out;
}

/* Ảnh sản phẩm */
.image-container img {
    width: 100%; /* Chiếm toàn bộ chiều ngang */
    height: 220px; /* Chiều cao cố định */
    border-radius: 10px;
    object-fit: cover; /* Đảm bảo ảnh không bị méo */
}

/* Thông tin sản phẩm */
.info-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

/* Tên sản phẩm */
.info-container h3 {
    font-size: 1em;
    font-family: 'Arial', sans-serif;
    color: #333;
    margin: 0;
    text-align: center;
    line-height: 1.4em;
}

/* Giá */
.price-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Giá giảm */
.price {
    color: #d40a5f;
    font-size: 1.4em;
    font-weight: bold;
    margin: 5px 0;
}

/* Giá cũ */
.old-price {
    text-decoration: line-through;
    color: #888;
    font-size: 1.1em;
}

/* Nút đặt hàng */
.buy-button {
    background-color: #d40a5f;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.buy-button:hover {
    background-color: #b3084b;
}

/* Đáp ứng trên màn hình nhỏ */
@media (max-width: 768px) {
    .product-container {
        flex-direction: column; /* Chuyển sang dạng cột trên màn hình nhỏ */
        align-items: center;
    }

    .product-card {
        width: 100%; /* Chiếm toàn bộ chiều ngang */
        max-width: 400px;
    }
}


</style>
<?php include'xuli/connect.php'; ?>

    <h1>ĐANG GIẢM GIÁ</h1>
    <div class="product-container">
    
    <?php
if ($result->num_rows > 0) {
    $sql = "SELECT * FROM sanpham";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        
        // Div chứa ảnh sản phẩm
        echo '<div class="image-container">';
        echo '<img src="' . $row["hinhanh"] . '" alt="' . $row["tenhoa"] . '">';
        echo '</div>';
        
        // Div chứa thông tin sản phẩm (tên, giá, nút đặt hàng)
        echo '<div class="info-container">';
        echo '<h3>' . $row["tenhoa"] . '</h3>';
        echo '<div class="price-container">';
        echo '<p class="price">' . number_format($row["giagiamgia"], 0, ',', '.') . ' VND</p>';
        echo '<p class="old-price">' . number_format($row["giagoc"], 0, ',', '.') . ' VND</p>';
        echo '</div>';
        echo '<a href="infosp.php?action=add&id=' . $row["id"] . '"><button class="buy-button">ĐẶT HÀNG</button></a>';
        echo '</div>';
        
        echo '</div>';
    }
} else {
    echo "<p>No products available</p>";
}
?>

    </div>