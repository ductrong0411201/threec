<!-- PROJECT -->
<!-- Header -->
<?php
$title    = get_field('project', 'option');
$top    = get_field('project_top', 'option');
$bottom    = get_field('project_bottom', 'option');
?>
<div class="wrap-section">

  <div class="container container-custom">
    <!-- Tiêu đề -->
    <div class="section-title-top">
      <small>Showcase</small>
      <h2><?php echo $title ?></h2>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4 pt-4">

      <!-- Danh mục -->
      <h4 class="text-white mb-4"><?php echo $top ?></h4>
      <div class="text-center mb-5 d-flex group-icon-btn">
        <?php
        $btn_icon_url = get_stylesheet_directory_uri() . '/assets/src/images/top-icon.png';
        ?>
        <img src="<?php echo $btn_icon_url ?>" alt="icon">
        <button class="btn btn-view-more">Xem thêm</button>
      </div>
    </div>


    <!-- Lưới ảnh -->
    <div class="row g-4">


      <?php
      $items = array();
      $query = new WP_Query(array(
        'post_type' => 'video-upload',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'no_found_rows' => true,
        'ignore_sticky_posts' => true,
        // 'category_name' => 'cartoon-movie', // slug
      ));
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();
      ?>


          <div class="col-md-3 col-sm-6">
            <div class="movie-card">
              <?php the_content() ?>

            </div>
          </div>



      <?php }
        wp_reset_postdata();
      }
      ?>


    </div>
  </div>

  <!-- CARTOON SHORT CLIP -->
  <section class="container py-5">
    <div class="container">
      <div class="section-title">
        <h2><?php echo $bottom ?></h2>
        <button class="see-more">Xem thêm</button>
      </div>

      <!-- Hàng 1 -->
      <div class="image-row">
        <?php
        $query = new WP_Query(array(
          'post_type' => 'video-upload',
          'post_status' => 'publish',
          'posts_per_page' => 8,
          'no_found_rows' => true,
          'ignore_sticky_posts' => true,
          // 'category_name' => 'cartoon-short-clip',
        ));

        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post(); ?>
            <div class="image-item">
              <?php the_content(); ?>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>

    </div>
  </section>
</div>
<style>
  /* Header gradient */
  <?php
  $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/project-bg.png';
  ?>.wrap-section {
    background-image: url(<?php echo $bg_url ?>);

    min-height: 140vh;
    background-size: cover;
  }

  .section-title-top {
    text-align: center;
    margin-top: 60px;
    margin-bottom: 20px;
  }

  .section-title-top small {
    color: #ffcc00;
    font-weight: 600;
  }

  .section-title-top h2 {
    font-weight: 700;
    margin-top: 5px;
    color: white;
  }

  .btn-view-more {
    background-color: white;
    color: #0a3d91;
    border-radius: 25px;
    padding: 10px 25px;
    font-weight: 600;
    transition: 0.3s;
  }

  .btn-view-more:hover {
    background-color: #ffcc00;
    color: #0a3d91;
  }

  .movie-card {
    border-radius: 15px;
    overflow: hidden;
    background-color: #f5f5f5;
    color: black;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    position: relative;
  }

  .movie-card:hover {
    transform: translateY(-5px);
  }

  .movie-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
  }

  .movie-card .card-body {
    text-align: center;
    padding: 15px;
    background-color: transparent;
    position: absolute;
    width: 100%;
    bottom: 5px;
  }

  .movie-card .card-title {
    font-size: 14px;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  /* Hiệu ứng layout */
  .container-custom {
    /* margin-top: 40px; */
    padding-top: 60px;
    margin-bottom: 80px;
  }

  /* BOTTOM */
  .section-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
  }

  .section-title h2 {
    font-size: 28px;
    font-weight: 700;
  }

  .see-more {
    border: 1px solid #222;
    border-radius: 999px;
    padding: 8px 28px;
    background: transparent;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .see-more:hover {
    background: #222;
    color: #fff;
  }

  .group-icon-btn {
    flex-direction: column;
    align-items: center;
  }

  .group-icon-btn img {
    width: 70px;
    height: auto;
  }

  /* Lưới ảnh cho từng hàng */
  .image-row {
  display: flex;
  gap: 20px;
  flex-wrap: wrap; /* cho phép xuống dòng */
}

.image-item {
  flex: 0 0 calc(25% - 15px); /* 4 item 1 hàng */
  position: relative;
  overflow: hidden;
  border-radius: 12px;
  aspect-ratio: 16 / 9;
}

@media (max-width: 991px) {
  .image-item {
    flex: 0 0 calc(50% - 10px); /* 2 item 1 hàng */
  }
}

@media (max-width: 575px) {
  .image-item {
    flex: 0 0 100%; /* 1 item 1 hàng */
  }
}


  .image-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .image-item:hover img {
    transform: scale(1.05);
  }

  .image-item::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.4), transparent);
    z-index: 1;
  }

  .image-text {
    position: absolute;
    bottom: 12px;
    left: 16px;
    color: white;
    font-weight: 600;
    font-size: 14px;
    z-index: 2;
  }


  .image-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .image-item:hover img {
    transform: scale(1.05);
  }

  .image-item::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.4), transparent);
    z-index: 1;
  }

  .image-text {
    position: absolute;
    bottom: 12px;
    left: 16px;
    color: white;
    font-weight: 600;
    font-size: 14px;
    z-index: 2;
  }

  /* Hàng 1: so le */
  .row-1 .image-item:nth-child(1) {
    flex-basis: 30%;
  }

  .row-1 .image-item:nth-child(2) {
    flex-basis: 20%;
  }

  .row-1 .image-item:nth-child(3) {
    flex-basis: 30%;
  }

  .row-1 .image-item:nth-child(4) {
    flex-basis: 20%;
  }

  /* Hàng 2: so le khác */
  .row-2 .image-item:nth-child(1) {
    flex-basis: 20%;
  }

  .row-2 .image-item:nth-child(2) {
    flex-basis: 30%;
  }

  .row-2 .image-item:nth-child(3) {
    flex-basis: 20%;
  }

  .row-2 .image-item:nth-child(4) {
    flex-basis: 30%;
  }

  /* Responsive */
  @media (max-width: 991px) {
    .image-item {
      flex-basis: calc(50% - 10px) !important;
    }
  }

  @media (max-width: 575px) {
    .image-item {
      flex-basis: 100% !important;
    }
  }
</style>
<!--  -->