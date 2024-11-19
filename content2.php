

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

    <?php include 'home1.php'; ?>

</body>
<script src="script/script_banner.js"></script>
<script src="script/script_dropmenu.js"></script>
</html>
