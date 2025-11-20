<!-- CORE VALUE -->
   <?php 
 $title    = get_field('value_title', 'option');
 $description    = get_field('value_description', 'option');
 ?>
<section class="core-value-section container-fluid py-5">
	<div class="container d-flex flex-wrap align-items-center justify-content-between">
		<!-- Left content -->
		<div class="core-left col-lg-4 col-md-12 mb-4 mb-lg-0">
			<h2 class="fw-bold core-title text-image"><?php echo $title ?></h2>
			<p>
				<?php echo $description ?>
			</p>
		</div>

		<!-- Right content -->
		<div class="core-right position-relative col-lg-8 col-md-12 text-center">
			<div class="core-image-wrapper position-relative">
				<!-- <img src="van-illustration.png" alt="core value image" class="img-fluid rounded-4 core-image">
				<div class="core-bubble">
					<h2 class="text-white fw-bold text-center text-image">CORE<br>VALUE</h2>
				</div>
				<div class="core-icon-circle">
					<i class="bi bi-gem"></i>
				</div> -->
			</div>
		</div>
	</div>
</section>

<style>
    <?php
    $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/value-bg.png';
    ?>
	.core-value-section {
		 background-image: url(<?php echo $bg_url ?>);
        overflow: hidden;
        min-height: 100vh;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
	}

	.core-title {
		font-size: 2.2rem;
		background: linear-gradient(90deg, #c17b26, #ff885f);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
	}

	.core-left ul {
		list-style-type: disc;
		padding-left: 1.5rem;
		font-size: 1rem;
		color: #333;
	}

	.core-image-wrapper {
		position: relative;
		display: inline-block;
	}

	.core-image {
		border-radius: 20px;
		box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
		max-width: 500px;
	}

	.core-bubble {
		position: absolute;
		bottom: 15%;
		right: -5%;
		background: linear-gradient(135deg, #ff885f, #62c175);
		width: 220px;
		height: 220px;
		border-radius: 50% 40% 60% 40% / 50% 60% 40% 50%;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.core-icon-circle {
		position: absolute;
		top: -30px;
		left: -30px;
		background-color: #113d53;
		color: #fff;
		border-radius: 50%;
		width: 70px;
		height: 70px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 1.8rem;
	}

    /*  */
    /*  */
    .text-image {
    font-size: 100px;
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.1;
    background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)),url(<?php echo $bg_url ?>) center/350% no-repeat;
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }

  /* Hiệu ứng nếu muốn thêm đổ bóng nhẹ cho chữ */
  .text-image::selection {
    background: transparent;
  }
</style>
<!--  -->