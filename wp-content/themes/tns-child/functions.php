<?php

/**
 * Include init.php
 */
require_once get_theme_file_path() . '/inc/init.php';

/**
 * WooCommerce functions
 */
if (class_exists('WooCommerce')):
	require_once get_theme_file_path() . '/inc/woocommerce.php';
endif;

/**
 * Include layouts.php
 */
require_once get_theme_file_path() . '/inc/layouts.php';


function register_my_menus()
{
	register_nav_menus(
		array(
			'footer-menu' => __('Footer', 'tns_child'),
			'footer-menu-1' => __('Footer-1', 'tns_child'),
			'footer-menu-2' => __('Footer-2', 'tns_child'),
			'header-menu' => __('Header', 'tns_child'),
		)
	);
}
add_action('init', 'register_my_menus');


// AJAX load more cho phần blog và news
// --- NEWS ---
add_action('wp_ajax_load_news', 'ajax_load_news');
add_action('wp_ajax_nopriv_load_news', 'ajax_load_news');

function ajax_load_news() {
    $page = isset($_POST['page']) ? intval($_POST['page']) + 1 : 2;

    $query = new WP_Query([
        'post_type' => 'new',
        'posts_per_page' => 6,
        'paged' => $page
    ]);

    if($query->have_posts()):
        while($query->have_posts()): $query->the_post(); ?>
            <div class="news-item d-flex gap-3 mb-3">
                <div class="news-thumb"><?php the_post_thumbnail('medium'); ?></div>
                <div>
                    <span class="news-date"><?php the_time('M d, Y'); ?></span>
                    <h4 class="news-title"><?php the_title(); ?></h4>
                    <p class="news-desc"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </div>
            </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
    wp_die();
}

// --- BLOG ---
add_action('wp_ajax_load_blog', 'ajax_load_blog');
add_action('wp_ajax_nopriv_load_blog', 'ajax_load_blog');

function ajax_load_blog() {
    $page = isset($_POST['page']) ? intval($_POST['page']) + 1 : 2;

    $query = new WP_Query([
        'post_type' => 'blog',
        'posts_per_page' => 8,
        'paged' => $page
    ]);

    if($query->have_posts()):
        while($query->have_posts()): $query->the_post(); ?>
            <div class="blog-card mb-4">
                <img src="<?php the_post_thumbnail_url('large'); ?>" class="blog-img">
                <div class="blog-content">
                    <span class="blog-date"><?php the_time('M d, Y'); ?></span>
                    <h4 class="blog-title"><?php the_title(); ?></h4>
                    <p class="blog-desc"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                    <a href="<?php the_permalink(); ?>" class="blog-arrow">↗</a>
                </div>
            </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();
    wp_die();
}


add_action( 'phpmailer_init', 'smtp_gmail_wp' );
function smtp_gmail_wp( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = 'anh.viet2495@gmail.com';
    $phpmailer->Password   = 'pkeigaqjhldbckwh'; // App Password 16 ký tự
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->From       = 'anh.viet2495@gmail.com';
    $phpmailer->FromName   = 'Website ABC';
}

// Gửi mail từ form Contact
add_action('init', 'handle_contact_form');
function handle_contact_form() {
    if (!isset($_POST['submit_contact'])) return;

    $name    = sanitize_text_field($_POST['name']);
    $phone   = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = "anh.viet2495@gmail.com"; // Email của bạn để nhận thông tin

    $body = "
        <strong>Họ tên:</strong> $name<br>
        <strong>Số điện thoại:</strong> $phone<br>
        <strong>Tiêu đề:</strong> $subject<br><br>
        <strong>Nội dung:</strong><br>$message
    ";

    $sent = wp_mail($to, "Liên hệ mới từ website", $body, [
        'Content-Type: text/html; charset=UTF-8'
    ]);

    $redirect_url = esc_url_raw( add_query_arg( 'success', $sent ? 1 : 0, $_SERVER['REQUEST_URI'] ) );

    wp_redirect($redirect_url);
}
// Add menu khi sang màn mobile
add_filter('wp_nav_menu', 'add_mobile_item_after_menu', 10, 2);
function add_mobile_item_after_menu($nav_menu, $args) {
    if ($args->theme_location !== 'header-menu') {
        return $nav_menu;
    }

    // Item bạn muốn thêm
    $item = '<li class="menu-item mobile-extra"><a href="/lien-he">Liên hệ</a></li>';
    // $item = '<li class="menu-item mobile-extra"><a href="/?page_id=165">Liên hệ</a></li>';

    // Chèn trước thẻ </ul>
    $nav_menu = str_replace('</ul>', $item . '</ul>', $nav_menu);

    return $nav_menu;
}