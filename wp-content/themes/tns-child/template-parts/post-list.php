<?php

/**
 * Post List Template Part
 */
?>

<div class="home-content">
    <?php $breadcrumb = array(
        array('text' => 'Home ', 'url' => home_url()),
        array('text' => get_the_title(), 'url' => '')
    ); ?>
    <?php get_template_part('template-parts/bread-crum-banner', null, [
        'title' => 'Bài viết',
        'breadcrumb' => $breadcrumb
    ]); ?>
    <?php get_template_part('template-parts/list-news-blog'); ?>

</div>
