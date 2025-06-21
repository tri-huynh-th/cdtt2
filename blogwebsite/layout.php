<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Bếp Anh Tài'; ?></title>


    <?php 
    // >>> BẮT ĐẦU PHẦN CẦN THÊM/SỬA TRONG LAYOUT.PHP <<<
    // Định nghĩa BASE_PATH: Đây là đường dẫn thư mục gốc của dự án của bạn trên server web.
    // Ví dụ: Nếu bạn truy cập http://localhost/blogwebsite/, thì BASE_PATH là '/blogwebsite'.
    // Nếu bạn truy cập trực tiếp http://yourdomain.com/, thì BASE_PATH là '/'.
    // **ĐẢM BẢO GIÁ TRỊ NÀY CHÍNH XÁC VỚI CẤU HÌNH CỦA BẠN.**
    if (!defined('BASE_PATH')) { // Kiểm tra để tránh định nghĩa lại nếu đã có ở đâu đó khác
        define('BASE_PATH', '/blogwebsite'); 
    }
    ?>
    <base href="<?php echo BASE_PATH; ?>/">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@0,400;0,700;1,400&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/header-footer.css">
    <link rel="stylesheet" href="assets/pagination.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <?php if (isset($extraCss)) : ?>
    <link rel="stylesheet" href="<?php echo $extraCss; ?>">
    <?php endif; ?>

    <?php if (isset($extraHeadContent)) : ?>
    <?php echo $extraHeadContent; ?>
    <?php endif; ?>
</head>

<body>

    <!-- <div class="background-blur"></div> -->

    <header>
        <div class="header-left">
            <img src="images/logo.png" alt="Bếp Anh Tài Logo" class="logo-img">
        </div>
        <nav class="header-nav">
            <a href="index.php">Trang chủ</a>
            <div class="dropdown-menu-parent">
                <a href="monan/monan.php" class="dropdown-toggle">Món Ăn <i
                        class="fas fa-chevron-down dropdown-arrow"></i></a>
                <div class="dropdown-content">
                    <a href="monan/man.php">Món ăn mặn</a>
                    <a href="monan/chay.php">Món ăn chay</a>
                    <a href="monan/anvat.php">Món ăn vặt</a>
                </div>
            </div>
            <a href="monan/monnuoc.php">Món Nước</a>
            <a href="#">Về Chúng Tôi</a>
        </nav>
        <div class="header-right">
            <div class="search-box">
                <input type="text" placeholder="Tìm kiếm">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div class="icons">
                <a href="#" aria-label="Yêu thích"><i class="fa-regular fa-heart"></i></a>
                <a href="#" aria-label="Thông báo"><i class="fa-regular fa-bell"></i></a>
                <a href="#" aria-label="Người dùng"><i class="fa-regular fa-user"></i></a>
            </div>
            <a href="register/dangky.php" class="login-button">Đăng Ký / Đăng Nhập</a>
        </div>
    </header>

    <main class="page-content">
        <?php 
            // Đây là nơi nội dung của từng trang cụ thể sẽ được chèn vào
            // Biến $contentPage sẽ chứa đường dẫn đến file nội dung (ví dụ: 'content/trang-chu-content.php')
            if (isset($contentPage) && file_exists($contentPage)) {
                include $contentPage; 
            } else {
                echo "<p>Nội dung trang không tìm thấy.</p>";
            }
        ?>
    </main>

    <footer>
        <div class="footer-section">
            <div class="footer-logo">Bếp Anh Tài</div>
            <p class="footer-slogan">
                Chỉ cần một chút yêu thương, ai cũng có thể nấu được những món ăn ngon cho gia đình!
            </p>
        </div>

        <div class="footer-section">
            <h4>Thông tin</h4>
            <p>Hộ Kinh Doanh Bếp Anh Tài</p>
            <p>Mã Số HKD: 26A8046871</p>
            <p>Địa chỉ: Trường Đại học Giao thông vận tải, TPHCM - 70 Tô Ký, Tân Chánh Hiệp, Quận 12</p>
        </div>

        <div class="footer-section">
            <h4>Hỗ trợ</h4>
            <p>Hotline: 0348 462 142</p>
            <p>Email: bepanhtai@gmail.com</p>
            <p>Fanpage: Bếp Anh Tài</p>
            <p>Zalo OA: Bếp Anh Tài Dạy Nấu Ăn</p>
        </div>

        <div class="footer-section">
            <h4>Liên kết</h4>
            <a href="#">Về Chúng Tôi</a>
            <div class="social-icons">
                <a href="#"><img src="images/logoface.png" alt="Facebook"></a>
                <a href="#"><img src="images/logotiktok.png" alt="TikTok"></a>
            </div>
        </div>
    </footer>

    <?php if (isset($extraJs)) : ?>
    <script src="<?php echo $extraJs; ?>"></script>
    <?php endif; ?>

</body>

</html>