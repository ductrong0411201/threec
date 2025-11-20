<section class="single-wrapper">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="entry-content">
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="related-posts-section py-5" style="background-color: #f7f6f5;">
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="section-title position-relative">
        BÀI VIẾT LIÊN QUAN
        <span class="underline position-absolute"></span>
    </h4>
    <a href="<?php echo get_post_type_archive_link('your_post_type'); ?>" class="btn btn-outline-dark rounded-pill">Xem thêm</a>
</div>

<div class="row g-4">
    <?php
    $posts = get_posts(array(
        'post_type' => 'blog', // đổi thành post type của bạn
        'numberposts' => 3, // số lượng bài viết hiển thị
    ));

    if($posts):
        foreach($posts as $post):
            setup_postdata($post);
            $thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
            $date = get_the_date('M d, Y', $post->ID);
            $excerpt = get_the_excerpt($post->ID);
    ?>
    <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0 rounded-3">
            <?php if($thumbnail): ?>
                <img src="<?php echo esc_url($thumbnail); ?>" class="card-img-top rounded-top-3" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <div class="card-body">
                <span class="text-muted small mb-2 d-block"><?php echo $date; ?></span>
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text text-muted"><?php echo wp_trim_words($excerpt, 20, '...'); ?></p>
                <a href="<?php the_permalink(); ?>" class="text-warning float-end">
                    <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
    <?php
        endforeach;
        wp_reset_postdata();
    endif;
    ?>
</div>
</div>
</section>


<style>
.related-posts-section .section-title {
    font-weight: 700;
    color: #7D203B; /* màu giống hình */
}

.related-posts-section .section-title .underline {
    width: 40px;
    height: 2px;
    background-color: #7D203B;
    bottom: -5px;
    left: 0;
}

.card-img-top {
    height: 180px;
    object-fit: cover;
}

.card-body a {
    font-size: 1.2rem;
}

@media(max-width: 767px){
    .related-posts-section .section-title {
        font-size: 1.2rem;
    }
    .card-img-top {
        height: 150px;
    }
}
</style>