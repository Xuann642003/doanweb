<?php
include "../xuli_admin/connect.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM loaihoa WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $hoa = $result->fetch_assoc();
} else {
    echo "Không tìm thấy dữ liệu.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa loại hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sửa Loại Hoa</h2>
        <form action="sua_xuly.php" method="POST">
            <input type="hidden" name="id" value="<?= $hoa['id'] ?>">
            <label for="loaihoa">Tên loại hoa:</label>
            <input type="text" id="loaihoa" name="loaihoa" value="<?= $hoa['loaihoa'] ?>" required>
            <button type="submit">Cập nhật</button>
        </form>
        <a class="back-link" href="../index_admin.php">Quay lại danh sách</a>
    </div>
</body>
</html>
