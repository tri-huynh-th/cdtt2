<div class="pagination-section">
    <?php
    // Đảm bảo BASE_PATH được định nghĩa. Nó nên được định nghĩa trong layout.php.
    // Nếu vì lý do nào đó nó chưa được định nghĩa, đây là fallback an toàn.
    if (!defined('BASE_PATH')) {
        define('BASE_PATH', '/blogwebsite'); // Đảm bảo giá trị này khớp với thư mục gốc của bạn
    }

    // Lấy đường dẫn đầy đủ đến script hiện tại (ví dụ: /blogwebsite/trang-chu.php)
    $current_page_path = $_SERVER['SCRIPT_NAME'];

    // Chỉ hiển thị phân trang nếu có nhiều hơn 1 trang, hoặc nếu có bài viết và tổng số trang = 1
    if ($total_pages > 1 || $total_posts > 0):
    ?>
        <?php if ($current_page > 1): ?>
            <a href="<?= htmlspecialchars($current_page_path) ?>?page=<?= $current_page - 1 ?>" class="nav-button prev-button"><i class="fas fa-chevron-left"></i> Trở về</a>
        <?php else: ?>
            <a href="#" class="nav-button prev-button disabled"><i class="fas fa-chevron-left"></i> Trở về</a>
        <?php endif; ?>

        <?php
        // Logic hiển thị các số trang
        $num_links_to_show = 5; // Số lượng liên kết trang muốn hiển thị (ví dụ: 1, 2, 3, 4, 5)

        $start_page = max(1, $current_page - floor($num_links_to_show / 2));
        $end_page = min($total_pages, $current_page + floor($num_links_to_show / 2));

        // Điều chỉnh start_page và end_page để luôn hiển thị đủ số lượng liên kết nếu có thể
        if ($end_page - $start_page + 1 < $num_links_to_show) {
            if ($start_page == 1) {
                $end_page = min($total_pages, $start_page + $num_links_to_show - 1);
            } elseif ($end_page == $total_pages) {
                $start_page = max(1, $total_pages - $num_links_to_show + 1);
            }
        }
        // Đảm bảo rằng end_page không nhỏ hơn start_page
        $end_page = max($start_page, $end_page);


        // Hiển thị nút "1" và "..." nếu cần
        if ($start_page > 1) {
            // Đường dẫn cho nút "1"
            echo '<a href="' . htmlspecialchars($current_page_path) . '?page=1">1</a>';
            if ($start_page > 2) {
                echo '<span class="ellipsis">...</span>';
            }
        }

        // Hiển thị các số trang trong dải
        for ($i = $start_page; $i <= $end_page; $i++):
        ?>
            <a href="<?= htmlspecialchars($current_page_path) ?>?page=<?= $i ?>" class="<?= ($i == $current_page) ? 'current-page' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php
        // Hiển thị "..." và nút "Tổng số trang" nếu cần
        if ($end_page < $total_pages) {
            if ($end_page < $total_pages - 1) {
                echo '<span class="ellipsis">...</span>';
            }
            // Đường dẫn cho nút trang cuối cùng
            echo '<a href="' . htmlspecialchars($current_page_path) . '?page=' . $total_pages . '">' . $total_pages . '</a>';
        }
        ?>

        <?php if ($current_page < $total_pages): ?>
            <a href="<?= htmlspecialchars($current_page_path) ?>?page=<?= $current_page + 1 ?>" class="nav-button next-button">Trang tiếp <i class="fas fa-chevron-right"></i></a>
        <?php else: ?>
            <a href="#" class="nav-button next-button disabled">Trang tiếp <i class="fas fa-chevron-right"></i></a>
        <?php endif; ?>
    <?php endif; // End if total_pages > 1 or total_posts > 0 ?>
</div>