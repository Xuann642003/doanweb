<?php
// Retrieve product details from URL
$product_id = isset($_GET['id']) ? $_GET['id'] : '';
$product_name = isset($_GET['name']) ? $_GET['name'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : 0;
$original_price = isset($_GET['original_price']) ? $_GET['original_price'] : 0;

// Calculate discount percentage if necessary
$discount_percentage = $original_price > 0 ? round((($original_price - $price) / $original_price) * 100) : 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Hàng</title>
    <link rel="stylesheet" href="style/style_ots.css">
</head>
<body>
    <div class="container">
        <h1>Thông tin đơn hàng</h1>
        <form action="submit_order.php" method="POST" class="order-form">
            <!-- Thông tin người gửi -->
            <div class="section">
                <h2>Thông tin người gửi</h2>
                <label>Họ tên *</label>
                <input type="text" name="sender_name" required>
                
                <label>Điện thoại *</label>
                <input type="text" name="sender_phone" required>
                
                <label>Email</label>
                <input type="email" name="sender_email">
            </div>

            <!-- Thông tin người nhận -->
            <div class="section">
                <h2>Thông tin người nhận</h2>
                <label>Họ tên *</label>
                <input type="text" name="receiver_name" required>
                
                <label>Điện thoại *</label>
                <input type="text" name="receiver_phone" required>
                
                <label>Địa chỉ *</label>
                <input type="text" name="receiver_address" required>
                
                <label>Tỉnh, thành phố *</label>
                <select name="city" required>
                    <option value="An Giang">An Giang</option>
                    <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                    <option value="Bạc Liêu">Bạc Liêu</option>
                    <option value="Bắc Giang">Bắc Giang</option>
                    <option value="Bắc Kạn">Bắc Kạn</option>
                    <option value="Bắc Ninh">Bắc Ninh</option>
                    <option value="Bến Tre">Bến Tre</option>
                    <option value="Bình Định">Bình Định</option>
                    <option value="Bình Dương">Bình Dương</option>
                    <option value="Bình Phước">Bình Phước</option>
                    <option value="Bình Thuận">Bình Thuận</option>
                    <option value="Cà Mau">Cà Mau</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                    <option value="Cao Bằng">Cao Bằng</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Đắk Lắk">Đắk Lắk</option>
                    <option value="Đắk Nông">Đắk Nông</option>
                    <option value="Điện Biên">Điện Biên</option>
                    <option value="Đồng Nai">Đồng Nai</option>
                    <option value="Đồng Tháp">Đồng Tháp</option>
                    <option value="Gia Lai">Gia Lai</option>
                    <option value="Hà Giang">Hà Giang</option>
                    <option value="Hà Nam">Hà Nam</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="Hà Tĩnh">Hà Tĩnh</option>
                    <option value="Hải Dương">Hải Dương</option>
                    <option value="Hải Phòng">Hải Phòng</option>
                    <option value="Hậu Giang">Hậu Giang</option>
                    <option value="Hòa Bình">Hòa Bình</option>
                    <option value="Hưng Yên">Hưng Yên</option>
                    <option value="Khánh Hòa">Khánh Hòa</option>
                    <option value="Kiên Giang">Kiên Giang</option>
                    <option value="Kon Tum">Kon Tum</option>
                    <option value="Lai Châu">Lai Châu</option>
                    <option value="Lâm Đồng">Lâm Đồng</option>
                    <option value="Lạng Sơn">Lạng Sơn</option>
                    <option value="Lào Cai">Lào Cai</option>
                    <option value="Long An">Long An</option>
                    <option value="Nam Định">Nam Định</option>
                    <option value="Nghệ An">Nghệ An</option>
                    <option value="Ninh Bình">Ninh Bình</option>
                    <option value="Ninh Thuận">Ninh Thuận</option>
                    <option value="Phú Thọ">Phú Thọ</option>
                    <option value="Phú Yên">Phú Yên</option>
                    <option value="Quảng Bình">Quảng Bình</option>
                    <option value="Quảng Nam">Quảng Nam</option>
                    <option value="Quảng Ngãi">Quảng Ngãi</option>
                    <option value="Quảng Ninh">Quảng Ninh</option>
                    <option value="Quảng Trị">Quảng Trị</option>
                    <option value="Sóc Trăng">Sóc Trăng</option>
                    <option value="Sơn La">Sơn La</option>
                    <option value="Tây Ninh">Tây Ninh</option>
                    <option value="Thái Bình">Thái Bình</option>
                    <option value="Thái Nguyên">Thái Nguyên</option>
                    <option value="Thanh Hóa">Thanh Hóa</option>
                    <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                    <option value="Tiền Giang">Tiền Giang</option>
                    <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                    <option value="Trà Vinh">Trà Vinh</option>
                    <option value="Tuyên Quang">Tuyên Quang</option>
                    <option value="Vĩnh Long">Vĩnh Long</option>
                    <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                    <option value="Yên Bái">Yên Bái</option>
                </select>
                
                <!-- <label>Quận / Huyện *</label>
                <select name="district" required>
                    <option value="Quận 1">Quận 1</option>
                </select> -->
                
                <label>Ngày giao hàng *</label>
                <input type="date" name="delivery_date" required>
                
                <label>Thời gian giao hàng *</label>
                <select name="delivery_time" required>
                    <option value="8:00 - 12:00">Từ 8:00 - 12:00</option>
                    <option value="12:00 - 17:00">Từ 12:00 - 17:00</option>
                    <option value="17:00 - 20:00">Từ 17:00 - 20:00</option>
                    <!-- Add other options as needed -->
                </select>
                
                <label>Lời nhắn [cho người nhận]</label>
                <textarea name="note" rows="4"></textarea>

                <label style="color:red">Lưu ý [cho shop]</label>
                <textarea name="note" rows="4"></textarea>
            </div>

            <!-- Chi tiết đơn hàng -->
            <!-- Chi tiết đơn hàng -->
            <div class="order-details">
                <h2>Chi tiết đơn hàng</h2>
                <div class="order-item">
                    <span>1 x <?php echo htmlspecialchars($product_name); ?></span>
                    <span><?php echo number_format($price); ?> VND</span>
                </div>
                <div class="total">
                    <strong>Tổng cộng:</strong> <?php echo number_format($price); ?> VND
                </div>
                <label for="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    Tôi đã đọc và đồng ý với Điều khoản & Điều kiện
                </label>
                <button type="submit">Xác nhận đơn hàng</button>
            </div>
        </form>
    </div>
</body>
</html>
