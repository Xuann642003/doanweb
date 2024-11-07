

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Dữ Liệu</title>
    <link rel="stylesheet" href="css/style_themsp.css">
</head>
<body>
    <h2>Thêm Sản Phẩm Mới</h2>
<form method="post" action="xuli_admin/insert.php" style="width: 300px; margin: 0 auto;">
    <label>Loại:</label>
    <select name="loai" required>
        <option value="">-- Chọn loại hoa --</option>
        <?php
        include "../xuli_admin/connect.php";

        $sql = "SELECT id, loaihoa FROM loaihoa";
        $result = $conn->query($sql);
        ?>
        <?php
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['loaihoa'] . "</option>";
            }
        } else {
            echo "<option value=''>Không có loại hoa</option>";
        }
        ?>
    </select><br>
    
    <label>Hình Ảnh:</label>
    <input type="file" name="hinhanh" accept="image/*" required><br>
    
    <label>Tên Hoa:</label>
    <input type="text" name="tenhoa" required><br>
    
    <label>Giá Giảm Giá:</label>
    <input type="number" name="giagiamgia" required><br>
    
    <label>Giá Gốc:</label>
    <input type="number" name="giagoc" required><br>
    
    <label>Mô Tả:</label>
    <textarea name="mota" rows="4" required></textarea><br>
    
    <input type="submit" value="Thêm">
</form>

</body>
</html>
