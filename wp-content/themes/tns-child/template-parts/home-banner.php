<?php 
$banner = get_field('banner','option')
?>
<div class="home-banner"></div>

<style>
    .home-banner {
        background-image: url("<?php echo $banner ?>");
        width: 100%;
        height: 70vh;
        background-size: cover;
        background-position: center;
    }
</style>