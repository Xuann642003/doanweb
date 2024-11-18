<?php
session_start();
include "../xuli_admin/connect.php";

if (!isset($_SESSION['la_admin']) || $_SESSION['la_admin'] !== true) {
    header('Location: dang_nhap.php');
    exit();
}

$truy_van = "SELECT * FROM don_hang ORDER BY id_don_hang DESC";
$ket_qua = $conn->query($truy_van);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan ly Don Hang</title>
    <link rel="stylesheet" href="style/admin_style.css">
</head>
<body>
    <div class="container">
        <h1>Quan ly Don Hang</h1>
        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nguoi Gui</th>
                    <th>Nguoi Nhan</th>
                    <th>San Pham</th>
                    <th>Gia (VND)</th>
                    <th>Ngay Giao</th>
                    <th>Trang Thai</th>
                    <th>Hanh Dong</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($ket_qua->num_rows > 0) {
                    while ($dong = $ket_qua->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $dong['id_don_hang'] . "</td>";
                        echo "<td>" . htmlspecialchars($dong['ten_nguoi_gui']) . "</td>";
                        echo "<td>" . htmlspecialchars($dong['ten_nguoi_nhan']) . "</td>";
                        echo "<td>" . htmlspecialchars($dong['ten_san_pham']) . "</td>";
                        echo "<td>" . number_format($dong['gia']) . "</td>";
                        echo "<td>" . htmlspecialchars($dong['ngay_giao']) . "</td>";
                        echo "<td>" . htmlspecialchars($dong['trang_thai']) . "</td>";
                        echo "<td>
                            <a href='xem_don_hang.php?id_don_hang=" . $dong['id_don_hang'] . "'>Xem</a> |
                            <a href='sua_don_hang.php?id_don_hang=" . $dong['id_don_hang'] . "'>Sua</a> |
                            <a href='xoa_don_hang.php?id_don_hang=" . $dong['id_don_hang'] . "' onclick='return confirm(\"Ban co chac muon xoa?\");'>Xoa</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Khong co don hang nao.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
