<?php
// BLOGWEBSITE/monan/man.php

// 1. Đảm bảo BASE_PATH được định nghĩa
if (!defined('BASE_PATH')) {
    define('BASE_PATH', '/blogwebsite'); // Thay đổi '/blogwebsite' nếu thư mục gốc của bạn khác
}

// 2. Include file kết nối cơ sở dữ liệu và các hàm chung
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php'; // ĐÃ THÊM: Đảm bảo file functions.php đã được include

// 3. Định nghĩa các biến cho layout và tiêu đề trang
$pageTitle = "Món Ăn Mặn | Bếp Anh Tài";
$extraCss = "monan/common-monan.css"; // Link tới CSS chung cho các trang danh mục

// 4. XÓA BỎ $extraHeadContent: Như đã giải thích trước đó, phần này không cần thiết ở đây.
/*
$extraHeadContent = '
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script> <script>
        window.addEventListener("DOMContentLoaded", () => {
            const logoImg = document.querySelector(".header-left .logo-img");
            if (logoImg) logoImg.src = "images/logo.png";

            const fbImg = document.querySelector("footer .social-icons img[alt=\'Facebook\']");
            const ttImg = document.querySelector("footer .social-icons img[alt=\'TikTok\']");
            if (fbImg) fbImg.src = "images/logoface.png";
            if (ttImg) ttImg.src = "images/logotiktok.png";
        });
    </script>
';
*/

// 5. Dữ liệu cụ thể cho trang danh mục này
$categoryTitle = "Món Ăn Mặn";
$categoryDescription = "Khám phá những món ăn mặn đậm đà, chuẩn vị truyền thống Việt Nam, mang đến bữa cơm ấm cúng cho gia đình bạn.";
$categorySlug = 'mon_an_man'; // Slug này phải khớp với giá trị trong cột `category` của bảng `posts`

$dishesData = []; // Khởi tạo mảng rỗng để chứa dữ liệu từ DB

// 6. Truy vấn cơ sở dữ liệu để lấy các bài viết thuộc danh mục này
if ($conn) { // ĐÃ THÊM: Đảm bảo kết nối CSDL thành công
    $search = $_GET['q'] ?? ''; // ĐÃ THÊM: Lấy từ khóa tìm kiếm nếu có
    $query = "SELECT id, title, thumbnail, overview FROM posts WHERE category = ?";
    $params = [$categorySlug];
    $types = 's';

    if (!empty($search)) {
        $query .= " AND title LIKE ?";
        $params[] = "%" . $search . "%";
        $types .= 's';
    }
    
    $query .= " ORDER BY created_at DESC";

    $stmt = $conn->prepare($query);
    if ($stmt) { // ĐÃ THÊM: Kiểm tra xem prepare có thành công không
        $stmt->bind_param($types, ...$params); // ĐÃ ĐIỀU CHỈNH: Sử dụng ...$params để truyền mảng tham số
        $stmt->execute();
        $result = $stmt->get_result();
        $posts_for_category = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        // 7. Chuyển đổi dữ liệu từ DB sang định dạng mà monan-category-content.php mong đợi
        foreach ($posts_for_category as $post) {
            $dishesData[] = [
                'id' => $post['id'],
                'title' => $post['title'],
                'thumbnail' => $post['thumbnail'], // ĐÃ SỬA: Dùng 'thumbnail' thay vì 'image'
                'overview' => $post['overview'],   // ĐÃ SỬA: Truyền overview nguyên bản
            ];
        }
    } else {
        error_log("Prepare statement failed in man.php: " . $conn->error); // Ghi log lỗi
    }
} else {
    error_log("Database connection is not established in man.php"); // Ghi log lỗi
}

// 8. Chỉ định file content chung mà layout.php sẽ include
$contentPage = __DIR__ . '/../content/monan-category-content.php';

// 9. Include layout.php để hiển thị toàn bộ trang với header, footer và nội dung động
include __DIR__ . '/../layout.php';

// LƯU Ý QUAN TRỌNG: XÓA THẺ ĐÓNG PHP NÀY NẾU NÓ LÀ DÒNG CUỐI CÙNG CỦA FILE.
// Điều này giúp tránh việc gửi các ký tự không mong muốn trước khi các header HTTP được gửi.
// ?>