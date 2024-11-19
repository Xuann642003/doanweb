<?php
include 'xuli/connect.php';

// Lấy từ khóa tìm kiếm
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

if ($searchQuery) {
    // Truy vấn cơ sở dữ liệu tìm các hoa có tên gần giống với từ khóa
    $sql = "SELECT loaihoa FROM loaihoa WHERE loaihoa LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị các gợi ý
        while ($row = $result->fetch_assoc()) {
            echo '<div><a href="mucsanpham.php?class=' . $row['loaihoa'] . '">' . strtoupper(str_replace('hoa', 'HOA ', $row['loaihoa'])) . '</a></div>';
        }
    } else {
        echo '<div>Không có kết quả tìm kiếm phù hợp</div>';
    }
}

$conn->close();
?>
