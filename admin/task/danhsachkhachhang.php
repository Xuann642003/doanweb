<?php
include "../xuli_admin/connect.php";

$sql = "SELECT id, hoten, tendangnhap, matkhau, namsinh, email, sodienthoai, diachi FROM nguoidung";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách khách hàng</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Năm sinh</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["hoten"] . "</td>";
                echo "<td>" . $row["tendangnhap"] . "</td>";
                echo "<td>" . $row["matkhau"] . "</td>";
                echo "<td>" . $row["namsinh"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["sodienthoai"] . "</td>";
                echo "<td>" . $row["diachi"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data available</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
