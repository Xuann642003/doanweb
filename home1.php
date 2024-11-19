<style>

.product-container {
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Căn trên cho đồng nhất */
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
    background-color: #f9f9f9;
}

/* Thẻ sản phẩm */
.product-card {
    width: 270px; 
    height: 500px; /* Chiều cao cố định */
    padding: 20px;
    margin: 10px;
    text-align: center;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center; /* Căn giữa các phần tử */
    gap: 10px;
    transition: transform 0.3s ease-in-out;
    overflow: hidden; /* Đảm bảo không bị tràn */
}

.product-card:hover {
    transform: scale(1.05);
}

/* Ảnh sản phẩm */
.product-card img {
    width: 100%; 
    height: 220px; /* Đảm bảo chiều cao ảnh là cố định và giống nhau */
    border-radius: 10px;
    object-fit: cover; /* Giữ tỷ lệ và đảm bảo ảnh không bị méo */
}


/* Tiêu đề sản phẩm */
.product-card h3 {
    font-size: 1.2em;
    font-family: 'Arial', sans-serif;
    color: #333;
    margin: 0;
    line-height: 1.4em;
    height: 2.8em; /* Chiều cao cố định */
    overflow: hidden; /* Cắt chữ nếu quá dài */
    text-align: center;
}

/* Khu vực chứa giá */
.price-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 70px; /* Cố định chiều cao tổng cho giá */
    justify-content: center;
}

/* Giá khuyến mãi */
.price {
    color: #d40a5f;
    font-size: 1.4em;
    font-weight: bold;
    margin: 5px 0;
}

/* Giá gốc */
.old-price {
    text-decoration: line-through;
    color: #888;
    font-size: 1.1em;
}

/* Nút đặt hàng */
.buy-button {
    background-color: #d40a5f;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    text-align: center;
    margin-top: auto; /* Đẩy nút xuống dưới cùng */
    transition: background-color 0.3s ease;
}

.buy-button:hover {
    background-color: #b3084b;
}

/* Đáp ứng màn hình nhỏ */
@media (max-width: 768px) {
    .product-container {
        flex-direction: column;
        align-items: center;
    }

    .product-card {
        width: 90%;
    }
}

</style>
<?php include'xuli/connect.php'; ?>

    <h1></h1>
    <div class="product-container">
<?php
    $class = isset($_GET['class']) ? $_GET['class'] : 'hoahong'; 
    $sql = "SELECT * FROM sanpham WHERE loai = '$class'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<img src="' . $row["hinhanh"] . '" alt="' . $row["tenhoa"] . '">';
            echo '<h3>' . $row["tenhoa"] . '</h3>';
            echo '<p class="price">' . number_format($row["giagiamgia"], 0, ',', '.') . ' VND</p>';
            echo '<p class="old-price">' . number_format($row["giagoc"], 0, ',', '.') . ' VND</p>';
            echo '<a href="infosp.php?action=add&id='.$row["id"].'"><button class="buy-button">ĐẶT HÀNG</button></a>';
            echo '</div>';
        }
    } else {
        echo "<p>No products available</p>";
    }
    $conn->close();
?>
