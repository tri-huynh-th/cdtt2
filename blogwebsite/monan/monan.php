<?php
// BLOGWEBSITE/monan/monan.php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', '/blogwebsite');
}

$pageTitle = "Món Ăn | Bếp Anh Tài";

// Giữ nguyên dòng này, file layout.php đã sửa sẽ xử lý đường dẫn chính xác
$extraCss = "monan/monan.css"; 

// XÓA BỎ: Biến $extraHeadContent đã được xóa vì không cần thiết nữa.
// Hình ảnh và icon đã được xử lý đúng trong layout.php.

$contentPage = __DIR__ . '/../content/monan-content.php'; 

include __DIR__ . '/../layout.php';
?>
