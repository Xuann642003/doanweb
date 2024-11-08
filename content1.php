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
                <a href="#">HOA HỒNG</a>
                <!-- <ul class="dropdown-content">
                    <li><a href="#">HOA SINH NHẬT SANG TRỌNG</a></li>
                    <li><a href="#">HOA SINH NHẬT GIÁ RẺ</a></li>
                    <li><a href="#">HOA TẶNG SINH NHẬT NGƯỜI YÊU</a></li>
                    <li><a href="#">HOA TẶNG SINH NHẬT MẸ</a></li>
                    <li><a href="#">HOA TẶNG SINH NHẬT BẠN</a></li>
                    <li><a href="#">LẴNG HOA TẶNG SINH NHẬT</a></li>
                    <li><a href="#">HOA HỒNG TẶNG SINH NHẬT</a></li>
                    <li><a href="#">GIỎ HOA SINH NHẬT</a></li>
                </ul> -->
            </li>
            <li class="dropdown">
                <a href="#">HOA CÚC</a>
                <!-- <ul class="dropdown-content">
                    <li><a href="#">LẴNG HOA KHAI TRƯƠNG</a></li>
                    <li><a href="#">HOA KHAI TRƯƠNG ĐẸP</a></li>
                    <li><a href="#">HOA KHAI TRƯƠNG GIÁ RẺ</a></li>
                </ul> -->
            </li>
            <li class="dropdown"> 
                <a href="#">HOA HƯỚNG DƯƠNG</a>
                <!-- <ul class="dropdown-content">
                    <li><a href="#">LAN HỒ ĐIỆP TRẮNG</a></li>
                    <li><a href="#">LAN HỒ ĐIỆP HỒNG</a></li>
                    <li><a href="#">LAN HỒ ĐIỆP VÀNG</a></li>
                </ul> -->
            </li>
            <li class="dropdown">
                <a href="#">HOA LAN</a>
                <!-- <ul class="dropdown-content">
                    <li><a href="#">HOA TÌNH YÊU</a></li>
                    <li><a href="#">HOA CƯỚI</a></li>
                    <li><a href="#">HOA CHÚC MỪNG</a></li>
                    <li><a href="#">HOA CHIA BUỒN</a></li>
                </ul> -->
            </li>
            <li><a href="#">HOA LILY</a></li>
            <li><a href="#">HOA TULIP</a></li>
            <li><a href="#">HOA BABY</a></li>
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
            <?php
            include 'xuli/connect.php';

            $sql = "SELECT tenanh FROM banner";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $isActive = true; 
                while ($row = $result->fetch_assoc()) {
                    $tenanh = $row['tenanh'];
                    echo '<img src="image/' . $tenanh . '" alt="Banner Image" class="' . ($isActive ? 'active' : '') . '">';
                    $isActive = false; 
                }
            } else {
                echo "No images found.";
            }
            $conn->close();
            ?>

            <!-- Navigation buttons -->
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>

    </section>

    <?php include 'home.php'; ?>

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
