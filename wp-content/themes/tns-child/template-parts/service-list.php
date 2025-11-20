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
        'title' => 'Dịch vụ',
        'breadcrumb' => $breadcrumb
    ]); ?>
    <?php get_template_part('template-parts/service-list-content'); ?>

</div>
