<?php
get_header();
?>
<main id="primary" class="site-main">
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
            <div style="margin-top: 80px;">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php
get_footer();
?>