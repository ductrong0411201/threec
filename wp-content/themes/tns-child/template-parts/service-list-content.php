<!-- NEWS -->
<div class="container my-5">
    <!-- ===== NEWS ===== -->
    <section id="service-top-section">
        <h3 class="title-underline">DỊCH VỤ ANIMATION</h3>
        <div id="service-top-container">
            <?php
            $service_top_query = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => 4,
                'paged' => 1,
                'category_name' => 'animation-service',
            ]);
            if ($service_top_query->have_posts()):
                while ($service_top_query->have_posts()): $service_top_query->the_post(); ?>
                    <?php
                    $description = get_field('short_description');
                    ?>
                    <div class="blog-card mb-4">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="blog-img">
                        <div class="blog-content">

                            <h4 class="blog-title"><?php the_title(); ?></h4>
                            <p class="blog-desc"><?php echo wp_trim_words($description, 25); ?></p>
                            <div class="icon-bottom">
                                <a href="<?php the_permalink(); ?>" class="blog-arrow"><img src="/wp-content/themes/tns-child/assets/src/images/plus.png"></a>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <?php if ($service_top_query->found_posts > 4): ?>
            <button id="load-service-top" data-page="1" class="btn-more btn btn-primary mt-3">Xem thêm</button>
        <?php endif; ?>

    </section>

    <!-- ===== BLOG ===== -->
    <section id="service-bottom-section">
        <h3 class="title-underline">DỊCH VỤ PRODUCTION HOUSE</h3>
        <div id="service-bottom-container">
            <?php
            $service_bottom_query = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => 4,
                'paged' => 1,
                'category_name' => 'production-service',
            ]);
            if ($service_bottom_query->have_posts()):
                while ($service_bottom_query->have_posts()): $service_bottom_query->the_post(); ?>
                    <?php
                    $description = get_field('short_description');
                    ?>
                    <div class="blog-card mb-4">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="blog-img">
                        <div class="blog-content">

                            <h4 class="blog-title"><?php the_title(); ?></h4>
                            <p class="blog-desc"><?php echo wp_trim_words($description, 25); ?></p>
                            <div class="icon-bottom">
                                <a href="<?php the_permalink(); ?>" class="blog-arrow"><img src="/wp-content/themes/tns-child/assets/src/images/plus.png"></a>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <?php if ($service_bottom_query->found_posts > 4): ?>
            <button id="load-blog" data-page="1" class="btn-more btn btn-primary mt-3">Xem thêm</button>
        <?php endif; ?>

    </section>
</div>


<style>
    /* ===== NEWS ===== */
    /* ===== NEWS ===== */
    #service-top-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .title-underline {
        font-size: 20px;
        font-weight: 600;
        color: #6e1f2b;
        /* màu giống trong ảnh */
        position: relative;
        display: inline-block;
        letter-spacing: 1px;
        margin-bottom: 40px;
    }

    .title-underline::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -6px;
        /* khoảng cách giữa text và gạch */
        width: 40px;
        height: 2px;
        background-color: #6e1f2b;
    }



    /* ===== BLOG ===== */
    #service-bottom-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .blog-card {
        flex: 0 0 23%;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        display: flex;
        flex-direction: column;
    }

    .blog-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .blog-content {
        padding: 10px;
    }

    .blog-title {
        font-size: 1rem;
        margin: 5px 0;
    }

    .blog-desc {
        font-size: 0.9rem;
        color: #555;
        height: 80px;
        text-overflow: ellipsis;
    }

    .btn-more {
        background: #fff;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display: block;
        margin: 2rem auto 0;
        font-weight: 500;
        color: #333;
        text-decoration: none;
    }

    .btn-more:hover {
        background: #f5f5f5;
        color: #333;
    }

    .icon-bottom {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        #news-container {
            grid-template-columns: 1fr;
        }

        .blog-card {
            flex: 0 0 45%;
        }
    }

    @media (max-width: 576px) {
        #news-container {
            grid-template-columns: 1fr;
        }

        .blog-card {
            flex: 0 0 100%;
        }
    }
</style>

<script>
    jQuery(function($) {

        // ===== LOAD SERVICE TOP =====
        $('#load-service-top').on('click', function() {
            let button = $(this);
            let page = button.data('page');

            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: "POST",
                data: {
                    action: "load_service_top",
                    page: page
                },
                success: function(res) {
                    if ($.trim(res)) {
                        $("#service-top-container").append(res);
                        button.data("page", page + 1);
                    } else {
                        button.hide();
                    }
                }
            });
        });


        // ===== LOAD SERVICE BOTTOM =====
        $('#load-blog').on('click', function() {
            let button = $(this);
            let page = button.data('page');

            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: "POST",
                data: {
                    action: "load_service_bottom",
                    page: page
                },
                success: function(res) {
                    if ($.trim(res)) {
                        $("#service-bottom-container").append(res);
                        button.data("page", page + 1);
                    } else {
                        button.hide();
                    }
                }
            });
        });

    });
</script>