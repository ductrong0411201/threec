<!-- TEAM -->
<?php
$title    = get_field('team_title', 'option');
?>
<section class="creative-team-section container-fluid py-5 text-center">
  <div class="container">

    <h2 class="fw-bold mb-5 position-relative d-inline-block">
      <?php echo $title ?>
      <span class="underline"></span>
    </h2>

    <div class="row justify-content-center g-4">
      <!-- Member 1 -->
      <!-- <div class="col-6 col-md-3">
				<div class="team-card yellow">
					<img src="member1.png" alt="Trang" class="team-photo img-fluid">
					<h4 class="mt-3 fw-bold text-white">TRANG</h4>
					<p class="text-white-50">Designer</p>
				</div>
			</div> -->
      <?php
      $args = array(
        'post_type'      => 'member',   // TÊN POST TYPE CỦA BẠN
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC'
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) : ?>
      <?php $i = 0; // bắt đầu từ 1 ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>


          <?php
           $i++;
          $position = get_field('position');
          ?>


          <div class="card-team card-<?php echo $i ?>">
            <div class="card-content">
              <div class="team-title">

                <h3><?php the_title(); ?></h3>
                <p><?php echo $position ?></p>
              </div>

              <?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium'); // hoặc size khác: thumbnail, large...
              } ?>

            </div>
          </div>


        <?php endwhile; ?>
      <?php endif;
      wp_reset_postdata(); ?>
      <!-- <div class="card-team card-1">
        <div class="card-content">
          <div class="team-title">

            <h3>QUỲNH</h3>
            <p>Designer</p>
          </div>
          <img src="https://picsum.photos/300/400?random=1" alt="Quynh">
        </div>
      </div>

      <div class="card-team card-2">
        <div class="card-content">
          <div class="team-title">

            <h3>QUỲNH</h3>
            <p>Designer</p>
          </div>
          <img src="https://picsum.photos/300/400?random=1" alt="Quynh">
        </div>
      </div>

      <div class="card-team card-3">
        <div class="card-content">
          <div class="team-title">

            <h3>QUỲNH</h3>
            <p>Designer</p>
          </div>
          <img src="https://picsum.photos/300/400?random=1" alt="Quynh">
        </div>
      </div>

      <div class="card-team card-4">
        <div class="card-content">
          <div class="team-title">

            <h3>QUỲNH</h3>
            <p>Designer</p>
          </div>
          <img src="https://picsum.photos/300/400?random=1" alt="Quynh">
        </div>
      </div> -->
    </div>

    <div class="mt-5">
      <button class="btn btn-light rounded-pill px-5 py-2 shadow-sm">Xem thêm</button>
    </div>
  </div>
</section>
<style>
  <?php
  $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/team-bg.png';
  ?>.creative-team-section {
    background-image: url(<?php echo $bg_url ?>);
    overflow: hidden;
    min-height: 120vh;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .creative-bg-title {
    font-size: 6rem;
    font-weight: 700;
    color: rgba(0, 0, 0, 0.05);
    position: absolute;
    width: 100%;
    top: 20px;
    left: 0;
    text-align: center;
    letter-spacing: 4px;
    z-index: 0;
  }

  .creative-team-section h2 {
    position: relative;
    z-index: 1;
    font-size: 1.8rem;
  }

  .underline {
    display: block;
    width: 60px;
    height: 3px;
    background: #d2a33f;
    margin: 8px auto 0;
    border-radius: 3px;
  }

  .team-card {
    position: relative;
    border-radius: 100px;
    height: 380px;
    padding: 30px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
  }

  .team-card img.team-photo {
    width: 100%;
    height: auto;
    border-radius: 0 0 80px 80px;
    object-fit: cover;
    margin-top: auto;
  }

  .team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  }

  .yellow {
    background: linear-gradient(180deg, #f6c800, #e9a800);
  }

  .orange {
    background: linear-gradient(180deg, #e28b12, #e65d00);
  }

  .red {
    background: linear-gradient(180deg, #d9531e, #c93d00);
  }

  .purple {
    background: linear-gradient(180deg, #8a1f3f, #6b1033);
  }

  .btn-light {
    font-weight: 500;
    color: #333;
  }

  /*  */
  .card-team {
    position: relative;
    width: 280px;
    height: 500px;
    border-radius: 140px;
    /* bo tròn phía trên */
    overflow: hidden;

    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
    margin: 30px 20px;
  }

  .team-title {
    padding-bottom: 60px;
  }

  .card-team::before {
    content: "";
    position: absolute;
    top: 140px;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 140px;
    background: rgba(255, 255, 255, 0.2);
    /* màu cam nhạt hơn */
    z-index: 0;
  }

  .card-1 {
    background: #E9B806;
  }

  .card-2 {
    background: #D0831D;
  }

  .card-3 {
    background: #BC5930;
  }

  .card-4 {
    background: #7D203B;
  }

  .card-content {
    position: relative;
    z-index: 1;
    text-align: center;
    padding-top: 10%;
  }

  .card-team h3 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
  }

  .card-team p {
    margin: 4px 0 16px;
    font-size: 14px;
    opacity: 0.9;
  }

  .card-team img {
    width: 250px;
    height: auto;
    border-radius: 12px;
    position: relative;
    z-index: 2;
  }
</style>
<!--  -->