<!-- NEWS -->
<div class="container my-5">
    <!-- ===== NEWS ===== -->
    <section id="service-top-section">
        <div id="service-top-container">
            <?php
            $blog_query = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => 4,
                'paged' => 1
            ]);
            if ($blog_query->have_posts()):
                while ($blog_query->have_posts()): $blog_query->the_post(); ?>
                <?php
                    $description = get_field('short_description');
                    ?>
                    <div class="blog-card mb-4">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="blog-img">
                        <div class="blog-content">
                           
                            <h4 class="blog-title"><?php the_title(); ?></h4>
                            <p class="blog-desc"><?php echo wp_trim_words($description, 25); ?></p>
                            <a href="<?php the_permalink(); ?>" class="blog-arrow">↗</a>
                        </div>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <button id="load-service-top" data-page="1" class="btn btn-primary mt-3">Load more blogs</button>
    </section>

    <!-- ===== BLOG ===== -->
    <section id="service-bottom-section">
        <div id="service-bottom-container">
            <?php
            $blog_query = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => 4,
                'paged' => 1
            ]);
            if ($blog_query->have_posts()):
                while ($blog_query->have_posts()): $blog_query->the_post(); ?>
                <?php
                    $description = get_field('short_description');
                    ?>
                    <div class="blog-card mb-4">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="blog-img">
                        <div class="blog-content">
                            
                            <h4 class="blog-title"><?php the_title(); ?></h4>
                            <p class="blog-desc"><?php echo wp_trim_words($description, 25); ?></p>
                            <a href="<?php the_permalink(); ?>" class="blog-arrow">↗</a>
                        </div>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <button id="load-blog" data-page="1" class="btn btn-primary mt-3">Load more blogs</button>
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
        // --- LOAD NEWS ---
        $('#load-news').on('click', function() {
            let button = $(this);
            let page = button.data('page');

            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: 'POST',
                data: {
                    action: 'load_news',
                    page: page
                },
                success: function(res) {
                    if (res) {
                        $('#news-container').append(res);
                        button.data('page', page + 1);
                    } else {
                        button.hide(); // hide nếu hết bài
                    }
                }
            });
        });

        // --- LOAD BLOG ---
        $('#load-blog').on('click', function() {
            let button = $(this);
            let page = button.data('page');

            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: 'POST',
                data: {
                    action: 'load_blog',
                    page: page
                },
                success: function(res) {
                    if (res) {
                        $('#blog-container').append(res);
                        button.data('page', page + 1);
                    } else {
                        button.hide(); // hide nếu hết bài
                    }
                }
            });
        });
    });
</script>