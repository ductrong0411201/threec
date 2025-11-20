<!-- BLOG -->
<section class="blog-section container py-5">

	<h2 class="title">Dịch vụ</h2>
	<p class="text-center text-warning fw-semibold mb-5">Services</p>

	<div class="row">
		<!-- NEWS -->
		<div class="col-lg-6 mb-4">
			<h5 class="section-title">NEWS</h5>
			<?php
			$args = array(
				'post_type'      => 'new',   // TÊN POST TYPE CỦA BẠN
				'posts_per_page' => 2,
				'orderby'        => 'date',
				'order'          => 'DESC'
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) : ?>

				<?php while ($query->have_posts()) : $query->the_post(); ?>


					<?php

					$description = get_field('short_description');
					$date = get_the_date('M d, Y');
					?>

					<div class="news-item mb-3 d-flex align-items-center">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('medium'); // hoặc size khác: thumbnail, large...
						} ?>
						<div class="content ms-3">
							<span class="date-tag"><?php echo $date ?></span>
							<h6 class="fw-bold mb-1"><?php the_title(); ?></h6>
							<p class="mb-0 small text-muted">
								<?php echo $description ?>
							</p>
						</div>
					</div>


				<?php endwhile; ?>
			<?php endif;
			wp_reset_postdata(); ?>

		</div>

		<!-- BLOG -->
		<div class="col-lg-6 mb-4">
			<h5 class="section-title text-end pe-3">BLOG</h5>

			<div class="row">
				<?php
				$args = array(
					'post_type'      => 'blog',   // TÊN POST TYPE CỦA BẠN
					'posts_per_page' => 2,
					'orderby'        => 'date',
					'order'          => 'DESC'
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) : ?>

					<?php while ($query->have_posts()) : $query->the_post(); ?>


						<?php

						$description = get_field('short_description');
						$date = get_the_date('M d, Y');
						?>

						<div class="col-md-6 mb-3">
							<div class="blog-item">
								<?php if (has_post_thumbnail()) {
									the_post_thumbnail('medium'); // hoặc size khác: thumbnail, large...
								} ?>
								<div class="content">
									<span class="date-tag bg-warning text-dark"><?php echo $date ?></span>
									<h6 class="fw-bold mb-1"><?php echo $title ?></h6>
									<p class="mb-0 small text-muted">
										<?php echo $description ?>
									</p>
								</div>
							</div>
						</div>


					<?php endwhile; ?>
				<?php endif;
				wp_reset_postdata(); ?>

			</div>
		</div>
	</div>

	<button class="btn-more">Xem thêm</button>
</section>
<style>
	<?php
	$bg_url = get_stylesheet_directory_uri() . '/assets/src/images/blog-bg.png';
	?>.blog-section {
		background-image: url(<?php echo $bg_url ?>);
		overflow: hidden;
		min-height: 100vh;
		background-size: cover;
	}

	h2.title {
		font-size: 2rem;
		font-weight: 600;
		text-align: center;
		margin-bottom: 1rem;
	}

	h1.bg-title {
		font-size: 6rem;
		font-weight: 700;
		text-align: center;
		color: rgba(0, 0, 0, 0.05);
		letter-spacing: 0.1em;
		margin-bottom: -2rem;
	}

	.section-title {
		font-weight: 700;
		position: relative;
		margin-bottom: 1.5rem;
	}

	.section-title::after {
		content: "";
		position: absolute;
		bottom: -6px;
		left: 0;
		width: 40px;
		height: 2px;
		background: #b00020;
	}

	.news-item,
	.blog-item {
		background: #fff;
		border-radius: 10px;
		overflow: hidden;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
		transition: transform 0.3s ease;
	}
	.news-item img {
		width: 50%;
		height: 180px;
		object-fit: cover;
	}
	.blog-item img {
		width: 100%;
		height: 180px;
		object-fit: cover;
	}

	.news-item:hover,
	.blog-item:hover {
		transform: translateY(-5px);
	}

	/* .news-item img,
	.blog-item img {
		width: 100%;
		height: 180px;
		object-fit: cover;
	} */

	.content {
		padding: 1rem;
	}

	.date-tag {
		display: inline-block;
		background: #ffe0e0;
		color: #b00020;
		border-radius: 20px;
		padding: 2px 10px;
		font-size: 0.8rem;
		font-weight: 600;
		margin-bottom: 0.5rem;
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
</style>