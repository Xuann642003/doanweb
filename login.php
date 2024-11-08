<!-- index.php -->
<?php
include 'header.php'; 
// include 'main_header.php';
?>
<link rel="stylesheet" href="style/style_login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>

input[type="submit"], input[type="button"] {
    margin-top: 30px;
    border-radius: 50px;
    background: linear-gradient(to right, #00d2ff, #3a47d5, #ff00ff);
    color: #fff;
    cursor: pointer;
    border:none;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;   
}
input[type="submit"]:hover {
    background: linear-gradient(to left, #3a47d5, #00d2ff, #ff00ff);
}
.forget-password {
    margin-left: 200px; 
}
.forget-password a {
    text-decoration: none; 
    font-size:12px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.register {
    margin-top: 40px;
}
.register a{
    text-decoration: none; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
<body>
    <div class="divchinh">
        <div class="divform">
        <form action="xuli/xuli_login.php" method="POST">
            <h2>Đăng nhập</h2>
            
            <div class="input-container">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="myInput" class="username" name="username" placeholder="Type your username ..." required>
            </div>

            <div class="input-container password-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="myInput1" name="password" placeholder="Type your password ..." required>
                <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"></i>
            </div>
            <div class="input-container forget-password">
                <a href="#">Forget password?</a>
            </div>
            <input type="submit" value="LOGIN">
            <!-- <input type="button" value="REGISTER">         -->
            <div class="register">
                <a href="#">Sign up</a>
            </div>
        </form>

        </div>
    </div>
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const passwordInput = document.querySelector("#myInput1");

    togglePassword.addEventListener("click", function () {
        console.log("Mắt được click!");
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        this.classList.toggle("fa-eye-slash");
    });

    document.querySelectorAll('input[type="text"], input[type="password"]').forEach(input => {
    input.addEventListener('input', function() {
        if (this.value) {
            this.style.paddingLeft = '40px';
        } else {
            this.style.paddingLeft = '10px';
        }
    });
});

</script>
</body>
<script src="script/script_login.js"></script>
