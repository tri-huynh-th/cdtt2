<?php
// BLOGWEBSITE/content/monan-category-content.php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', '/blogwebsite');
}

if (!isset($categoryTitle) || !isset($categoryDescription) || !isset($dishesData)) {
    $categoryTitle = "Danh mục không xác định";
    $categoryDescription = "Đã xảy ra lỗi khi tải thông tin danh mục hoặc chưa có dữ liệu.";
    $dishesData = [];
}
?>

<div class="container monan-category-page">
    <div class="intro-box">
        <h1 class="section-title"><?php echo htmlspecialchars($categoryTitle); ?></h1>
        <p class="intro-text"><?php echo htmlspecialchars($categoryDescription); ?></p>
        
        <form action="" method="GET" class="search-bar-inner">
            <input type="text" placeholder="Tìm kiếm bài viết..." class="search-input-inner" name="q">
            <button type="submit" class="search-button-inner">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="dishes-grid">
        <?php if (!empty($dishesData)): ?>
            <?php foreach ($dishesData as $dish): ?>
                <?php
                    // ✅ Bỏ chữ "Hướng Dẫn" nếu có ở đầu title
                    $displayTitle = preg_replace('/^Hướng Dẫn\s*/iu', '', $dish['title']);
                ?>
                <div class="dish-card">
                    <a href="<?php echo BASE_PATH; ?>/monan/congthuc.php?id=<?php echo $dish['id']; ?>">
                        <img src="<?php echo htmlspecialchars($dish['thumbnail']); ?>" 
                             alt="<?php echo htmlspecialchars($dish['title']); ?>" 
                             class="dish-img">
                    </a>

                    <div class="dish-content">
                        <a href="<?php echo BASE_PATH; ?>/monan/congthuc.php?id=<?php echo $dish['id']; ?>" class="dish-title">
                            <?php echo htmlspecialchars($displayTitle); ?>
                        </a>
                        <p class="dish-description"><?php echo htmlspecialchars(truncateText($dish['overview'], 150)); ?></p>
                    </div>

                    <div class="favorite-icon" data-recipe-id="<?php echo $dish['id']; ?>" title="Thêm vào yêu thích">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center w-100">Hiện chưa có món ăn nào trong danh mục này.</p>
        <?php endif; ?>
    </div>

    <div class="pagination">
        <a href="#" class="page-link">&lt; Trở về</a>
        <a href="#" class="page-link active">1</a>
        <a href="#" class="page-link">2</a>
        <a href="#" class="page-link">3</a>
        <a href="#" class="page-link">...</a>
        <a href="#" class="page-link">5</a>
        <a href="#" class="page-link">Tiếp &gt;</a>
    </div>
</div>

<?php
/*
if (!function_exists('truncateText')) {
    function truncateText($text, $maxLength) {
        if (strlen($text) > $maxLength) {
            $text = substr($text, 0, $maxLength);
            $text = substr($text, 0, strrpos($text, ' ')) . '...';
        }
        return $text;
    }
}
*/
?>