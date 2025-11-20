<?php
// Lấy trang hiện tại
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query bài viết theo post type + ACF + phân trang
$args = array(
    'post_type' => 'video-upload',
    'post_status' => 'publish',
    'posts_per_page' => 16,
    'category_name' => 'commercial', // slug
    'paged' => $paged,
);

$query = new WP_Query($args);
?>

<div class="container py-5">
    <div class="row g-4">

        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>

                <div class="col-6 col-md-3">
                    <div class="card card-custom shadow-sm border-0">
                        <?php the_content() ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <p>Không có bài viết nào.</p>
        <?php endif; ?>

    </div>

    <!-- Phân trang -->
    <div class="mt-4">
        <?php
        echo paginate_links(array(
            'total'        => $query->max_num_pages,
            'current'      => $paged,
            'mid_size'     => 1,
            'prev_text'    => '«',
            'next_text'    => '»',
            'type'         => 'list', // trả về <ul><li>
            'before_page_number' => '<span class="page-number">',
            'after_page_number' => '</span>',
        ));
        ?>
    </div>


</div>

<?php wp_reset_postdata(); ?>

<style>
    .card-custom {
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        transition: transform .2s ease;
    }

    .card-custom figure {
        width: 100%;
        margin-bottom: 0px;
        object-fit: cover;
    }

    .card-custom:hover {
        transform: translateY(-6px);
    }

    .card-custom p {
        font-weight: 600;
        letter-spacing: .5px;
    }

    /* Style pagination */
    /* ================= Phân trang hiện đại ================= */
    /* ================= Phân trang hiện đại ngang ================= */
    .page-numbers {
        display: flex !important;
        justify-content: center;
        flex-wrap: wrap;
        list-style: none;
        padding-left: 0;
        margin-top: 30px;
    }

    .page-numbers li {
        margin: 0 5px;
        display: inline-flex;
    }

    .page-numbers li a,
    .page-numbers li span {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1px solid #ddd;
        background: #fff;
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .page-numbers li a:hover {
        background: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .page-numbers .current {
        background: #007bff;
        color: #fff;
        border-color: #007bff;
        pointer-events: none;
    }

    /* Mobile: nút nhỏ hơn */
    @media (max-width: 576px) {

        .page-numbers li a,
        .page-numbers li span {
            width: 32px;
            height: 32px;
            font-size: 12px;
        }
    }
</style>