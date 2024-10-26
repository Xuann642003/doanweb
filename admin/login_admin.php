
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    display: flex;
    align-items: center;
    justify-content: center;
}
.divchinh {
    width: 100%;
    height: 500px;
    display: flex;
    align-items: center;
}
.divform {
    position: relative;
    width: 350px;
    height: 98%;
    background-color: #fff;
    margin-left: 1000px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}
form {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
form h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 100px;
}
input {
    margin: 15px;
    width: 300px;
    height: 40px;
    transition: padding-left 0.3s ease;
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: 2px solid gray;
}
input:focus {
    outline: none; 
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: 2px solid red; 
}
.input-container input:focus + i {
    color: red; 
}
input[type="text"], input[type="password"] {
    border-top: none;
    border-right: none;
    border-left: none;
}

.input-container {
    position: relative;
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}
.input-container i {
    margin-right: 10px;
    font-size: 20px;
}
.input-container input {
    flex: 1; 
    padding: 10px;
    border: none;
    border-bottom: 1px solid #000;
}
.password-container {
    position: relative; 
}
#togglePassword {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%); 
    font-size: 20px;
    cursor: pointer;
}
.input-container input::placeholder {
    text-align: center;
    transition: text-align 0.3s ease, padding-left 0.3s ease;
}
.input-container .fa-user, .input-container .fa-lock {
    position: absolute;
    left: 30px;
    top: 50%;
    transform: translateY(-50%);
    color: gray;
}
.input-container input:hover {
    cursor: pointer;
    padding-left: 50px;
}

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
        <form action="xuli_admin/xuli_login.php" method="POST">
            <h2>Đăng nhập dưới quyền admin</h2>
            
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
            <!-- <div class="register">
                <a href="#">Sign up</a>
            </div> -->
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
</script>
</body>
<script src="./script/script_login.js"></script>
