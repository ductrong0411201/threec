<?php

/**
 * Commercial Template Part
 */
?>

<div class="home-content">
    <?php $breadcrumb = array(
        array('text' => 'Home ', 'url' => home_url()),
        array('text' => get_the_title(), 'url' => '')
    ); ?>
    <?php get_template_part('template-parts/bread-crum-banner', null, [
        'title' => 'Commercial',
        'breadcrumb' => $breadcrumb
    ]); ?>
    <?php get_template_part('template-parts/commercial-content'); ?>

</div>