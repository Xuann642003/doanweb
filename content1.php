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

            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>

    </section>

    <?php include 'home.php'; ?>

</body>
<script>
    let currentSlide = 0; 
let slides = document.querySelectorAll('.banner-right img');
let totalSlides = slides.length;

function moveSlide(step) {
    currentSlide = (currentSlide + step + totalSlides) % totalSlides; 
    updateSlides();
}

function updateSlides() {
    slides.forEach((slide, index) => {
        slide.classList.remove('active'); 
        if (index === currentSlide) {
            slide.classList.add('active'); 
        }
    });
}

setInterval(() => {
    moveSlide(1); 
}, 5000);

updateSlides();
</script>
<script src="script/script_banner.js"></script>
<script src="script/script_dropmenu.js"></script>
</html>
