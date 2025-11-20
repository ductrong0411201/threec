<?php

/**
 * Template part for displaying title page with breadcrumb
 * 
 * @param string $title - Page title
 * @param array $breadcrumb - Breadcrumb items array
 */

// Get parameters from args
$args = wp_parse_args($args, array(
    'title' => get_the_title(),
    'breadcrumb' => array(),
));

$title = $args['title'];
$breadcrumb = $args['breadcrumb'];
?>

<section class="page-banner">
    <div class="container">
        <div class="title-page-content">
            <h1 class="title-page-title"><?php echo $title ?></h1>
            <div class="title-page-breadcrumb">
                <?php if (!empty($breadcrumb)): ?>
                    <?php foreach ($breadcrumb as $index => $item): ?>
                        <?php if ($index > 0): ?>
                            <span class="breadcrumb-separator">  &#8226; </span>
                        <?php endif; ?>
                        <?php if (isset($item['url']) && !empty($item['url'])): ?>
                            <a href="<?php echo esc_url($item['url']); ?>" class="breadcrumb-link">
                                <?php echo esc_html($item['text']); ?>
                            </a>
                        <?php else: ?>
                            <span class="breadcrumb-current"><?php echo esc_html($item['text']); ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
    <?php $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/breadcrum-banner.png'; ?>.page-banner {
        background-image: url(<?php echo $bg_url; ?>);
        padding: 80px 0;
        min-height: 50vh;
        background-size: cover;
        display: flex;
        align-items: flex-end;
        /* dùng flex-end thay vì 'end' */
        justify-content: flex-start;
        /* dùng flex-start thay vì 'start' */
    }

    .breadcrumb-link {
        color: #fff !important;
    }

    .title-page-title {
        color: #fff
    }

    .page-banner .container {
        /* đảm bảo nội dung không bị căn lề lệch do flex */
        width: 100%;
    }

    .banner-title {
        font-size: 42px;
        margin: 0 0 10px 0;
    }

    .title-page-breadcrumb {
        font-size: 16px;
        opacity: 0.95;
    }

    .breadcrumb-link {
        color: #ffd54a;
        text-decoration: none;
    }

    .breadcrumb-link:hover {
        text-decoration: underline;
    }

    .breadcrumb-current {
        color: #ffffff;
    }

    .breadcrumb-separator {
        margin: 0 8px;
        color: rgba(255, 255, 255, 0.7);
    }
</style>