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
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul class="menu">
            <li class="dropdown">
                <a href="#">HOA SINH NHẬT</a>
                <ul class="dropdown-content">
                    <li><a href="#">HOA SINH NHẬT SANG TRỌNG</a></li>
                    <li><a href="#">HOA SINH NHẬT GIÁ RẺ</a></li>
                    <li><a href="#">HOA TẶNG SINH NHẬT NGƯỜI YÊU</a></li>
                    <li><a href="#">HOA TẶNG SINH NHẬT MẸ</a></li>
                    <li><a href="#">HOA TẶNG SINH NHẬT BẠN</a></li>
                    <li><a href="#">LẴNG HOA TẶNG SINH NHẬT</a></li>
                    <li><a href="#">HOA HỒNG TẶNG SINH NHẬT</a></li>
                    <li><a href="#">GIỎ HOA SINH NHẬT</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">HOA KHAI TRƯƠNG</a>
                <ul class="dropdown-content">
                    <li><a href="#">LẴNG HOA KHAI TRƯƠNG</a></li>
                    <li><a href="#">HOA KHAI TRƯƠNG ĐẸP</a></li>
                    <li><a href="#">HOA KHAI TRƯƠNG GIÁ RẺ</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">LAN HỒ ĐIỆP</a>
                <ul class="dropdown-content">
                    <li><a href="#">LAN HỒ ĐIỆP TRẮNG</a></li>
                    <li><a href="#">LAN HỒ ĐIỆP HỒNG</a></li>
                    <li><a href="#">LAN HỒ ĐIỆP VÀNG</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">CHỦ ĐỀ</a>
                <ul class="dropdown-content">
                    <li><a href="#">HOA TÌNH YÊU</a></li>
                    <li><a href="#">HOA CƯỚI</a></li>
                    <li><a href="#">HOA CHÚC MỪNG</a></li>
                    <li><a href="#">HOA CHIA BUỒN</a></li>
                </ul>
            </li>
            <li><a href="#">THIẾT KẾ</a></li>
            <li><a href="#">HOA TƯƠI</a></li>
            <li><a href="#">HOA TƯƠI GIẢM 30%</a></li>
        </ul>
    </nav>

    <?php include 'advertisement.php'; ?>

   <!-- Banner Section -->
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

    <?php include 'home.php'; ?>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <p>Gọi ngay: 091 849 1941 | 086 516 0360</p>
            <a href="#">Nhắn tin Zalo</a> | <a href="#">Nhắn tin Messenger</a>
        </div>
    </footer>
</body>
<script src="script/script_banner.js"></script>
<script src="script/script_dropmenu.js"></script>
</html>
