<?php
$value_title    = get_field('value_title');
$value_1    = get_field('value_1');
$value_1_eng    = get_field('value_1_eng');
$value_1_des    = get_field('value_1_des');
$value_1_image    = get_field('value_1_image');
$value_2    = get_field('value_2');
$value_2_eng    = get_field('value_2_eng');
$value_2_des    = get_field('value_2_des');
$value_2_image    = get_field('value_2_image');
$value_3    = get_field('value_3');
$value_3_eng    = get_field('value_3_eng');
$value_3_des    = get_field('value_3_des');
$value_3_image    = get_field('value_3_image');
?>

<section class="core-value-section py-5">
    <div class="container text-center">

        <h2 class="text-white fw-bold mb-5"><?php echo $value_title ?></h2>

        <div class="row justify-content-center g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="value-card p-4 shadow-sm">
                    <div class="value-card-img">
                        <img src="<?php echo $value_1_image ?>" class="value-icon mb-3" alt="">
                    </div>
                    <div class="value-card-info">
                        <h4 class="fw-bold"><?php echo $value_1 ?></h4>
                        <p class="text-uppercase text-primary small fw-bold"><?php echo $value_1_eng ?></p>
                        <p><?php echo $value_1_des ?></p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="value-card p-4 shadow-sm">
                    <div class="value-card-img">

                        <img src="<?php echo $value_2_image ?>" class="value-icon mb-3" alt="">
                    </div>
                    <div class="value-card-info">

                        <h4 class="fw-bold"><?php echo $value_2 ?></h4>
                        <p class="text-uppercase text-primary small fw-bold"><?php echo $value_2_eng ?></p>
                        <p><?php echo $value_2_des ?></p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="value-card p-4 shadow-sm">
                    <div class="value-card-img">
                        <img src="<?php echo $value_3_image ?>" class="value-icon mb-3" alt="">
                    </div>
                    <div class="value-card-info">
                        <h4 class="fw-bold"><?php echo $value_3 ?></h4>
                        <p class="text-uppercase text-primary small fw-bold"><?php echo $value_3_eng ?></p>
                        <p><?php echo $value_3_des ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    <?php
    $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/about-core.png';
    ?>.core-value-section {
        padding-top: 80px;
        padding-bottom: 80px;
        background-image: url(<?php echo $bg_url ?>);
        overflow: hidden;
        min-height: 70vh;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
    }

    .value-card {
        background: white;
        border-radius: 20px;
        transition: all 0.25s ease;
    }

    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .value-card-img {
        display: flex;
        justify-content: flex-end;
    }

    .value-card-info {
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: flex-start;
    }

    .value-icon {
        width: 60px;
        height: 60px;
    }
</style>