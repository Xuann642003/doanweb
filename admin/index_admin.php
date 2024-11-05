<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style_index.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></div>
        <div class="logo">THUYLINHFLOWER</div>
        <ul>
            <li>
                <a onclick="toggleSubmenu('dashboard-submenu')"><i class="fas fa-tachometer-alt"></i> <span>Bảng điều khiển</span></a>
                <ul class="submenu" id="dashboard-submenu">
                    <li><a href="#">Thống kê</a></li>
                    <li><a href="#">Hoạt động gần đây</a></li>
                </ul>
            </li>
            <li>
                <a onclick="toggleSubmenu('customer-submenu')"><i class="fas fa-user"></i> <span>Quản lý khách hàng</span></a>
                <ul class="submenu" id="customer-submenu">
                    <li><a href="#">Danh sách khách hàng</a></li>
                    <li><a href="#">Phản hồi khách hàng</a></li>
                </ul>
            </li>
            <li>
                <a onclick="toggleSubmenu('product-submenu')"><i class="fas fa-seedling"></i> <span>Quản lý sản phẩm</span></a>
                <ul class="submenu" id="product-submenu">
                    <li><a href="#">Tất cả sản phẩm</a></li>
                    <li><a href="#">Thêm sản phẩm mới</a></li>
                    <li><a href="#">Danh mục</a></li>
                </ul>
            </li>
            <li><a href="orders.php"><i class="fas fa-shopping-cart"></i> <span>Đơn hàng</span></a></li>
            <li><a href="settings.php"><i class="fas fa-cog"></i> <span>Cài đặt</span></a></li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content" id="main-content">
        <header>
            <h2>Bảng điều khiển</h2>
            <div>
                <i class="fas fa-bell"></i> 5
                <i class="fas fa-envelope"></i> 15
                <i class="fas fa-user-circle"></i>
            </div>
        </header>

        <div class="stats">
            <div class="stat-card blue">9,823 Người truy cập</div>
            <div class="stat-card yellow">Thống kê tháng</div>
            <div class="stat-card red">Tổng doanh thu</div>
        </div>

        <div class="traffic-chart">
            <h3>Lưu lượng truy cập</h3>
            <p>Tháng 11, 2023</p>
            <div style="height: 200px; background: #e0e0e0; border-radius: 8px;">
                <!-- Placeholder for chart -->
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
            document.getElementById("main-content").classList.toggle("collapsed");
        }

        function toggleSubmenu(id) {
            // Kiểm tra nếu sidebar đang mở (không có lớp collapsed)
            if (!document.getElementById("sidebar").classList.contains("collapsed")) {
                document.getElementById(id).classList.toggle("open");
    }
}
    </script>

</body>
</html>
