<!-- index.php -->
<?php
include 'header.php'; 
// include 'main_header.php';
?>
<!-- <link rel="stylesheet" href="style/style_login.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
input[type="text"], input[type="password"], input[type="number"], input[type="email"] {
    width: 100%;
    padding: 10px 10px 10px 40px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s;
}
input[type="text"]:focus, input[type="password"]:focus, input[type="number"]:focus, input[type="email"]:focus {
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

.register {
    text-align: center;
    margin-top: 20px;
}

.register a {
    color: #3a47d5;
    text-decoration: none;
    font-size: 14px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.register a:hover {
    text-decoration: underline;
}

input[type="submit"], input[type="button"] {
    margin-top: 30px;
    border-radius: 50px;
    background: linear-gradient(to right, #00d2ff, #3a47d5, #ff00ff);
    color: #fff;
    cursor: pointer;
    border: none;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;   
}
input[type="submit"]:hover {
    background: linear-gradient(to left, #3a47d5, #00d2ff, #ff00ff);
}
.register {
    margin-top: 40px;
}
.register a {
    text-decoration: none;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.input-container {
    position: relative;
    margin-top: 20px;
}
.input-container i {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #666;
}
input[type="text"], input[type="password"], input[type="number"], input[type="email"] {
    padding-left: 40px;
    width: 100%;
}
</style>
<body>
    <div class="divchinh">
        <div class="divform">
            <form action="" method="POST">
                <h2>Đăng Ký Tài Khoản</h2>

                <div class="input-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="hoten" placeholder="Họ Tên" required>
                </div>

                <div class="input-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="tendangnhap" placeholder="Tên Đăng Nhập" required>
                </div>

                <div class="input-container password-container">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="matkhau" id="myInput1" placeholder="Mật Khẩu" required>
                </div>

                <div class="input-container">
                    <i class="fa-solid fa-calendar"></i>
                    <input type="number" name="namsinh" min="1900" max="2024" placeholder="Năm Sinh" required>
                </div>   

                <div class="input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-container">
                    <i class="fa-solid fa-phone"></i>
                    <input type="text" name="sodienthoai" placeholder="Số Điện Thoại" required>
                </div>

                <div class="input-container">
                    <i class="fa-solid fa-map-marker-alt"></i>
                    <input type="text" name="diachi" placeholder="Địa Chỉ" required>
                </div>

                <input type="submit" name="submit" value="Đăng Ký">
                <div class="register">
                    <a href="login.php">Quay lại Đăng Nhập</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const passwordInput = document.querySelector("#myInput1");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            this.classList.toggle("fa-eye-slash");
        });
    </script>
</body>

<?php
if (isset($_POST['submit'])) {
    include "xuli/connect.php"; 

    $hoten = $conn->real_escape_string($_POST['hoten']);
    $tendangnhap = $conn->real_escape_string($_POST['tendangnhap']);
    $matkhau = $conn->real_escape_string($_POST['matkhau']); 
    $namsinh = $conn->real_escape_string($_POST['namsinh']);
    $email = $conn->real_escape_string($_POST['email']);
    $sodienthoai = $conn->real_escape_string($_POST['sodienthoai']);
    $diachi = $conn->real_escape_string($_POST['diachi']);

    $sql_nguoidung = "INSERT INTO nguoidung (hoten, tendangnhap, matkhau, namsinh, email, sodienthoai, diachi)
                      VALUES ('$hoten', '$tendangnhap', '$matkhau', '$namsinh', '$email', '$sodienthoai', '$diachi')";

    if ($conn->query($sql_nguoidung) === TRUE) {
        $sql_dangki = "INSERT INTO dangki (tendangnhap, matkhau) VALUES ('$tendangnhap', '$matkhau')";
        
        if ($conn->query($sql_dangki) === TRUE) {
            echo "<script>alert('Đăng ký thành công!');</script>";
        } else {
            echo "<script>alert('Lỗi khi chèn vào bảng dangki: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Lỗi khi chèn vào bảng nguoidung: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>

