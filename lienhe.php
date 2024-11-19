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
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: #f1f5f9;
    color: #333;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.container:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.header {
    text-align: center;
    margin-bottom: 30px;
}

.header img {
    width: 120px;
    transition: all 0.3s ease;
}

.header img:hover {
    transform: rotate(360deg);
}

.header h1 {
    font-size: 36px;
    color: #4CAF50;
    margin-top: 20px;
    font-weight: 600;
    text-transform: uppercase;
}

.content {
    margin-top: 20px;
    font-size: 18px;
}

.info {
    margin-bottom: 20px;
}

.info p {
    margin: 10px 0;
    line-height: 1.6;
    font-size: 16px;
    color: #555;
}

.info p strong {
    color: #333;
    font-weight: bold;
}

.info a {
    color: #1e88e5;
    text-decoration: none;
}

.info a:hover {
    text-decoration: underline;
    color: #0d47a1;
}

.qr-code {
    text-align: center;
    margin-top: 40px;
}

.qr-code img {
    width: 180px;
    height: 180px;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.qr-code img:hover {
    transform: scale(1.1);
}

.footer {
    text-align: center;
    margin-top: 30px;
    font-size: 14px;
    color: #888;
}

.footer p {
    margin-top: 20px;
    font-style: italic;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="image/logo.jpg" alt="Logo">
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
