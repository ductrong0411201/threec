<?php
$items = array();
$query = new WP_Query(array(
  'post_type' => 'video-upload',
  'post_status' => 'publish',
  'posts_per_page' => 8,
  'no_found_rows' => true,
  'ignore_sticky_posts' => true,
));
$query2 = new WP_Query(array(
  'post_type' => 'new',
  'post_status' => 'publish',
  'posts_per_page' => 8,
  'no_found_rows' => true,
  'ignore_sticky_posts' => true,
));
if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
?>


    <div class="col-md-4 col-sm-6">
      <div class="movie-card">
        <?php the_content() ?>
        <!-- <img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d" alt="Movie">
          <div class="card-body">
            <h5 class="card-title">Lorem Ipsum Dolor</h5>
          </div> -->
      </div>
    </div>



<?php }
  wp_reset_postdata();
}

?>
<?php
$args = array(
  'post_type'      => 'member',   // TÊN POST TYPE CỦA BẠN
  'posts_per_page' => -1,
  'orderby'        => 'date',
  'order'          => 'DESC'
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
  <div class="project-list">
    <?php while ($query->have_posts()) : $query->the_post(); ?>

      <div class="project-item">

        <!-- Title + Link sang trang chi tiết -->
        <h3>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h3>

        <!-- Lấy field ACF (ví dụ: image, short_description ) -->
        <?php
        $image = get_field('thumbnail');
        $short_desc = get_field('short_description');
        ?>

        <?php if ($image) : ?>
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($image['url']); ?>" alt="">
          </a>
        <?php endif; ?>
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail('medium'); // hoặc size khác: thumbnail, large...
        } ?>


        <?php if ($short_desc) : ?>
          <p><?php echo esc_html($short_desc); ?></p>
        <?php endif; ?>

      </div>

    <?php endwhile; ?>
  </div>
<?php endif;
wp_reset_postdata(); ?>

<section class="single-wrapper">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="entry-content">
          hello
        </div>
      </div>
    </div>
  </div>
</section>