<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hoa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Danh sách loại hoa</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại Hoa</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../xuli_admin/connect.php";

            $sql = "SELECT id, loaihoa FROM loaihoa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['loaihoa']}</td>
                            <td>
                                <a href='xuli_admin/sua_loaihoa.php?id={$row['id']}'>Sửa</a> | 
                                <a href='xuli_admin/xoa_loaihoa.php?id={$row['id']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\");'>Xóa</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
