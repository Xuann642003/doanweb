<?php
include "../xuli_admin/connect.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM nguoidung WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Customer not found.");
    }
} else {
    die("Invalid ID.");
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-left:400px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"], input[type="password"], input[type="email"], input[type="hidden"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Cập nhật khách hàng</h2>
    <form action="xuli_admin/xuli_sua_khachhang.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>"> 
    <label for="hoten">Họ tên:</label><br>
    <input type="text" id="hoten" name="hoten" value="<?= $row['hoten'] ?>" required><br><br>

    <label for="tendangnhap">Tên đăng nhập:</label><br>
    <input type="text" id="tendangnhap" name="tendangnhap" value="<?= $row['tendangnhap'] ?>" required><br><br>

    <label for="matkhau">Mật khẩu:</label><br>
    <input type="password" id="matkhau" name="matkhau" value="<?= $row['matkhau'] ?>" required><br><br>

    <label for="namsinh">Năm sinh:</label><br>
    <input type="text" id="namsinh" name="namsinh" value="<?= $row['namsinh'] ?>" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?= $row['email'] ?>" required><br><br>

    <label for="sodienthoai">Số điện thoại:</label><br>
    <input type="text" id="sodienthoai" name="sodienthoai" value="<?= $row['sodienthoai'] ?>" required><br><br>

    <label for="diachi">Địa chỉ:</label><br>
    <input type="text" id="diachi" name="diachi" value="<?= $row['diachi'] ?>" required><br><br>

    <input type="submit" value="Cập nhật">
</form>

</body>
</html>