<?php
include "../xuli_admin/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loai = $_POST['loai'];
    $hinhanh = $_POST['hinhanh'];
    $tenhoa = $_POST['tenhoa'];
    $giagiamgia = $_POST['giagiamgia'];
    $giagoc = $_POST['giagoc'];
    $mota = $_POST['mota'];
    $soluongton = $_POST['soluongton'];

    $sql = "INSERT INTO sanpham ( hinhanh, tenhoa, giagiamgia, giagoc, mota , loai ,soluongton) 
            VALUES ( 'image/$hinhanh', '$tenhoa', '$giagiamgia', '$giagoc', '$mota' ,'$loai', '$soluongton')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Dữ liệu đã được thêm thành công');
        window.location.href = '../index_admin.php'; 
        </script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>