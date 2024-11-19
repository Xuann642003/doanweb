<?php
include "../xuli_admin/connect.php";

// Xóa ảnh
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Lấy ID và chuyển về kiểu số nguyên

    // Kiểm tra nếu ID hợp lệ
    if ($id > 0) {
        // Lấy thông tin ảnh để xóa file trên máy chủ
        $stmt = $conn->prepare("SELECT tenanh FROM banner WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($tenanh);
            if ($stmt->fetch()) {
                // Đường dẫn tới ảnh
                $filePath = "../image/" . $tenanh;

                // Xóa file nếu tồn tại
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $stmt->close();
        }

        // Xóa ảnh trong cơ sở dữ liệu
        $stmt = $conn->prepare("DELETE FROM banner WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Chuyển hướng lại trang quản lý
    header("Location: index_admin.php");
    exit();
}

// Lấy danh sách ảnh
$result = $conn->query("SELECT * FROM banner");

// Duyệt từng dòng dữ liệu
$images = [];
while ($row = $result->fetch_assoc()) {
    $images[] = $row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý ảnh</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Danh sách ảnh</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><?= htmlspecialchars($image['id']) ?></td>
                        <td>
                            <img src="<?= htmlspecialchars('../image/' . $image['tenanh']) ?>" alt="Ảnh" style="max-width: 100px; height: auto;">
                        </td>
                        <td>
                            <a href="xuli_admin/edit_banner.php?id=<?= $image['id'] ?>">Sửa</a> |
                            <a href="index_admin.php?delete=<?= $image['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Thêm ảnh mới</h2>
    <form action="xuli_admin/add_banner.php" method="POST" enctype="multipart/form-data">
        <label for="tenanh">Tên ảnh:</label>
        <input type="file" name="tenanh" id="tenanh" accept="image/*" required>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
