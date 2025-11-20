 <?php
    $solution_title    = get_field('solution_title');
    $solution_1    = get_field('solution_1');
    $solution_1_eng    = get_field('solution_1_eng');
    $solution_1_des    = get_field('solution_1_des');
    $solution_1_image    = get_field('solution_1_image');
    $solution_2    = get_field('solution_2');
    $solution_2_eng    = get_field('solution_2_eng');
    $solution_2_des    = get_field('solution_2_des');
    $solution_2_image    = get_field('solution_2_image');
    $solution_3    = get_field('solution_3');
    $solution_3_eng    = get_field('solution_3_eng');
    $solution_3_des    = get_field('solution_3_des');
    $solution_3_image    = get_field('value_3_image');
    ?>

<section class="solution-section py-5">
    <div class="container">

        <h3 class="text-center fw-bold text-uppercase text-danger mb-4">
            <?php echo $solution_title ?>
        </h3>
        <div class="underline mx-auto mb-5"></div>

        <div class="row text-center solution-row">

            <!-- BOX 1 -->
            <div class="col-md-4 solution-box">
                <h4 class="fw-bold mt-3"><?php echo $solution_1 ?></h4>
                <p class="sub-title text-uppercase title-eng"><?php echo $solution_1_eng ?></p>
                <img src="<?php echo $solution_1_image ?>" class="icon-img" alt="">

                <p class="description"><?php echo $solution_1_des ?></p>
            </div>

            <!-- BOX 2 -->
            <div class="col-md-4 solution-box">
                <h4 class="fw-bold mt-3"><?php echo $solution_2 ?></h4>
                <p class="sub-title text-uppercase title-eng"><?php echo $solution_2_eng ?></p>
                <img src="<?php echo $solution_2_image ?>" class="icon-img" alt="">

                <p class="description"><?php echo $solution_2_des ?></p>
            </div>

            <!-- BOX 3 -->
            <div class="col-md-4 solution-box">
                <h4 class="fw-bold mt-3"><?php echo $solution_3 ?></h4>
                <p class="sub-title text-uppercase title-eng"><?php echo $solution_3_eng ?></p>
                <img src="<?php echo $solution_3_image ?>" class="icon-img" alt="">

                <p class="description"><?php echo $solution_3_des ?></p>
            </div>

        </div>
    </div>
</section>

<style>
     <?php
    $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/solution-bg.png';
    ?>
    .solution-section {
         background-image: url(<?php echo $bg_url ?>);
        overflow: hidden;
        min-height: 80vh;
        background-size: cover;
        padding: 80px 0;
        display: flex;
        align-items: center;
    }

    .title-eng {
        color: #620C21;
    }

    .underline {
        width: 80px;
        height: 3px;
        background: #8a1b2e;
    }

    .icon-img {
        width: 120px;
        height: 120px;
    }

    .solution-box .description {
        padding: 30px;
        text-align: justify;
    }

    .solution-list {
        max-width: 280px;
        margin-top: 20px;
    }

    .solution-list li {
        margin-bottom: 10px;
        font-size: 15px;
    }

    /* Đường kẻ dọc 2 bên cột giữa */
    .mid-box {
        position: relative;
    }

    .mid-box::before,
    .mid-box::after {
        content: "";
        position: absolute;
        top: 0;
        height: 100%;
        width: 1px;
        background: #bfc2c6;
    }

    .mid-box::before {
        left: -20px;
    }

    .mid-box::after {
        right: -20px;
    }
</style>