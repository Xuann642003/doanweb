<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: xuli_login.php");
    exit();
}

$totalQuantity = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $totalQuantity += $product['quantity']; 
    }
}
?>
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
    /* margin-top: 10px; */
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
.fixed-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 30px;
    background-color: #e81c62;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 0;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    gap: 35px;
}

.fixed-bar a {
    text-decoration: none;
    color: white;
    font-size: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: color 0.3s ease;
}

.fixed-bar a:hover {
    color: #ffd7e0;
}

.fixed-bar img {
    width: 20px;
    height: 20px;
}

.chat-button {
    background-color: #ffffff; 
    height:20px;
    color: #e91e63; 
    border: none;
    padding: 10px 15px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Ensure button stays below the chat box */
}

.chat-button:hover {
    background-color: #f8bbd0; 
}

#chatBox {
    display: none;
    position: fixed;  /* Change from absolute to fixed */
    bottom: 60px;  /* Position above the chat button */
    right: 20px;
    width: 350px;
    height: 450px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    z-index: 1001; /* Ensure it's above other content */
}

#chatHeader {
    background-color: #e91e63;
    color: white;
    padding: 10px;
    font-size: 18px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
}

#chatContent {
    padding: 10px;
    height: 300px;
    overflow-y: auto;
}

#chatInput {
    display: flex;
    border-top: 1px solid #ddd;
}

#chatInput input {
    flex: 1;
    padding: 10px;
    border: none;
    border-bottom-left-radius: 10px;
}

#chatInput button {
    background-color: #e91e63;
    color: white;
    border: none;
    padding: 10px 15px;
    border-bottom-right-radius: 10px;
    cursor: pointer;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<header class="main-header">
    <div class="logo">
    <a href="main.php" style="text-decoration:none;">
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
    </a>
        <p style="margin-left:20px">Say it with Flowers</p>
    </div>
    <div class="search-bar">
    <form method="GET" action="mucsanpham.php">
    <input type="text" name="search" placeholder="Tìm kiếm tên hoa..." required>
    <button type="submit">Tìm kiếm</button>
    </form>
    
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
        <a href="cart.php">Giỏ hàng</a>
        <div class="cart">
            <span class="cart-icon">
                <i class="fas fa-shopping-bag"></i>
            </span>
            <span class="cart-badge"><?php echo $totalQuantity; ?></span>   
        </div> | 
    </div>
</header>
<div class="fixed-bar">
    <a href="tel:0373488101">
        <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" alt="Call">
        0373488101
    </a>
    <a href="https://zalo.me" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/3536/3536445.png" alt="Zalo">
        Nhắn Tin Zalo
    </a>
    <a href="tel:0373488101">
        <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" alt="Call">
        0373488101
    </a>
    <button class="chat-button" id="chatButton">Chat với chúng tôi</button>
</div>
<div id="chatBox">
        <div id="chatHeader">Hỗ trợ trực tuyến</div>
        <div id="chatContent">
            <div class="message admin">
                <p>Chào bạn! Làm thế nào để chúng tôi có thể giúp bạn?</p>
            </div>
        </div>
        <div id="chatInput">
            <input type="text" placeholder="Nhập tin nhắn..." id="messageInput">
            <button id="sendButton">Gửi</button>
        </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const chatButton = document.getElementById('chatButton');
        const chatBox = document.getElementById('chatBox');

        chatButton.addEventListener('click', () => {
            if (chatBox.style.display === 'none' || chatBox.style.display === '') {
                chatBox.style.display = 'block';
            } else {
                chatBox.style.display = 'none';
            }
        });
    });
    const chatContent = document.getElementById('chatContent');
        chatContent.scrollTop = chatContent.scrollHeight;

        document.getElementById('sendButton').addEventListener('click', function () {
    const input = document.getElementById('messageInput');
    const message = input.value.trim();

    if (message !== '') {
        // Hiển thị tin nhắn của người dùng
        const userMessage = document.createElement('div');
        userMessage.classList.add('message', 'user');
        userMessage.innerHTML = `<p>${message}</p>`;
        document.getElementById('chatContent').appendChild(userMessage);

        // Cuộn xuống cuối
        document.getElementById('chatContent').scrollTop = document.getElementById('chatContent').scrollHeight;

        // Gửi tin nhắn đến server qua AJAX
        fetch('save_message.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `message=${encodeURIComponent(message)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log("Tin nhắn đã được lưu!");
            } else {
                console.error("Lỗi: ", data.error);
            }
        })
        .catch(error => console.error("Lỗi kết nối: ", error));

        // Xóa nội dung trong input
        input.value = '';
    }
});

    

</script>



<?php
include 'content1.php'; 
echo '<hr>';
include 'intro_footer.php'; 
?>