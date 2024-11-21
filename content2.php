

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowerCorner</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_header.css">
    <link rel="stylesheet" href="style/style_navi.css">
    <link rel="stylesheet" href="style/style_banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php
include 'xuli/connect.php'; // Kết nối cơ sở dữ liệu

// Lấy giá trị tìm kiếm từ URL (nếu có)
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Xây dựng truy vấn SQL
if (!empty($searchQuery)) {
    // Sử dụng LIKE để tìm kiếm gần đúng theo tên hoa
    $sql = "SELECT * FROM sanpham WHERE tenhoa LIKE '%$searchQuery%'";
} else {
    // Nếu không có tìm kiếm, hiển thị tất cả sản phẩm
    $sql = "SELECT * FROM sanpham";
}

$result = $conn->query($sql);

// Kiểm tra và hiển thị kết quả
if ($result->num_rows > 0) {
    echo '<div class="product-container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        echo '<div class="image-container">';
        echo '<img src="' . $row["hinhanh"] . '" alt="' . $row["tenhoa"] . '">';
        echo '</div>';
        echo '<div class="info-container">';
        echo '<h3>' . $row["tenhoa"] . '</h3>';
        echo '<p class="price">' . number_format($row["giagiamgia"], 0, ',', '.') . ' VND</p>';
        echo '<p class="old-price">' . number_format($row["giagoc"], 0, ',', '.') . ' VND</p>';
        echo '<a href="infosp.php?action=add&id=' . $row["id"] . '"><button class="buy-button">ĐẶT HÀNG</button></a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>Không tìm thấy sản phẩm nào phù hợp.</p>';
}

$conn->close();
?>


    <?php include 'home1.php'; ?>

</body>
<script src="script/script_banner.js"></script>
<script src="script/script_dropmenu.js"></script>
</html>
