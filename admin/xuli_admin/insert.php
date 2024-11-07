<?php
include "../xuli_admin/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loai = $_POST['loai'];
    $hinhanh = $_POST['hinhanh'];
    $tenhoa = $_POST['tenhoa'];
    $giagiamgia = $_POST['giagiamgia'];
    $giagoc = $_POST['giagoc'];
    $mota = $_POST['mota'];

    $sql = "INSERT INTO sanpham (loai, hinhanh, tenhoa, giagiamgia, giagoc, mota) 
            VALUES ('$loai', 'image/$hinhanh', '$tenhoa', '$giagiamgia', '$giagoc', '$mota')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Dữ liệu đã được thêm thành công');
        window.location.href = 'task/index_admin.php'; 
        </script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>