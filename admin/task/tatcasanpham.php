<?php
  include "../xuli_admin/connect.php";

// Query to retrieve data from the table
$sql = "SELECT id, loai, hinhanh, tenhoa, giagiamgia, giagoc, mota , soluongton FROM sanpham";
$result = $conn->query($sql);

// HTML structure
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Flower Table</title>';
echo '<style>';
echo 'table { width: 100%; border-collapse: collapse; }';
echo 'th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }';
echo 'th { background-color: #f4f4f4; }';
echo '</style>';
echo '</head>';
echo '<body>';

echo '<h2>Flower Data</h2>';
echo '<table>';
echo '<tr><th>ID</th><th>Loại</th><th>Hình Ảnh</th><th>Tên Hoa</th><th>Giá Giảm Giá</th><th>Giá Gốc</th><th>Mô Tả</th><th>Số lượng tồn</th></tr>';

// Check if there are results and display them
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["loai"] . '</td>';
        echo '<td><img src="' . $row["hinhanh"] . '" width="50" alt="Image"></td>';
        echo '<td>' . $row["tenhoa"] . '</td>';
        echo '<td>' . number_format($row["giagiamgia"]) . '</td>';
        echo '<td>' . number_format($row["giagoc"]) . '</td>';
        echo '<td>' . ($row["mota"] ? $row["mota"] : 'N/A') . '</td>';
        echo '<td>' . $row["soluongton"] . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="7">No data found</td></tr>';
}

echo '</table>';

// Close the connection
$conn->close();

echo '</body>';
echo '</html>';
?>
