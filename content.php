<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowerCorner</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_header.css">
    <link rel="stylesheet" href="style/style_navi.css">
    <link rel="stylesheet" href="style/style_banner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php
        include 'xuli/connect.php';

        $sql = "SELECT * FROM loaihoa";
        $result = $conn->query($sql);

        echo '<nav class="navbar">
                <ul class="menu">';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li class="dropdown">
                        <a href="./mucsanpham.php?class=' . $row['loaihoa'] . '">' . strtoupper(str_replace('hoa', 'HOA ', $row['loaihoa'])) . '</a>
                    </li>';
            }
        } else {
            echo '<li>Không có dữ liệu</li>';
        }
        echo '   </ul>
            </nav>';

        $conn->close();
    ?>

    <?php include 'advertisement.php'; ?>

    <section class="banner">
        <div class="banner-left">
            <h2>More Moments to Shine</h2>
            <p>Happy Vietnamese Women’s Day</p>
            <p>Hoa xinh yêu chỉ từ 300K</p>
            <p>Miễn phí giao hoa nội thành TP.HCM, HN</p>
            <p>Tặng kèm thiệp chúc mừng</p>
        </div>

        <div class="banner-right">
            <img src="image/banner1.jpg" alt="Flower Image 1" class="active">
            <img src="image/banner2.jpg" alt="Flower Image 2">
            <img src="image/banner3.jpg" alt="Flower Image 3">
            <!-- <img src="image/banner4.jpg" alt="Flower Image 4"> -->

            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </section>

    <?php include 'nohome.php'; ?>

    <!-- Footer Section -->
    <!-- <footer>
        <div class="footer-container">
            <p>Gọi ngay: 091 849 1941 | 086 516 0360</p>
            <a href="#">Nhắn tin Zalo</a> | <a href="#">Nhắn tin Messenger</a>
        </div>
    </footer> -->
</body>
<script src="script/script_banner.js"></script>
<script src="script/script_dropmenu.js"></script>
</html>
