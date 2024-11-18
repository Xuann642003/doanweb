<?php
include 'xuli/connect.php';

$sql = "SELECT * FROM lienhe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $logo = $row['anhlogo'];
    $tenshop = $row['tenshop'];
    $diachi = $row['diachi'];
    $hotline = $row['hotline'];
    $trangthai = $row['trangthai'];
    $facebook = $row['facebook'];
    $qr = $row['anhqr'];
} else {
    echo "Không có dữ liệu!";
    exit;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tenshop; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
        }
        .header img {
            width: 100px;
        }
        .header h1 {
            margin: 10px 0;
        }
        .content {
            margin-top: 20px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .qr-code {
            text-align: center;
        }
        .qr-code img {
            width: 150px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="<?php echo $logo; ?>" alt="Logo">
            <h1><?php echo $tenshop; ?></h1>
        </div>
        <div class="content">
            <div class="info">
                <p><strong>Địa chỉ:</strong> <?php echo $diachi; ?></p>
                <p><strong>Hotline:</strong> <?php echo $hotline; ?></p>
                <p><strong>Trạng thái:</strong> <?php echo $trangthai; ?></p>
                <p><strong>Facebook:</strong> <a href="https://<?php echo $facebook; ?>" target="_blank"><?php echo $facebook; ?></a></p>
            </div>
            <div class="qr-code">
                <p>Quét mã QR:</p>
                <img src="<?php echo $qr; ?>" alt="QR Code">
            </div>
        </div>
    </div>
</body>
</html>
