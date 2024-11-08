<?php
// Include the database connection
include "../xuli_admin/connect.php";
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted form data
    $productId = $_POST['tensanpham'];
    $quantity = (int)$_POST['soluong'];
    $entryDate = $_POST['ngaynhap'];

    // Query to get the current stock of the product
    $result = $conn->query("SELECT soluongton FROM sanpham WHERE id = '$productId'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentStock = $row['soluongton'];

        // Calculate new stock
        $newStock = $currentStock + $quantity;

        // Update the stock in the sanpham table
        $updateQuery = "UPDATE sanpham SET soluongton = $newStock WHERE id = $productId";
        if ($conn->query($updateQuery)) {
            echo "<p style='color:green;'>Số lượng đã được cập nhật thành công.</p>";

            // Insert into the lichsunhaphang table
            $historyQuery = "INSERT INTO lichsunhaphang (tensanpham, soluong, ngaynhap) VALUES (?, ?, ?)";
            $historyStmt = $conn->prepare($historyQuery);
            $historyStmt->bind_param("iis", $productId, $quantity, $entryDate);

            if ($historyStmt->execute()) {
                echo "<p style='color:green;'>Lịch sử nhập hàng đã được cập nhật.</p>";
            } else {
                echo "<p style='color:red;'>Lỗi: Không thể thêm vào lịch sử nhập hàng. " . $conn->error . "</p>";
            }
            $historyStmt->close();
        } else {
            echo "<p style='color:red;'>Lỗi: Không thể cập nhật số lượng. " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Sản phẩm không tồn tại.</p>";
    }

    // Close the database connection
    $conn->close();
}
?>



    <style>
    .divform {
        width: 350px;
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: 50px auto;
    }
    h2 {
        text-align: center;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-bottom: 20px;
    }
    .input-container {
        position: relative;
        margin-top: 15px;
        margin-bottom: 5px;
    }
    .input-container i {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #888;
    }
    input[type="text"], input[type="number"], input[type="datetime-local"], select {
        width: 100%;
        padding: 10px 10px 10px 40px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s;
    }
    input[type="text"]:focus, input[type="number"]:focus, input[type="datetime-local"]:focus, select:focus {
        border-color: #3a47d5;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        border-radius: 5px;
        background: linear-gradient(to right, #00d2ff, #3a47d5, #ff00ff);
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border: none;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    input[type="submit"]:hover {
        background: linear-gradient(to left, #3a47d5, #00d2ff, #ff00ff);
    }
    select {
        padding-left: 40px;
    }   
    </style>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nhập Sản Phẩm</title>
        <!-- Insert CSS style here or link to the CSS file -->
    </head>
    <body>
        <div class="divchinh">
            <div class="divform">
                <form action="" method="POST">
                    <h2>Nhập Sản Phẩm</h2>

                    <!-- Dropdown for tensanpham -->
                    <div class="input-container">
                        <i class="fa-solid fa-box"></i>
                        <select name="tensanpham" required>
                            <option value="">Chọn sản phẩm</option>
                            <?php
                            $result = $conn->query("SELECT id, tenhoa FROM sanpham");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['tenhoa'], ENT_QUOTES, 'UTF-8') . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Input for soluong -->
                    <div class="input-container">
                        <i class="fa-solid fa-sort-numeric-up"></i>
                        <input type="number" name="soluong" min="1" placeholder="Số Lượng" required>
                    </div>

                    <!-- Input for ngaynhap -->
                    <div class="input-container">
                        <i class="fa-solid fa-calendar-alt"></i>
                        <input type="datetime-local" name="ngaynhap" required>
                    </div>

                    <input type="submit" name="submit" value="Nhập hàng">
                </form>
            </div>
        </div>
    </body>
    </html>
