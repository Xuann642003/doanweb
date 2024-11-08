<?php
include "../xuli_admin/connect.php";

// session_start();
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header("Location: ../index_admin.php");
//     exit();
// }

// Lấy ID của sản phẩm từ URL
$id = $_GET['id'];

// Truy vấn thông tin sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM sanpham WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        die("ID sản phẩm không hợp lệ.");
    }
    $id = $_POST['id'];

    // Lấy dữ liệu từ form
    $$loai = mysqli_real_escape_string($conn, $_POST["loai"]);
    $hinhanh = mysqli_real_escape_string($conn, $_POST["hinhanh"]);
    $tenhoa = mysqli_real_escape_string($conn, $_POST["tenhoa"]);
    $giagiamgia = mysqli_real_escape_string($conn, $_POST["giagiamgia"]);
    $giagoc = mysqli_real_escape_string($conn, $_POST["giagoc"]);
    $mota = mysqli_real_escape_string($conn, $_POST["mota"]);
    $soluongton = mysqli_real_escape_string($conn, $_POST["soluongton"]);
    
    $updateSql = "UPDATE sanpham SET loai='$loai', hinhanh='$hinhanh', tenhoa='$tenhoa', giagiamgia='$giagiamgia', giagoc='$giagoc', mota='$mota', soluongton='$soluongton' WHERE id=$id";
    

    if ($conn->query($updateSql) === TRUE) {
        // Điều hướng sang trang khác sau khi cập nhật thành công
        header("Location: ../index_admin.php");
        exit();  // Dừng lại ở đây để tránh tiếp tục xử lý mã phía sau
    } else {
        echo "Lỗi cập nhật: " . $conn->error;
    }
}

// Check if the form was submitted and display a success message
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    echo "<script>alert('Dữ liệu đã được cập nhật thành công');</script>";
    unset($_SESSION['form_submitted']);  // Clear the session flag after showing the alert
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <style>
        /* Đặt font và nền cho trang */
        * {
            box-sizing: border-box;
        }
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        } */

        /* Thiết kế container của form */
        .form-container {
            background-color: #fff;
            max-width: 600px;
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease;
            margin-left:300px;
        }

        /* Hiệu ứng slide in */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Tiêu đề */
        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Nhãn và trường input */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        /* Hiệu ứng khi input được focus */
        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0px 0px 5px rgba(74, 144, 226, 0.3);
            background-color: #fff;
        }

        /* Textarea */
        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Nút cập nhật */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #4a90e2;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        /* Hiệu ứng hover và click cho nút */
        button[type="submit"]:hover {
            background-color: #357ABD;
        }
        button[type="submit"]:active {
            transform: scale(0.98);
        }

        /* Responsive cho màn hình nhỏ */
        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Chỉnh sửa sản phẩm</h2>
        <form method="post">
            <!-- Hidden input to pass the product ID -->
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

            <label>Loại:</label>
            <input type="text" name="loai" value="<?php echo $product['loai']; ?>" required>
            
            <label>Hình ảnh:</label>
            <input type="text" name="hinhanh" value="<?php echo $product['hinhanh']; ?>" required>
            
            <label>Tên hoa:</label>
            <input type="text" name="tenhoa" value="<?php echo $product['tenhoa']; ?>" required>
            
            <label>Giá giảm giá:</label>
            <input type="text" name="giagiamgia" value="<?php echo $product['giagiamgia']; ?>" required>
            
            <label>Giá gốc:</label>
            <input type="text" name="giagoc" value="<?php echo $product['giagoc']; ?>" required>
            
            <label>Mô tả:</label>
            <textarea name="mota" required><?php echo $product['mota']; ?></textarea>
            
            <label>Số lượng tồn:</label>
            <input type="text" name="soluongton" value="<?php echo $product['soluongton']; ?>" required>
            
            <button type="submit">Cập nhật</button>
        </form>

    </div>
</body>
</html>
