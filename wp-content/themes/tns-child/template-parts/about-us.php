<?php

/**
 * About Us Template Part
 */
?>

<div class="home-content">
    <?php $breadcrumb = array(
        array('text' => 'Home ', 'url' => home_url()),
        array('text' => get_the_title(), 'url' => '')
    ); ?>
    <?php get_template_part('template-parts/bread-crum-banner', null, [
        'title' => 'Câu chuyện của ThreeC',
        'breadcrumb' => $breadcrumb
    ]); ?>
    <?php get_template_part('template-parts/about-us-intro'); ?>
    <?php get_template_part('template-parts/about-us-core'); ?>
    <?php get_template_part('template-parts/about-us-team'); ?>
    <?php get_template_part('template-parts/about-us-solution'); ?>

</div>