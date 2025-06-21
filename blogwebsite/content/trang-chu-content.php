<?php
// content/trang-chu-content.php

require_once __DIR__ . '/../includes/config.php';

// Các biến $posts_per_page, $current_page, $total_posts, $total_pages
// sẽ được định nghĩa ở đây.
// BASE_PATH được định nghĩa trong layout.php.

// Cấu hình phân trang
$posts_per_page = 6; // Số bài viết mỗi trang

// Lấy trang hiện tại từ URL, mặc định là 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) {
    $current_page = 1;
}

// Lấy tổng số bài viết
$total_posts_sql = "SELECT COUNT(*) AS total FROM posts";
$total_posts_result = $conn->query($total_posts_sql);
$total_posts_row = $total_posts_result->fetch_assoc();
$total_posts = $total_posts_row['total'];

// Tính tổng số trang
// Đảm bảo total_pages ít nhất là 1 nếu có bài viết, hoặc 0 nếu không có
$total_pages = ($total_posts > 0) ? ceil($total_posts / $posts_per_page) : 1;

// Đảm bảo trang hiện tại không vượt quá tổng số trang
if ($current_page > $total_pages) {
    $current_page = $total_pages;
}

// Tính OFFSET cho truy vấn SQL
$offset = ($current_page - 1) * $posts_per_page;
if ($offset < 0) $offset = 0; // Đảm bảo offset không âm

// Truy vấn SQL để lấy bài viết cho trang hiện tại
$sql = "SELECT id, title, thumbnail, overview FROM posts ORDER BY created_at DESC LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $posts_per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="hero-section">
    <div class="background-overlay"></div>
    <div class="hero-content">
        <h2 class="blog-title">Blog nấu ăn</h2>
        <h1 class="cooking-slogan">Học nấu ăn cùng <span class="great-vibes">Bếp Anh Tài</span></h1>
    </div>
</div>

<div class="content-wrapper">
    <div class="section-title">
        <h1>Tất cả <em>bài viết</em></h1>
    </div>

    <div class="dishes-section">
    <?php
    if ($result && $result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
    ?>
                <div class="dish-card">
                    <a href="<?= BASE_PATH ?>/monan/congthuc.php?id=<?= $row['id'] ?>">
                        <img src="<?= htmlspecialchars($row['thumbnail']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                    </a>
                    <div class="favorite-icon">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="dish-content">
                        <h3>
                            <a href="<?= BASE_PATH ?>/monan/congthuc.php?id=<?= $row['id'] ?>" style="text-decoration: none; color: inherit;">
                                <?= htmlspecialchars($row['title']) ?>
                            </a>
                        </h3>
                        <p class="dish-description"><?= htmlspecialchars($row['overview']) ?></p>
                    </div>
                </div>
        <?php
            endwhile;
        else:
            echo "<p>Chưa có bài viết nào.</p>";
        endif;
        $stmt->close(); // Đóng statement
        ?>
</div>

<?php
// Nhúng tệp phân trang riêng biệt
// Các biến như $current_page, $total_pages, $total_posts 
// sẽ được sử dụng trong includes/pagination.php
require_once __DIR__ . '/../includes/pagination.php';
?>

</div>

<?php
$conn->close(); // Đóng kết nối cơ sở dữ liệu sau khi tất cả các truy vấn đã được thực hiện