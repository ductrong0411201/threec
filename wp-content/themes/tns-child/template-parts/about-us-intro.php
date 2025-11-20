 <?php
    $info_title    = get_field('info_title');
    $info_description    = get_field('info_description');
    $info_img    = get_field('info_image');
    $vision_title    = get_field('vision_title');
    $vision_description    = get_field('vision_description');
    $vision_img    = get_field('vision_image');
    $mission_title    = get_field('mission_title');
    $mission_description    = get_field('mission_description');
    $mission_img    = get_field('mission_image');
    ?>

 <section class="about-section container py-5">

     <!-- GIỚI THIỆU HÀNH TRÌNH -->
     <div class="row align-items-center mb-5">
         <div class="col-lg-6">
             <img src="<?php echo $info_img ?>" class="img-fluid rounded-4 shadow about-img-big">
         </div>

         <div class="col-lg-6 ps-lg-5 mt-4 mt-lg-0">
             <h3 class="section-title"><?php echo $info_title ?></h3>
             <p class="text-secondary">
                 <?php echo $info_description ?>
             </p>
         </div>
     </div>

     <!-- TẦM NHÌN -->
     <div class="row align-items-center flex-lg-row-reverse mb-5">
         <div class="col-lg-6">
             <img src="<?php echo $vision_img ?>" class="img-fluid rounded-4 shadow about-img-big">
         </div>

         <div class="col-lg-6 pe-lg-5 mt-4 mt-lg-0">
             <h3 class="section-title"><?php echo $vision_title ?></h3>
             <p class="text-secondary">
                 <?php echo $vision_description ?>
             </p>


         </div>
     </div>

     <!-- SỨ MỆNH -->
     <div class="row align-items-center mb-5">
         <div class="col-lg-6">
             <img src="<?php echo $mission_img ?>" class="img-fluid rounded-4 shadow about-img-big">
         </div>

         <div class="col-lg-6 ps-lg-5 mt-4 mt-lg-0">
             <h3 class="section-title"><?php echo $mission_title ?></h3>
             <p class="text-secondary mb-0">
                 <?php echo $mission_description ?>
             </p>
         </div>
     </div>

 </section>

 <style>
     .section-title {
         color: #6E0D25;
         font-weight: 700;
         text-transform: uppercase;
         margin-bottom: 20px;
         letter-spacing: 1px;
     }

     .about-img-big {
         border-radius: 20px;
         aspect-ratio: 2;
         width: 100%;
     }

     .about-img-small {
         width: 150px;
         border-radius: 16px;
     }

     .quote {
         font-size: 1.1rem;
         font-style: italic;
         color: #6E0D25;
         font-weight: 600;
     }

     .quote-box {
         max-width: 450px;
     }

     .vision-list li {
         margin-bottom: 8px;
         color: #555;
         line-height: 1.6;
     }

     /* Tạo hiệu ứng lưới chấm ở background */
     .about-section {
         position: relative;
     }

     .about-section::after {
         content: "";
         position: absolute;
         width: 90%;
         height: 100%;
         left: 5%;
         top: 0;
         background-image: radial-gradient(#ccc 1px, transparent 1px);
         background-size: 18px 18px;
         opacity: 0.2;
         z-index: -1;
     }
 </style>