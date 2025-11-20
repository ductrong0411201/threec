<!-- INTRO SECTION -->
  <?php 
 $title    = get_field('about_us', 'option');
 $description    = get_field('about_us_description', 'option');
 ?>
<section class="about-section text-center text-white py-5">
  <div class="container">

    <p class="text-warning fw-semibold mt-n2 mb-1">About</p>
    <h3 class="intro-title fw-bold mb-4"><?php echo $title ?></h3>

    <p class="mb-2 small-text">
     <?php echo $description ?>
    </p>
   
<div class="image-scroll text-center" aria-hidden="false">
  <?php
      $items = array();
      $query = new WP_Query(array(
        'post_type' => 'video-upload',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'no_found_rows' => true,
        'ignore_sticky_posts' => true,
      ));
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();
      ?>


          <!-- <div class="col-md-4 col-sm-6">
            <div class="movie-card"> -->
              <?php the_content() ?>
              
            <!-- </div>
          </div> -->



      <?php }
        wp_reset_postdata();
      }
      ?>
  <!-- <img src="https://picsum.photos/300/300?random=1" alt="image1" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=2" alt="image2" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=3" alt="image3" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=4" alt="image4" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=5" alt="image5" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=6" alt="image6" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=7" alt="image7" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=8" alt="image8" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=9" alt="image9" class="shadow-sm">
  <img src="https://picsum.photos/300/300?random=10" alt="image10" class="shadow-sm"> -->
</div>

    <!--  -->
  </div>
</section>

<style>
  <?php
  $bg_url = get_stylesheet_directory_uri() . '/assets/src/images/intro-bg.png';
  ?>.about-section {
    background-image: url(<?php echo $bg_url ?>);
    min-height: 100vh;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Căn chỉnh chữ mờ phía sau */
  .about-section h2 {
    font-size: 6rem;
    letter-spacing: 3px;
  }

  /* Ảnh */
  .about-section img {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .about-section img:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
  }

  .intro-title {
    font-size: 40px;
  }

  .small-text {
    font-size: 18px;
  }

  .about-section .text-warning {
    font-size: 20px;
  }

  /*  */

  .image-scroll {
    width: 100vw;
    margin-left: calc(-50vw + 50%);
    overflow-x: hidden; /* hide native scrollbar for smoother look */
    white-space: nowrap;
    padding: 1rem 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  .image-scroll figure {
    flex: 0 0 auto;
    width: 250px;
    border-radius: 1rem;
    transition: transform 0.3s ease;
  }

  .image-scroll .item {
    flex: 0 0 auto;
    width: 250px;
    border-radius: 1rem;
    transition: transform 0.3s ease;
  }

  .image-scroll img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 1rem;
  }

  .image-scroll.paused {
    /* optional visual when paused */
    opacity: 0.95;
  }
</style>
<!--  -->

<script>
(function () {
  // Debug helper: bật true để xem log
  const DEBUG = false;

  function log(...args) { if (DEBUG) console.log(...args); }

  document.addEventListener("DOMContentLoaded", initScroll);

  function initScroll() {
    const container = document.querySelector(".image-scroll");
    if (!container) {
      console.warn("Auto-scroll: không tìm thấy .image-scroll");
      return;
    }

    // Wrap existing images into .item and clone content for seamless loop
    const imgs = Array.from(container.querySelectorAll("figure"));
    if (imgs.length === 0) {
      console.warn("Auto-scroll: không có ảnh bên trong .image-scroll");
      return;
    }

    // If already initialized, stop
    if (container.dataset.autoscrollInitialized) return;
    container.dataset.autoscrollInitialized = "1";

    // wrap images into .item (so clone is easier)
    imgs.forEach(img => {
      const wrapper = document.createElement("div");
      wrapper.className = "item";
      img.parentNode.insertBefore(wrapper, img);
      wrapper.appendChild(img);
    });

    // duplicate content (clone children) to allow seamless reset
    const children = Array.from(container.children);
    children.forEach(ch => {
      const clone = ch.cloneNode(true);
      container.appendChild(clone);
    });

    // Variables for animation
    let speed = 0.4; // px per frame (adjust for faster/slower)
    let rafId = null;
    let paused = false;

    // Pause on hover / touch
    container.addEventListener("mouseenter", () => { paused = true; container.classList.add("paused"); });
    container.addEventListener("mouseleave", () => { paused = false; container.classList.remove("paused"); });
    container.addEventListener("touchstart", () => { paused = true; container.classList.add("paused"); }, {passive:true});
    container.addEventListener("touchend", () => { paused = false; container.classList.remove("paused"); }, {passive:true});

    // For accessibility: allow focus to pause
    container.addEventListener("focusin", () => { paused = true; }, true);
    container.addEventListener("focusout", () => { paused = false; }, true);

    // Ensure container scrollLeft starts near 0
    container.scrollLeft = 0;

    // Animation loop
    function step() {
      if (!paused) {
        // advance
        container.scrollLeft += speed;

        // When scrolled past original content width, reset to start seamlessly
        // originalWidth = sum width of first half (before cloning)
        const totalScrollWidth = container.scrollWidth;
        const visibleWidth = container.clientWidth;
        // Use half width (since we cloned once)
        const halfWidth = totalScrollWidth / 2;

        if (container.scrollLeft >= halfWidth) {
          // reset back by subtracting halfWidth (seamless because content is duplicated)
          container.scrollLeft = container.scrollLeft - halfWidth;
          log("reset scrollLeft", container.scrollLeft, "halfWidth", halfWidth);
        }
      }
      rafId = requestAnimationFrame(step);
    }

    // Start loop
    rafId = requestAnimationFrame(step);

    // Expose pause/resume via data attributes (optional)
    container.pauseAutoScroll = function() {
      paused = true;
    };
    container.resumeAutoScroll = function() {
      paused = false;
    };

    // Fallback: if requestAnimationFrame not suitable, you can switch to setInterval
    // (not necessary unless old browser). Keep this commented.
    /* let fallbackInterval = setInterval(function(){
      if (!paused) {
        container.scrollLeft += speed;
        if (container.scrollLeft >= container.scrollWidth/2) {
          container.scrollLeft = container.scrollLeft - container.scrollWidth/2;
        }
      }
    }, 16); */

    // Cleanup on unload (optional)
    window.addEventListener("beforeunload", () => {
      if (rafId) cancelAnimationFrame(rafId);
    });

    log("Auto-scroll initialized", { speed, images: imgs.length });
  }
})();
</script>

