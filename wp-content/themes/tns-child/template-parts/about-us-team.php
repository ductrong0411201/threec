<section class="team-section py-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-4 text-uppercase text-danger">Nhân Sự Chủ Chốt</h3>

        <div class="scroll-wrapper position-relative">

            <!-- LIST SCROLL NGANG -->
            <div id="teamScroll" class="scroll-container">

                <?php
                $args = array(
                    'post_type'      => 'member',   // TÊN POST TYPE CỦA BẠN
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) : ?>
                    <?php $i = 0; // bắt đầu từ 1 
                    ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>


                        <?php
                        $i++;
                        $position = get_field('position');
                        ?>


                        <!-- <div class="card-team card-<?php echo $i ?>">
            <div class="card-content">
              <div class="team-title">

                <h3><?php the_title(); ?></h3>
                <p><?php echo $position ?></p>
              </div>

              <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium'); // hoặc size khác: thumbnail, large...
                        } ?>

            </div>
          </div> -->

                        <div class="card-wrap">
                            <div class="member-card card-<?php echo $i ?>">
                                <h4 class="member-name"><?php the_title(); ?></h4>
                                <p class="member-role"><?php echo $position ?></p>
                                <div class="avatar-circle">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium'); // hoặc size khác: thumbnail, large...
                                    } ?>
                                </div>
                            </div>
                        </div>


                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata(); ?>


                <!-- Bạn có thể thêm nhiều card nữa -->
            </div>



        </div>
    </div>
</section>


<style>
    .scroll-wrapper {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    /* Container scroll ngang */
    .scroll-container {
        display: flex;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding: 20px 0;
        gap: 25px;
    }

    /* 4 card mặc định trên desktop */
    .card-wrap {
        flex: 0 0 calc(25% - 25px);
        display: flex;
        justify-content: center;
    }

    /* tablet = 2 card */
    @media (max-width: 991px) {
        .card-wrap {
            flex: 0 0 calc(50% - 20px);
        }
    }

    /* mobile = 1 */
    @media (max-width: 575px) {
        .card-wrap {
            flex: 0 0 100%;
        }
    }

    /* Card */
    .member-card {
        width: 100%;
        height: 480px;
        padding: 40px 0px;
        border-radius: 30px 30px 140px 140px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .member-card::before {
        content: "";
        position: absolute;
        top: 100px;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 140px;
        background: rgba(255, 255, 255, 0.2);
        /* màu cam nhạt hơn */
        z-index: 0;
    }

    .avatar-circle {
        /* background: rgba(255, 255, 255, 0.35); */
        width: 100%;
        height: 400px;
        /* border-radius: 50%; */
        margin: 0 auto;
        margin-top: -20px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        overflow: hidden;
    }

    .avatar-circle img {
        width: 250px;
        height: auto;
    }

    /* Nút scroll */
    .scroll-btn {
        position: absolute;
        top: 45%;
        transform: translateY(-50%);
        background: #fff;
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        z-index: 10;
    }

    .scroll-btn.left {
        left: -20px;
    }

    .scroll-btn.right {
        right: -20px;
    }

    .scroll-btn span {
        font-size: 22px;
        color: #8a1b2e;
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
</style>