<?php
session_start();

include 'xuli/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $sender_name = $conn->real_escape_string($_POST['sender_name']);
    $sender_phone = $conn->real_escape_string($_POST['sender_phone']);
    $sender_email = $conn->real_escape_string($_POST['sender_email']);
    $receiver_name = $conn->real_escape_string($_POST['receiver_name']);
    $receiver_phone = $conn->real_escape_string($_POST['receiver_phone']);
    $receiver_address = $conn->real_escape_string($_POST['receiver_address']);
    $city = $conn->real_escape_string($_POST['city']);
    $delivery_date = $conn->real_escape_string($_POST['delivery_date']);
    $delivery_time = $conn->real_escape_string($_POST['delivery_time']);
    $note = $conn->real_escape_string($_POST['note']);

    // Tính tổng tiền
    $total_amount = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $item_total = $product['price'] * $product['quantity'];
            $total_amount += $item_total;
        }
    } else {
        echo "Giỏ hàng rỗng.";
        exit();
    }

    // Lưu thông tin đơn hàng vào bảng `orders`
    $sql_order = "INSERT INTO orders 
        (sender_name, sender_phone, sender_email, receiver_name, receiver_phone, receiver_address, city, delivery_date, delivery_time, note, total_amount) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt_order = $conn->prepare($sql_order);
    $stmt_order->bind_param(
        "ssssssssssd",
        $sender_name, $sender_phone, $sender_email, $receiver_name, $receiver_phone, 
        $receiver_address, $city, $delivery_date, $delivery_time, $note, $total_amount
    );

    if ($stmt_order->execute()) {
        // Lấy ID của đơn hàng vừa tạo
        $order_id = $stmt_order->insert_id;

        // Lưu chi tiết đơn hàng vào bảng `order_details` và trừ số lượng tồn
        foreach ($_SESSION['cart'] as $product) {
            $product_id = intval($product['id']);
            $quantity = intval($product['quantity']);
        
            // Trừ số lượng tồn kho
            $sql_update_stock = "UPDATE sanpham SET soluongton = soluongton - ? WHERE id = ? AND soluongton >= ?";
            $stmt_stock = $conn->prepare($sql_update_stock);
            $stmt_stock->bind_param("iii", $quantity, $product_id, $quantity);
        
            if (!$stmt_stock->execute()) {
                echo "Lỗi khi cập nhật số lượng tồn kho: " . $stmt_stock->error;
                exit();
            }
        }
        $order_success = true;
        // Xóa giỏ hàng
        if ($order_success) {
            unset($_SESSION['cart']); // Xóa giỏ hàng trong session
            setcookie('cart', '', time() - 3600, "/"); // Xóa giỏ hàng lưu cookie
            echo "<script>alert('Đơn hàng của bạn đã được đặt thành công!'); window.location.href='main.php';</script>";
        } else {
            echo "<script>alert('Đã xảy ra lỗi. Vui lòng thử lại!'); window.location.href='cart.php';</script>";
        }
    } else {
        echo "<script>alert('Giỏ hàng của bạn trống. Vui lòng chọn sản phẩm.'); window.location.href='main.php';</script>";
    }

    // Đóng kết nối
    $stmt_order->close();
    $conn->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
