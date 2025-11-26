<div class="home-banner">

  
    <div class="video-responsive">
  <video class="video-tag" autoplay muted loop playsinline>
    <source src="/wp-content/themes/tns-child/assets/src/images/home-video.mp4" type="video/mp4">
  </video>
</div>

</div>

<style>
    .home-banner {
        width: 100%;
        /* height: 100vh; */
        background-size: cover;
        background-position: center;
    }

    .video-wrapper {
        position: relative;
        width: 100%;
        height: 100vh;
        /* Bạn có thể đổi: 300, 500, 600px */
        overflow: hidden;
    }

    .video-inside {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        transform: translate(-50%, -50%);
        object-fit: cover;
        /* quan trọng */
    }

    .video-content {
        position: absolute;
        z-index: 2;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    .video-responsive {
  position: relative;
  width: 100%;
  padding-top: 56.25%; /* 16:9 ratio = 9/16 = 0.5625 */
  overflow: hidden;
  background: #000;
}

.video-responsive .video-tag {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

</style>