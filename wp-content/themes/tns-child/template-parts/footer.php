 <?php 
 $title    = get_field('title', 'option');
 $description    = get_field('description', 'option');
 $phone    = get_field('phone', 'option');
 $mail    = get_field('mail', 'option');
 ?>
<div class="footer-wrapper">

  <footer class="footer-section py-5">
    <div class="container">

      <section class="footer-illustration">
        <div class="container">
          <div class="illustration-box">
            <div class="illustration-text">
              <h2><?php echo $title ?></h2>
              <p><?php echo $description ?></p>
              <div class="contact-info">
                <a href="tel:84987654321" class="btn btn-call">
                  <i class="fa fa-phone"></i> <?php echo $phone ?>
                </a>
                <a href="mailto:<?php echo $mail ?>" class="btn btn-mail">
                  <i class="fa fa-envelope"></i>
                </a>
              </div>
            </div>
            <!-- <div class="illustration-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-illustration.png" alt="ThreeC Illustration">
              </div> -->
          </div>
        </div>
      </section>
    </div>
    <div class="container">
      <div class="row gy-4 justify-content-between align-items-start">

        <!-- Logo -->
        <div class="col-12 col-md-4 text-center text-md-start footer-logo-wrap">
          <div class="header-logo d-flex align-items-center">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

            if (has_custom_logo()) {
              echo '<a href="' . esc_url(home_url('/')) . '">
			<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">
		  </a>';
            } else {
              echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
            }
            ?>
          </div>
          <div>

            <p class="small text-muted mb-0">©2025, ThreeC Studio. All right reserved.</p>
            <div class="small mt-1">
              <a href="#" class="text-muted me-3 text-decoration-none">Terms of Service</a> |
              <a href="#" class="text-muted ms-3 text-decoration-none">Privacy Policy</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-8">
          <div class="container-fluid">
            <div class="row">

              <!-- Về chúng tôi -->
              <div class="col-12 col-md-4">
                <h6 class="fw-bold mb-3">Về chúng tôi</h6>
                <?php wp_nav_menu(array(
                  'theme_location' => 'footer-menu',
                  'menu_class' => 'footer-menu',
                  'container' => 'nav',
                  'container_class' => 'footer-navigation',
                  'fallback_cb' => false,
                )); ?>
              </div>

              <!-- Animation -->
              <div class="col-12 col-md-4">
                <h6 class="fw-bold mb-3">Animation</h6>
                <?php wp_nav_menu(array(
                  'theme_location' => 'footer-menu-1',
                  'menu_class' => 'footer-menu-1',
                  'container' => 'nav',
                  'container_class' => 'footer-navigation',
                  'fallback_cb' => false,
                )); ?>
              </div>

              <!-- Production House -->
              <div class="col-12 col-md-4">
                <h6 class="fw-bold mb-3">Production House</h6>
                <?php wp_nav_menu(array(
                  'theme_location' => 'footer-menu-2',
                  'menu_class' => 'footer-menu-2',
                  'container' => 'nav',
                  'container_class' => 'footer-navigation',
                  'fallback_cb' => false,
                )); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Kết nối -->
      <div class="connect-us-wrap d-flex align-items-center justify-content-md-start justify-content-center gap-2">
        <button class="btn btn-light rounded-pill px-3 fw-semibold">KẾT NỐI VỚI CHÚNG TÔI</button>
        <a href="#" class="text-dark"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-dark"><i class="fab fa-facebook-messenger"></i></a>
        <a href="#" class="text-dark"><i class="fas fa-envelope"></i></a>
        <a href="#" class="text-dark"><i class="fas fa-phone"></i></a>
      </div>

      <!-- Scroll top -->
      <div class="scroll-top d-flex align-items-center justify-content-center" id="goTopBtn">
        <i class="fa-solid fa-arrow-up"></i>
      </div>
    </div>
  </footer>
</div>

<style>
  <?php
  $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/footer-bg.png';
  ?>.footer-illustration {
    background-image: url(<?php echo $bg_url ?>);
    overflow: hidden;
    background-size: cover;
    color: white;
    border-radius: 30px;
    margin: 60px auto;
    padding: 50px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .footer-illustration .illustration-text {
    flex: 1 1 45%;
  }

  .footer-illustration .illustration-text h2 {
    font-weight: 700;
    font-size: 28px;
    margin-bottom: 10px;
  }

  .footer-illustration .illustration-image {
    flex: 1 1 45%;
    text-align: right;
  }

  .footer-illustration .illustration-image img {
    max-width: 100%;
    height: auto;
    border-radius: 20px;
  }

  .footer-illustration .contact-info .btn {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 30px;
    color: white;
    padding: 10px 20px;
    margin-right: 10px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
  }

  .footer-illustration .contact-info .btn i {
    margin-right: 8px;
  }
  .btn-mail i {
    margin-right: 0px !important;
  }

  .footer-section {
    background-color: #f4f3f2;
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
    position: relative;
  }

  .footer-section h6 {
    color: #2b2b2b;
  }

  .footer-section a:hover {
    color: #b03a3a;
  }

  .footer-logo-wrap {
    height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .connect-us-wrap {
    position: absolute;
    bottom: 50px;
    right: 100px;
  }

  .footer-navigation ul li {
    color: #222;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
  }

  .footer-navigation ul li a {
    color: #222;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
  }

  /* Scroll top button */
  .scroll-top {
    position: fixed;
    bottom: 50px;
    right: 40px;
    background-color: #fff;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .scroll-top:hover {
    background-color: #b03a3a;
    color: #fff;
  }

  .scroll-top i {
    font-size: 16px;
  }
</style>

<script>
	// Lấy element
	const goTopBtn = document.getElementById("goTopBtn");

	// Hiện nút khi scroll xuống 200px
	window.addEventListener("scroll", () => {
		if (window.scrollY > 200) {
			goTopBtn.classList.add("show");
		} else {
			goTopBtn.classList.remove("show");
		}
	});

	// Click để scroll lên đầu
	goTopBtn.addEventListener("click", () => {
		window.scrollTo({
			top: 0,
			behavior: "smooth"
		});
	});
</script>