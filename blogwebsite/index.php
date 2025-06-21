<?php
// trang-chu.php

// 1. Định nghĩa các biến cần thiết cho layout.php
$pageTitle = "Trang chủ - Bếp Anh Tài"; // Tiêu đề hiển thị trên tab trình duyệt
$extraCss = "assets/homepage.css";      // CSS riêng cho bố cục nội dung trang chủ

// 2. Chỉ định file nội dung chính của trang này.
// Đây là đường dẫn tương đối từ vị trí của trang-chu.php đến file content.
$contentPage = 'content/trang-chu-content.php'; 

// Không cần định nghĩa $main_page_file ở đây nữa,
// vì pagination.php sẽ sử dụng $_SERVER['SCRIPT_NAME'] để tự động lấy đường dẫn.

// 3. Cuối cùng, include file layout.php để hiển thị toàn bộ trang
// layout.php sẽ sử dụng các biến $pageTitle, $extraCss, và $contentPage đã định nghĩa ở trên.
include 'layout.php';
?>