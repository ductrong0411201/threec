<!-- ========== SERVICES SECTION ========== -->
<section class="services-section text-center py-5">
	<div class="container">
		<h6 class="text-warning">Services</h6>
		<h2 class="fw-bold mb-4">Dịch vụ</h2>

		<!-- WRAPPER CHO SCROLL NGANG -->
		<div class="services-scroll">
			<?php
      $args = array(
        'post_type'      => 'services',   // TÊN POST TYPE CỦA BẠN
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC'
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) : ?>
      
        <?php while ($query->have_posts()) : $query->the_post(); ?>


          <?php
          
          $description = get_field('short_description');
          ?>


		  <div class="service-card p-4">
				<?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium'); // hoặc size khác: thumbnail, large...
              } ?>
				<h5 class="fw-semibold"><?php the_title(); ?></h5>
				<p class="text-muted small"><?php echo $description ?></p>
			</div>


        <?php endwhile; ?>
      <?php endif;
      wp_reset_postdata(); ?>
			
		</div>
	</div>
</section>


<style>
	/* ========== SERVICES SECTION ========== */
    <?php
    $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/service-bg.png';
    ?>
	.services-section {
		background-image: url(<?php echo $bg_url ?>);
        overflow: hidden;
        min-height: 100vh;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
	}

	.service-card {
		background-color: #fff;
		border-radius: 16px;
		box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
		transition: all 0.3s ease;
		height: 100%;
	}
	.service-card img {
		width: 100px;
		height: auto;
	}

	.service-card:hover {
		transform: translateY(-6px);
		box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
	}

	.service-icon {
		width: 60px;
		height: 60px;
		object-fit: contain;
	}

	/* Scroll ngang */
.services-scroll {
	display: flex;
	gap: 20px;
	overflow-x: auto;
	padding-bottom: 10px;
	scroll-snap-type: x mandatory;
	scrollbar-width: none; /* Ẩn thanh scroll Firefox */
}

.services-scroll::-webkit-scrollbar {
	display: none; /* Ẩn scroll ở Chrome/Safari */
}

.services-scroll .service-card {
	max-width: 260px;     /* chiều rộng mỗi card khi scroll */
	height: 350px;
	scroll-snap-align: start;
	flex-shrink: 0;
}

	/* ========== RESPONSIVE ========== */
	@media (max-width: 992px) {
		.colorverse-section {
			text-align: center;
		}

		.small-thumbnails {
			justify-content: center;
		}
	}

	@media (max-width: 768px) {
		.colorverse-section {
			padding: 60px 0;
		}

		.small-thumbnails img {
			width: 80px;
			height: 60px;
		}

		.service-icon {
			width: 50px;
			height: 50px;
		}

		.service-card h5 {
			font-size: 1rem;
		}
	}

	@media (max-width: 576px) {
		.colorverse-section h2 {
			font-size: 1.6rem;
		}

		.colorverse-section p {
			font-size: 0.9rem;
		}

		.btn {
			font-size: 0.9rem;
			padding: 6px 18px;
		}
	}
</style>