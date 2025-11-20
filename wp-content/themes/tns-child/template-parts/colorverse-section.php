<!-- ========== HERO / COLORVERSE SECTION ========== -->
<!-- <?php
		$title    = get_field('color', 'option');
		$description    = get_field('color_description', 'option');
		?>
<section class="colorverse-section d-flex align-items-center text-white">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-7 col-12">
				<h2 class="fw-bold mb-3"><?php echo $title ?></h2>
				<p class="mb-3">
					<?php echo $description ?>
				</p>
				<p class="mb-4">
					<strong>Trạng thái:</strong> <span class="text-warning">Hoàn thành</span> &nbsp; | &nbsp;
					<strong>Dự kiến ra mắt:</strong> <span class="text-warning">20.12.2025</span>
				</p>
				<button class="btn btn-dark rounded-pill px-4 fw-semibold btn-project-detail">Chi tiết dự án</button>

				

			</div>
			<div class="col-lg-6 col-md-5 d-none d-md-block">
				<div class="thumb-scroll">
					<div class="thumb-item active">
						<img src="https://picsum.photos/id/1018/600/600" />
					</div>

					<div class="thumb-item">
						<img src="https://picsum.photos/id/1033/600/600" />
					</div>

					<div class="thumb-item">
						<img src="https://picsum.photos/id/1057/600/600" />
					</div>

					<div class="thumb-item">
						<img src="https://picsum.photos/id/1069/600/600" />
					</div>

					<div class="thumb-item">
						<img src="https://picsum.photos/id/1084/600/600" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<?php
// Lấy tất cả bài viết thuộc post type 'colorverse'
$colorverse_posts = get_posts([
	'post_type' => 'projects',
	'numberposts' => -1
]);
?>
<section class="colorverse-section d-flex align-items-center text-white">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-7 col-12">
				<!-- Thông tin bên trái -->
				<h2 class="fw-bold mb-3" id="color-title">
					<?php echo !empty($colorverse_posts) ? get_the_title($colorverse_posts[0]->ID) : ''; ?>
				</h2>
				<p class="mb-3" id="color-description">
					<?php echo !empty($colorverse_posts) ? get_field('short_description', $colorverse_posts[0]->ID) : ''; ?>
				</p>
				<p class="mb-4" id="color-status">
					<strong>Trạng thái:</strong> <span class="text-warning"><?php echo !empty($colorverse_posts) ? get_field('status', $colorverse_posts[0]->ID) : ''; ?></span> &nbsp; | &nbsp;
					<strong>Dự kiến ra mắt:</strong> <span class="text-warning"><?php echo !empty($colorverse_posts) ? get_field('launch_date', $colorverse_posts[0]->ID) : ''; ?></span>
				</p>
				<button class="btn px-4 fw-semibold"><a id="btn-detail-link"
						href="<?php echo !empty($colorverse_posts) ? get_permalink($colorverse_posts[0]->ID) : '#'; ?>"
						class="btn btn-dark rounded-pill px-4 fw-semibold btn-project-detail">
						Chi tiết dự án
					</a></button>
			</div>

			<div class="col-lg-6 col-md-5">
				<div class="thumb-scroll">
					<?php foreach ($colorverse_posts as $index => $post):
						$img = get_the_post_thumbnail_url($post->ID, 'full'); // field ảnh
					?>

						<div class="thumb-item <?php echo $index === 0 ? 'active' : ''; ?>"
							data-description="<?php echo esc_attr(get_field('short_description', $post->ID)); ?>"
							data-title="<?php echo esc_attr(get_the_title($post->ID)); ?>"
							data-status="<?php echo esc_attr(get_field('status', $post->ID)); ?>"
							data-launch="<?php echo esc_attr(get_field('launch_date', $post->ID)); ?>"
							data-link="<?php echo esc_url(get_permalink($post->ID)); ?>">
							<img src="<?php echo esc_url($img); ?>" alt="" />
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	/* ========== COLORVERSE SECTION ========== */
	<?php
	$bg_url = get_stylesheet_directory_uri() . '/assets/src/images/color-bg.png';
	?>.colorverse-section {
		background-image: url(<?php echo $bg_url ?>);
		overflow: hidden;
		min-height: 100vh;
		background-size: cover;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.colorverse-section img {
		border-radius: 12px;
	}

	.small-thumbnails img {
		width: 100px;
		height: 75px;
		object-fit: cover;
		border-radius: 10px;
		transition: all 0.3s ease;
	}

	.small-thumbnails img:hover {
		transform: scale(1.05);
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
	}

	/*  */
	.thumb-scroll {
		margin-top: -70px;
		padding: 20px 0;
		display: flex;
		gap: 20px;
		overflow-x: auto;
		scroll-behavior: smooth;
		padding-left: 40px;
		height: 450px;
		align-items: end;
	}

	.thumb-scroll::-webkit-scrollbar {
		height: 8px;
	}

	.thumb-scroll::-webkit-scrollbar-thumb {
		background: rgba(255, 255, 255, 0.3);
		border-radius: 10px;
	}

	.thumb-item {
		min-width: 220px;
		height: 220px;
		border-radius: 20px;
		overflow: hidden;
		border: 4px solid transparent;
		transition: 0.3s;
		cursor: pointer;
	}

	.thumb-item:hover {
		border-color: #ffffff;
		height: 300px;
		z-index: 2;
	}

	.thumb-item img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform 0.3s ease;
	}

	.btn-project-detail {
		background-color: rgba(255, 255, 255, 0.1);
	}

	/* ======== RESPONSIVE COLORVERSE SECTION ======== */

	/* TABLET (≤ 991px) */
	@media (max-width: 991px) {

		.colorverse-section {
			min-height: auto;
			padding: 60px 0;
			text-align: center;
		}

		.colorverse-section .row {
			flex-direction: column-reverse;
		}

		.thumb-scroll {
			margin-top: 20px;
			padding-left: 0;
			justify-content: center;
			height: auto;
		}

		.thumb-item {
			min-width: 160px;
			height: 160px;
		}

		.thumb-item:hover {
			height: 190px;
		}
	}

	/* MOBILE (≤ 767px) */
	@media (max-width: 767px) {

		.colorverse-section {
			padding: 40px 0;
		}

		#color-title {
			font-size: 24px;
		}

		#color-description {
			font-size: 14px;
		}

		#color-status {
			font-size: 13px;
		}

		.btn-project-detail {
			width: 100%;
			padding: 10px 0;
			font-size: 16px;
		}

		/* Scroll ảnh dưới dạng thanh ngang */
		.thumb-scroll {
			display: flex;
			gap: 15px;
			overflow-x: auto;
			padding: 10px 0;
			height: auto;
			margin-top: 25px;
		}

		.thumb-item img {
        height: 100%;
    }

		.thumb-scroll::-webkit-scrollbar {
			height: 6px;
		}

		.thumb-item {
			min-width: 130px;
			height: 130px;
			border-radius: 14px;
		}

		.thumb-item:hover {
			height: 150px;
			border-color: #fff;
		}
	}

	/* SMALL MOBILE (≤ 480px) */
	@media (max-width: 480px) {
		.thumb-item {
			min-width: 110px;
			height: 110px;
		}

		.thumb-item:hover {
			height: 130px;
		}

		#color-title {
			font-size: 20px;
		}
	}
</style>
<!--  -->

<!-- <script>
	document.addEventListener("DOMContentLoaded", function() {
		const imgs = document.querySelectorAll('.thumb-item img');

		imgs.forEach(img => {
			img.addEventListener('click', () => {
				imgs.forEach(i => i.classList.remove('active'));
				img.classList.add('active');
			});
		});
	});
</script> -->
<script>
	document.addEventListener("DOMContentLoaded", function() {
		const thumbItems = document.querySelectorAll('.thumb-item');
		const titleEl = document.getElementById('color-title');
		const descEl = document.getElementById('color-description');
		const statusEl = document.getElementById('color-status');
		const btnDetail = document.getElementById('btn-detail-link');

		thumbItems.forEach(item => {
			item.addEventListener('click', () => {
				// Xoá active cũ
				thumbItems.forEach(i => i.classList.remove('active'));
				item.classList.add('active');

				// Cập nhật thông tin bên trái
				titleEl.textContent = item.dataset.title;
				descEl.textContent = item.dataset.description;
				statusEl.innerHTML = `<strong>Trạng thái:</strong> <span class="text-warning">${item.dataset.status}</span> &nbsp; | &nbsp;
									  <strong>Dự kiến ra mắt:</strong> <span class="text-warning">${item.dataset.launch}</span>`;
				btnDetail.href = item.dataset.link;
			});
		});
	});
</script>