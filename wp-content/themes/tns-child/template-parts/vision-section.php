<!-- VISION SECTION -->
  <?php 
 $title    = get_field('vision_title', 'option');
 $description    = get_field('vision_description', 'option');
 ?>
<section class="vision-section container-fluid py-5">
    <div class="container d-flex flex-wrap align-items-center justify-content-between">
        <!-- Left content -->
        <div class="vision-left position-relative col-lg-8 col-md-12 text-center mb-4 mb-lg-0">
            <div class="vision-bg">
                
            </div>
            
        </div>

        <!-- Right content -->
        <div class="vision-right col-lg-4 col-md-12">
            <div class="d-flex align-items-center mb-3">
                
                <h2 class="fw-bold vision-title text-image"><?php echo $title ?></h2>
            </div>
            <p>
                <?php echo $description ?>
            </p>
        </div>
    </div>
</section>
<style>
    <?php
    $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/vision-bg.png';
    ?>
    .vision-section {
        background-image: url(<?php echo $bg_url ?>);
        overflow: hidden;
        min-height: 100vh;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .vision-bg {
        /* background: linear-gradient(135deg, #a26bff, #8d4fff); */
        width: 260px;
        height: 260px;
        /* border-radius: 50% 40% 60% 40% / 50% 60% 40% 50%; */
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .vision-bg h2 {
        color: #fff;
        font-size: 2rem;
        letter-spacing: 1px;
        text-align: center;
    }

    .vision-image {
        width: 100%;
        max-width: 500px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .icon-circle {
        background-color: #113d53;
        color: #fff;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .vision-title {
        font-size: 2.2rem;
        background: linear-gradient(90deg, #a26bff, #ffa78c);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
    }

    ul {
        margin-top: 1rem;
        list-style-type: disc;
        padding-left: 1.5rem;
    }
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