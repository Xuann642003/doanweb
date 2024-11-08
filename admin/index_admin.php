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
                    <li><a href="#" onclick="loadPage('task/thongke.php')">Thống kê</a></li>
                    <li><a href="#" onclick="loadContent('Hoạt động gần đây')">Hoạt động gần đây</a></li>
                </ul>
            </li>
            <li>
                <a onclick="toggleSubmenu('customer-submenu')"><i class="fas fa-user"></i> <span>Quản lý khách hàng</span></a>
                <ul class="submenu" id="customer-submenu">
                    <li><a href="#" onclick="loadContent('Danh sách khách hàng')">Danh sách khách hàng</a></li>
                    <li><a href="#" onclick="loadContent('Phản hồi khách hàng')">Phản hồi khách hàng</a></li>
                </ul>
            </li>
            <li>
                <a onclick="toggleSubmenu('product-submenu')"><i class="fas fa-seedling"></i> <span>Quản lý sản phẩm</span></a>
                <ul class="submenu" id="product-submenu">
                    <li><a href="#" onclick="loadPage('task/tatcasanpham.php')">Tất cả sản phẩm</a></li>
                    <li><a href="#" onclick="loadPage('task/themsanphammoi.php')">Thêm sản phẩm mới</a></li>
                    <!-- <li><a href="#" onclick="loadPage('task/editsanpham.php')">Cập nhật sản phẩm mới</a></li>
                    <li><a href="#" onclick="loadPage('task/xoasanpham.php')">Xóa sản phẩm mới</a></li> -->
                    <li><a href="#" onclick="loadContent('Danh mục sản phẩm')">Danh mục</a></li>
                </ul>
            </li>
            <li><a href="#" onclick="loadContent('Đơn hàng')"><i class="fas fa-shopping-cart"></i> <span>Đơn hàng</span></a></li>
            <li><a href="#" onclick="loadContent('Cài đặt')"><i class="fas fa-cog"></i> <span>Cài đặt</span></a></li>
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

        <div id="content-area">
            <!-- Nội dung sẽ được hiển thị tại đây -->
            <p>Chào mừng đến với trang quản trị!</p>
        </div>
    </div>

    <script>
        function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
    document.getElementById("main-content").classList.toggle("collapsed");

        // Đóng tất cả submenu khi thanh bên được thu nhỏ
        if (sidebar.classList.contains("collapsed")) {
            const submenus = document.querySelectorAll(".submenu");
            submenus.forEach(submenu => {
                submenu.classList.remove("open");
            });
        }
    }


        function toggleSubmenu(id) {
            if (!document.getElementById("sidebar").classList.contains("collapsed")) {
                document.getElementById(id).classList.toggle("open");
            }
        }

        function loadContent(content) {
            document.getElementById("content-area").innerHTML = `<h3>${content}</h3><p>Nội dung của ${content} sẽ được hiển thị ở đây.</p>`;
        }

        function loadPage(page) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", page, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("content-area").innerHTML = xhr.responseText;
                } else {
                    document.getElementById("content-area").innerHTML = "<p>Lỗi khi tải nội dung.</p>";
                }
            };
            xhr.send();
        }
    </script>

</body>
</html>
