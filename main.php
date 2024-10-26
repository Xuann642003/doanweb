<!-- index.php -->
<?php
include 'header.php'; 
?>
<?php
    session_start(); 
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header("Location: xuli_login.php");
        exit(); 
    }
?>
<!-- Main Header with Logo, Search, and Account Information -->
<style>
.cart {
    position: relative;
}

.cart-icon {
    background-color: #F48FB1;
    padding: 10px;
    border-radius: 10px;
    font-size: 18px;
    color: white;
}

.cart-badge {
    position: absolute;
    top: -20px;
    right: -10px;
    background-color: grey;
    color: white;
    border-radius: 50%;
    padding: 5px;
    font-size: 14px;
}

/* Reset some basic styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f5f5f5;
}

/* Style for the account menu */
.account-menu {
    list-style-type: none;
    margin: 20px;
    padding: 0;
}

.account-menu > li {
    position: relative;
    display: inline-block;
}

.account-menu > li > a {
    font-size: 16px;
    font-weight: 500;
    color: #333;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 25px;
    background: linear-gradient(135deg, #ffffff, #f0f0f0);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease-in-out;
    z-index: 1;
}

.account-menu > li > a:hover {
    background: linear-gradient(135deg, #d1e0ff, #b3c9ff);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

/* Style for dropdown content */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 180px;
    margin-top: 10px;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    padding: 10px 0;
    transition: all 0.3s ease-in-out;
    opacity: 0;
    transform: translateY(10px);
    z-index: 999;
}

.dropdown-content li {
    list-style-type: none;
}

.dropdown-content li a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 15px;
    transition: all 0.3s ease;
}

.dropdown-content li a:hover {
    background-color: #f7f7f7;
    color: #007BFF;
    transform: translateX(5px);
}

.dropdown:hover .dropdown-content {
    display: block;
    opacity: 1;
    transform: translateY(0);
    z-index: 999;
}

.dropdown-content {
    animation: fadeInDown 0.4s ease forwards;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.search-bar {
    display: flex;
    align-items: center;
}

.search-bar input {
    width: 400px;
    padding: 10px;
    border-radius: 20px;
    border: 1px solid #ddd;
    margin-right: 10px;
    cursor: pointer;
}

.search-bar button {
    background-color: #e81c62;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    color: white;
    cursor: pointer;
}

.title {
    font-size: 20px;
    margin: 0;
}

.title>span {
    font-size:20px;
    text-transform:uppercase;
    animation:glow 3s ease-in-out infinite;
    animation-delay:var(--delay);
}

@keyframes glow {
    0%,100% {
        color: var(--color);
        text-shadow:0 0 10px #0652dd , 0 0 50px #0652dd , 0 0 100px #0652dd ;
    }
    10%, 90% {
        color:#111;
        text-shadow:none;
    }
}

.account-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: white;
    border-bottom: 1px solid #ddd;
}

.logo h1 {
    color: #e81c62;
    font-size: 28px;
}

.logo p {
    font-size: 16px;
    color: #555;
}

.account-info {
    font-size: 14px;
}

.account-info a {
    margin: 0 10px;
    text-decoration: none;
    color: #333;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<header class="main-header">
    <div class="logo">
    <p class="title">
                    <span style="--color:#ffffff;--delay:0s">T</span>
                    <span style="--color:#ffffff;--delay:0.25">h</span>
                    <span style="--color:#ffffff;--delay:0.5s">u</span>
                    <span style="--color:#ffffff;--delay:0.75s">y</span>
                    <span style="--color:#ffffff;--delay:1s">L</span>
                    <span style="--color:#ffffff;--delay:1.25s">i</span>
                    <span style="--color:#ffffff;--delay:1.5s">n</span>
                    <span style="--color:#ffffff;--delay:1.75">h</span>
                    <span style="--color:#ffffff;--delay:2s">F</span>
                    <span style="--color:#ffffff;--delay:2.25s">l</span>
                    <span style="--color:#ffffff;--delay:2.5s">o</span>
                    <span style="--color:#ffffff;--delay:2.75s">w</span>
                    <span style="--color:#ffffff;--delay:3s">e</span>
                    <span style="--color:#ffffff;--delay:3.25s">r</span>
    </p>
        <p style="margin-left:20px">Say it with Flowers</p>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Tìm kiếm">
        <button>🔍</button>
    </div>
    <div class="account-info">
        <ul class="account-menu">
            <li class="dropdown">
                Hello, <?php echo htmlspecialchars($username); ?>
                <ul class="dropdown-content">
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
        <a href="#">Giỏ hàng</a>
            <div class="cart">
                <span class="cart-icon">
                    <i class="fas fa-shopping-bag"></i>
                </span>
                <span class="cart-badge">0</span>
            </div> | 
        <a href="#">Thanh toán</a>
    </div>
</header>

<?php
include 'content1.php'; 
include 'footer.php'; 
?>