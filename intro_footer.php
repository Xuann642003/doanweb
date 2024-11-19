
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .footer {
            background-color: #f8f8f8;
            padding: 40px 20px;
            text-align: left;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            color: #333;
        }
        .footer .column {
            flex: 1;
            min-width: 220px;
            margin: 10px;
        }
        .footer h3 {
            color: #D10069;
            margin-bottom: 15px;
            font-size: 12px;
        }
        .footer p {
            margin: 8px 0;
            font-size: 14px;
        }
        .footer .logo img {
            width: 150px;
        }
        .footer .social-icons {
            display: flex;
            gap: 10px;
        }
        .footer .social-icons a {
            font-size: 18px;
            color: #333;
            text-decoration: none;
        }
        .footer .scanme img { width: 100px; }
        .social-icons { flex-direction: column; }
        .social-icons a:hover { color: red; }
    </style>
</head>
<body>

<div class="footer">
    <div class="column logo">
        <img src="image/logo.jpg">
        <p>Hotline: 0373488101</p>
        <p>Email: thuylinh2605@gmail.com</p>
        <div class="scanme">
            <img src="image/facebookqrcode.jpg" alt="QR Code">
            <p>Scan me</p>
        </div>
    </div>
    <div class="column">
        <h3>CHĂM SÓC KHÁCH HÀNG</h3>
        <p><a style="text-decoration:none" href="lienhe.php">Liên Hệ</a></p>
    </div>
    <div class="column">
        <h3>THEO DÕI</h3>
        <div class="social-icons">
            <a href="#" style="font-size:13px;">Facebook</a>
            <a href="#" style="font-size:13px">Instagram</a>
            <a href="#" style="font-size:13px">YouTube</a>
        </div>
    </div>
    <div class="column">
        <h3>SHOP HOA THUYLINHFLOWER</h3>
        <p><strong>Cửa hàng chính:</strong> Số 3 ngõ 64/70 Hưng Thịnh, Yên Sở, Hoàng Mai, Hà Nội</p>
        <p><strong>Cửa Hàng Phú Thọ:</strong> Khu 1, Xã Vĩnh Chân, Huyện Hạ Hòa, Tỉnh Phú Thọ</p>
    </div>
</div>

</body>
</html>
