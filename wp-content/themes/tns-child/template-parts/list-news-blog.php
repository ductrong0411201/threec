<!-- NEWS -->
<div class="container my-5">
    <!-- ===== NEWS ===== -->
    <section id="news-section" class="mb-5">
        <div class="section-title mb-5">NEWS</div>
        <div id="news-container">
            <?php
            $news_query = new WP_Query([
                'post_type' => 'new',
                'posts_per_page' => 6,
                'paged' => 1
            ]);
            if ($news_query->have_posts()):
                while ($news_query->have_posts()): $news_query->the_post(); ?>
                    <?php
                    $description = get_field('short_description');
                    ?>
                    <div class="news-item d-flex gap-3 mb-3">
                        <div class="news-thumb"><?php the_post_thumbnail('medium'); ?></div>
                        <div>
                            <h4 class="news-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
                            <span class="news-date"><?php the_time('M d, Y'); ?></span>
                            <p class="news-desc"><?php echo wp_trim_words($description, 25); ?></p>
                        </div>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <button id="load-news" data-page="1" class="btn btn-more mt-3">Xem thêm</button>
    </section>

    <!-- ===== BLOG ===== -->
    <section id="blog-section">
        <div class="section-title mb-5">BLOGS</div>
        <div id="blog-container">
            <?php
            $blog_query = new WP_Query([
                'post_type' => 'blog',
                'posts_per_page' => 8,
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
                            <span class="blog-date"><?php the_time('M d, Y'); ?></span>
                            <h4 class="blog-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
                            <p class="blog-desc"><?php echo wp_trim_words($description, 25); ?></p>
                            <a href="<?php the_permalink(); ?>" class="blog-arrow">↗</a>
                        </div>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <button id="load-blog" data-page="1" class="btn btn-more mt-3">Xem thêm</button>
    </section>
</div>


<style>
    /* ===== NEWS ===== */
    /* ===== NEWS ===== */
    #news-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .news-item {
        display: flex;
        gap: 15px;
        border: 1px solid #eee;
        border-left: 0px;
        border-right: 0px;
        padding: 10px;
        /* border-radius: 8px; */
        background: #fff;
    }

    .news-thumb img {
        width: 200px;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
    }

    .news-title {
        font-size: 1.1rem;
        margin: 0 0 5px;
    }

    .news-title a {
        text-decoration: none;
        color: #343434
    }

    .news-desc {
        font-size: 0.9rem;
        color: #555;
    }

    .news-date {
            background: #F0F0F0;
    padding: 5px 10px;
    border-radius: 15px;
    color: #78060A
    }

    /* ===== BLOG ===== */
    #blog-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .blog-card {
        flex: 0 0 23%;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        background: #F4F4F4;
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

    .blog-title a {
        text-decoration: none;
        color: #343434
    }

    .blog-desc {
        font-size: 0.9rem;
        color: #555;
    }
    .blog-date {
            background: #FFFFFF;
    padding: 5px 10px;
    border-radius: 15px;
    color: #D59C12
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
	}

	.btn-more:hover {
		background: #f5f5f5;
	}

    .blog-arrow {
        color:#D59C12
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