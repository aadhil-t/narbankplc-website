   <?php

  /*

    Template Name: Home Page

    */



  get_header();

  $pageID = get_the_ID();

  // wp_enqueue_script('magnificPopup');

  wp_enqueue_script('Swiper');
  wp_enqueue_script('gsap');
  wp_enqueue_script('aos');

  // wp_enqueue_script('magnificPopup');

  add_action('wp_footer', 'home_scripts', 25);



  function home_scripts()

  { ?>

   <!-- Banner Swiper -->
   <script>
     const bannerSwiper = new Swiper(".bannerSwiper", {
       loop: true,
       spaceBetween: 80,
       speed: 900,
       // autoplay: {
       //   delay: 5000,
       //   disableOnInteraction: false,
       // },
       pagination: {
           el: ".swiper-pagination",
          clickable: true,
          },
       on: {
         slideChange: function() {
           document.querySelectorAll(".video-bg video").forEach(video => {
             video.pause();
             video.currentTime = 0;
           });

           const activeVideo = this.slides[this.activeIndex].querySelector("video");
           if (activeVideo) {
             activeVideo.play();
           }
         }
       }
     });
   </script>

   <!-- Financial Services Swiper -->
   <script>
     new Swiper(".servicesSwiper", {
       slidesPerView: 3,
       spaceBetween: 43,
       loop: true,
       autoplay: {
         delay: 5000,
         disableOnInteraction: false,
       },
       pagination: {
         el: ".services-pagination",
         clickable: true,
       },
       breakpoints: {
         0: {
           slidesPerView: 1,
         },
         768: {
           slidesPerView: 2,
         },
         1024: {
           slidesPerView: 3,
         }
       }
     });
   </script>

   <!-- Testimonial Swiper -->
   <script>
     document.addEventListener("DOMContentLoaded", function() {
       new Swiper(".testimonialSwiper", {
         slidesPerView: 3,
         spaceBetween: 24,
         loop: true,
         autoplay: {
           delay: 3000,
           disableOnInteraction: false,
         },

         pagination: {
           el: ".testimonial-pagination", // ✅ FIXED
           clickable: true,
         },

         breakpoints: {
           0: {
             slidesPerView: 1,
           },
           768: {
             slidesPerView: 2,
           },
           1440: {
             slidesPerView: 3,
           },
         },
       });
     });
   </script>

   <!-- Announcement Swiper -->
   <script>
     new Swiper(".announcementSwiper", {
       slidesPerView: 1,
       loop: true,
       speed: 600, // normal slide speed
       autoplay: {
         delay: 3500, // time between slides
         disableOnInteraction: false,
       },
       allowTouchMove: false, // optional: prevents drag
       navigation: {
         nextEl: ".announcement-controls .next",
         prevEl: ".announcement-controls .prev",
       },
     });
   </script>

   <!-- Floating Badges Animation -->
   <script>
     (() => {
       if (window.matchMedia("(hover: none)").matches) return;

       const section = document.querySelector(".banner-section");
       const badges = document.querySelectorAll(".float-badge");

       let mouseX = 0;
       let mouseY = 0;
       let currentX = 0;
       let currentY = 0;

       const ease = 0.18;
       const strength = 120;

       section.addEventListener("mousemove", (e) => {
         const rect = section.getBoundingClientRect();

         mouseX = (e.clientX - rect.left) / rect.width - 0.5;
         mouseY = (e.clientY - rect.top) / rect.height - 0.5;
       });

       function animate() {
         currentX += (mouseX - currentX) * ease;
         currentY += (mouseY - currentY) * ease;

         badges.forEach((badge) => {
           const depth = parseFloat(badge.dataset.depth || 0.2);
           const dirX = parseFloat(badge.dataset.x || 1);
           const dirY = parseFloat(badge.dataset.y || 1);

           const moveX = currentX * strength * depth * dirX;
           const moveY = currentY * strength * depth * dirY;

           /* 🔥 ROTATION */
           const rotate = currentX * 6 * dirX;

           /* ✅ APPLY TRANSFORM (THIS IS WHERE IT GOES) */
           badge.style.transform = `
        translate3d(${moveX}px, ${moveY}px, 0)
        rotate(${rotate}deg)
      `;
         });

         requestAnimationFrame(animate);
       }

       animate();
     })();
   </script>


 <?php } ?>


 <?php $banner_section = get_field('banner_section', $pageID); ?>

 <section class="banner-section">
   <div class="banner-outer">

     <div class="swiper bannerSwiper">
       <div class="swiper-wrapper">

         <!-- SLIDE 1 -->
         <?php if (!empty($banner_section)):
            foreach ($banner_section as $banner): ?>
             <div class="swiper-slide">
               <div class="container">
                 <div class="banner-grid">

                   <div class="banner-left">
                     <?php if ($banner['heading']): ?>
                       <h1 data-aos="fade-left"><?php echo $banner['heading'] ?></h1>
                     <?php endif; ?>
                     <?php if ($banner['sub_heading']): ?>
                       <p><?php echo $banner['sub_heading'] ?></p>
                     <?php endif; ?>

                     <div class="banner-btns">
                       <?php if (!empty($banner['cta_label']) && !empty($banner['cta_url'])) : ?>
                         <a href="<?php echo $banner['cta_url'] ?>" class="primary-btn"><?php echo $banner['cta_label'] ?></a>
                       <?php endif; ?>
                       <?php if (!empty($banner['download_resource']) && !empty($banner['download_button_label'])) : ?>
                         <div class="secondary-btn-wrapper">
                           <a href="<?php echo $banner['download_resource'] ?>" class="secondary-btn">
                             <span class="btn-fill"></span>
                             <span class="btn-text"><?php echo $banner['download_button_label'] ?></span>
                           </a>
                         </div>
                       <?php endif; ?>
                     </div>
                   </div>

                   <?php if ($banner['banner_image']): ?>
                     <div class="banner-right">
                       <div class="img-wrapper">
                         <div class="img-inner-wrap">
                           <img class="main-img"
                             src="<?php echo $banner['banner_image']['url'] ?>" />
                         </div>
                         <?php if ($banner['banner_image_overlay_1']): ?>
                           <img class="float-badge badge-susu"
                             data-depth="0.22"
                             data-x="-1"
                             data-y="-1"
                             src="<?php echo $banner['banner_image_overlay_1']['url'] ?>" />
                         <?php endif; ?>

                         <?php if ($banner['banner_image_overlay_2']): ?>
                           <img class="float-badge badge-agric"
                             data-depth="0.28"
                             data-x="1"
                             data-y="-0.6"
                             src="<?php echo $banner['banner_image_overlay_2']['url']  ?>" />
                         <?php endif; ?>

                         <?php if ($banner['banner_image_overlay_3']): ?>
                           <img class="float-badge badge-business"
                             data-depth="0.35"
                             data-x="-0.8"
                             data-y="1"
                             src="<?php echo $banner['banner_image_overlay_3']['url']  ?>" />
                         <?php endif; ?>

                         <?php if ($banner['banner_image_overlay_4']): ?>
                           <img class="float-badge badge-salary"
                             data-depth="0.26"
                             data-x="1"
                             data-y="1"
                             src="<?php echo $banner['banner_image_overlay_4']['url']  ?>" />
                         <?php endif; ?>

                       </div>
                     </div>
                   <?php endif; ?>

                 </div>
               </div>
             </div>

         <?php endforeach;
          endif; ?>



         <!-- SLIDE 2 -->
         <?php $video_banner = get_field('video_banner', $pageID); ?>
         <?php if (array_filter($video_banner)): ?>
           <div class="swiper-slide video-slide">
             <div class="video-bg">
               <iframe
                 class="banner-iframe"
                 src="<?php echo $video_banner['background_video_url'] ?>"
                 frameborder="0"
                 allow="autoplay; fullscreen"
                 allowfullscreen>
               </iframe>


               <div class="video-content">
                 <div class="container">
                   <div class="banner-left video-head">
                     <?php if ($video_banner['heading']): ?>
                       <h1><?php echo $video_banner['heading'] ?></h1>
                     <?php endif; ?>
                     <?php if ($video_banner['sub_heading']): ?>
                       <p class="video-p"><?php echo $video_banner['sub_heading'] ?></p>
                     <?php endif; ?>

                     <!-- <div class="banner-btns">
                     <a href="#" class="primary-btn">Open Account</a>
                     <div class="secondary-btn-wrapper">
                       <a href="#" class="secondary-btn">
                         <span class="btn-fill"></span>
                         <span class="btn-text">Financial Statements</span>
                       </a>
                     </div>
                   </div> -->

                     <div class="banner-btns">
                       <?php if (!empty($video_banner['cta_label']) && !empty($video_banner['cta_url'])) : ?>
                         <a href="<?php echo $video_banner['cta_url'] ?>" class="primary-btn"><?php echo $video_banner['cta_label'] ?></a>
                       <?php endif; ?>
                       <?php if (!empty($video_banner['download_resource']) && !empty($video_banner['download_button_label'])) : ?>
                         <div class="secondary-btn-wrapper">
                           <a href="<?php echo $video_banner['download_resource'] ?>" class="secondary-btn">
                             <span class="btn-fill"></span>
                             <span class="btn-text"><?php echo $video_banner['download_button_label'] ?></span>
                           </a>
                         </div>
                       <?php endif; ?>
                     </div>
                   </div>
                 </div>
               </div>

             </div>
           </div>
         <?php endif; ?>



       </div>

       <div class="swiper-pagination"></div>
     </div>

   </div>
 </section>
 <!-- ================= END BANNER ================= -->


 <!-- ================= ANNOUNCEMENT SECTION ================= -->


 <?php $announcements = get_field('announcements',$pageID); ?>

 <?php if(!empty($announcements)): ?>
 <section class="announcement-section">
   <div class="announcement-container">

     <div class="announcement-label">
       <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/megaphone.svg" alt="">
       <span>Announcements:</span>
     </div>

     <div class="announcement-marquee">
       <div class="swiper announcementSwiper">
         <div class="swiper-wrapper">
          <?php foreach($announcements as $announcement): ?>
           <div class="swiper-slide">
             <?php echo $announcement['add_announcements'] ?>
           </div>
           <?php endforeach; ?>
         </div>
       </div>
     </div>

     <div class="announcement-controls">
       <img class="arrow prev" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/leftarrow.svg" alt="">
       <img class="arrow next" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/rightarrow.svg" alt="">
     </div>

   </div>
 </section>
 <?php endif; ?>





 <!-- ================= END ANNOUNCEMENT ================= -->


 <?php $promo_cards = get_field('promo_cards', $pageID); ?>
 <?php if (!empty($promo_cards)) :
    $card1 = $promo_cards['card_1'];
    $card2 = $promo_cards['card_2'];
    $card3 = $promo_cards['card_3'];
  endif;
  ?>

 <?php if (
    !empty(array_filter($card1)) ||
    !empty(array_filter($card2)) ||
    !empty(array_filter($card3))
  ) : ?>

   <section class="info-cards-section">
     <div class="container">
       <div class="cards-wrapper">

         <!-- Card 1 -->

         <div class="card card-light">
           <?php if (!empty($card1['icon'])) : ?>
             <div class="icon">
               <img src="<?php echo $card1['icon']['url'] ?>" alt="<?php echo $card1['icon']['alt'] ?>">
             </div>
           <?php endif; ?>
           <?php if (!empty($card1['title'])) : ?>
             <h3><?php echo $card1['title'] ?></h3>
           <?php endif; ?>
           <?php if (!empty($card1['description'])) : ?>
             <p><?php echo $card1['description'] ?></p>
           <?php endif; ?>
           <?php if (!empty($card1['cta_label']) && !empty($card1['cta_url'])) : ?>
             <a href="<?php echo $card1['cta_url'] ?>" class="details-btn"><?php echo $card1['cta_label'] ?></a>
           <?php endif; ?>
         </div>

         <!-- Card 2 -->
         <div class="card card-dark">
           <?php if (!empty($card2['icon'])) : ?>
             <div class="icon">
               <img src="<?php echo $card2['icon']['url'] ?>" alt="">
             </div>
           <?php endif; ?>
           <?php if (!empty($card2['title'])) : ?>
             <h3><?php echo $card2['title'] ?></h3>
           <?php endif; ?>
           <?php if (!empty($card2['description'])) : ?>
             <p><?php echo $card2['description'] ?></p>
           <?php endif; ?>
           <?php if (!empty($card1['cta_label']) && !empty($card1['cta_url'])) : ?>
             <a href="<?php echo $card1['cta_url'] ?>" class="details-btn"><?php echo $card1['cta_label'] ?></a>
           <?php endif; ?>
         </div>


         <!-- Card 3 (Image with text overlay) -->
         <div class="card card-image">
           <?php if (!empty($card3['background_image'])) : ?>
             <img src="<?php echo $card3['background_image']['url'] ?>" alt="<?php echo $card3['background_image']['alt'] ?>">
           <?php endif;  ?>
           <div class="text-overlay">
             <?php if (!empty($card3['title'])) : ?>
               <h2><span><?php echo $card3['title'] ?></span></h2>
             <?php endif; ?>
             <?php if (!empty($card3['sub_title'])) : ?>
               <p><?php echo $card3['sub_title'] ?></p>
             <?php endif; ?>
           </div>
         </div>
       </div>

       <?php $features = get_field('key_features', $pageID); ?>
       <div class="features-row">

         <?php foreach ($features as $feature) :
            if (!empty($feature['icon'])) : ?>
             <div class="feature-item">
               <div class="feat-icon"><img src="<?php echo $feature['icon']['url'] ?>"></div>
               <?php if ($feature['title']) : ?>
                 <p><?php echo $feature['title'] ?></p>
               <?php endif; ?>
             </div>
         <?php endif;
          endforeach; ?>

       </div>
     </div>
   </section>
 <?php endif; ?>

 <?php $about = get_field('about_narb', $pageID); ?>
 <?php $mission = $about['mission'] ?>
 <?php $vision = $about['vision'] ?>

 <section class="about-section">
   <div class="container about-grid">

     <?php if ($about['image']): ?>
       <div class="about-image">
         <img src="<?php echo $about['image']['url'] ?>" alt="About Image">
       </div>
     <?php endif; ?>

     <div class="about-content">
       <?php if ($about['section_label']) : ?>
         <h5 class="tag"><?php echo $about['section_label'] ?></h5>
       <?php endif; ?>
       <?php if ($about['title']) : ?>
         <h2 class="title"><?php echo $about['title'] ?></h2>
       <?php endif; ?>
       <?php if ($about['description']) : ?>
         <p class="desc"><?php echo $about['description'] ?></p>
       <?php endif; ?>

       <?php if ($about['sub_title']) : ?>
         <h4 class="values-heading"><?php echo $about['sub_title'] ?></h4>
       <?php endif; ?>

       <?php if ($about['core_values']) : ?>
         <div class="values-list">
           <?php foreach ($about['core_values'] as $value) : ?>
             <span class="value green"><?php echo $value['value'] ?></span>
           <?php endforeach; ?>
         </div>
       <?php endif; ?>
     </div>
   </div>

   <div class="divider"></div>

   <div class="container card-row">
     <?php if (!empty(array_filter($mission))) : ?>
       <div class="info-card card-animated">
         <div class="icon-wrapper">
           <?php if ($mission['icon']) : ?>
             <div class="icon"><img src="<?php echo $mission['icon']['url'] ?>"></div>
           <?php endif; ?>
           <?php if ($mission['title']) : ?>
             <h3><?php echo $mission['title'] ?></h3>
           <?php endif; ?>
         </div>
         <?php if ($mission['description']) : ?>
           <p><?php echo $mission['description'] ?></p>
         <?php endif; ?>
         <?php if ($mission['cta_label'] && $mission['cta_url']) : ?>
           <a href="<?php echo $mission['cta_url'] ?>" class="details-btn"><?php echo $mission['cta_label'] ?></a>
         <?php endif; ?>
       </div>
     <?php endif; ?>

     <?php if (!empty(array_filter($vision))) : ?>
       <div class="info-card card-animated">
         <div class="icon-wrapper">
           <?php if ($vision['icon']) : ?>
             <div class="icon"><img src="<?php echo $vision['icon']['url'] ?>"></div>
           <?php endif; ?>
           <?php if ($vision['title']) : ?>
             <h3><?php echo $vision['title'] ?></h3>
           <?php endif; ?>
         </div>
         <?php if ($vision['description']) : ?>
           <p><?php echo $vision['description'] ?></p>
         <?php endif; ?>
         <?php if ($vision['cta_label'] && $vision['cta_url']) : ?>
           <a href="<?php echo $vision['cta_url'] ?>" class="details-btn"><?php echo $vision['cta_label'] ?></a>
         <?php endif; ?>
       </div>
     <?php endif; ?>
   </div>
 </section>

 <?php $services_section = get_field('services_section', $pageID) ?>
 <?php if (!empty(array_filter($services_section))) : ?>

   <section class="finacial-services-section">
     <div class="container">

       <div class="services-header">
         <div class="left">
           <?php if ($services_section['section_label']) : ?>
             <span class="tag"><?php echo $services_section['section_label'] ?></span>
           <?php endif; ?>
           <?php if ($services_section['title']) : ?>
             <h2><?php echo $services_section['title'] ?></h2>
           <?php endif; ?>
         </div>
         <?php if ($services_section['description']) : ?>
           <div class="right">
             <p><?php echo $services_section['description'] ?></p>
           </div>
         <?php endif; ?>
       </div>

       <!-- SERVICES SWIPER -->
       <div class="swiper servicesSwiper">
         <div class="swiper-wrapper">

           <!-- SLIDE 1 -->
           <?php $services = $services_section['services']; ?>
           <?php if ($services) : ?>
             <?php foreach ($services as $post) : setup_postdata($post); ?>

               <div class="swiper-slide">
                 <div class="service-card">

                   <div class="img-wrap">
                     <div class="img-inner">
                       <?php if (has_post_thumbnail()) : ?>
                         <?php the_post_thumbnail('large'); ?>
                       <?php endif; ?> </div>

                     <?php $service_icon = get_field('service_action_icon') ?>
                     <?php if ($service_icon) : ?>
                       <span class="icon-badge">
                         <img src="<?php echo $service_icon['url'] ?>" alt="<?php echo $service_icon['alt'] ?>">
                       </span>
                     <?php endif; ?>
                   </div>

                   <div class="service-content">
                     <h3><?php the_title(); ?></h3>
                     <p><?php echo get_the_excerpt(); ?></p>
                     <a href="<?php the_permalink() ?>" class="details-btn">Read More</a>
                   </div>

                 </div>
               </div>
           <?php endforeach;
              wp_reset_postdata();
            endif; ?>


         </div>

         <!-- PAGINATION -->
         <div class="swiper-pagination services-pagination"></div>
       </div>


     </div>
   </section>

 <?php endif; ?>

 <?php $why_us = get_field('why_choose_us', $pageID) ?>
 <?php if (!empty($why_us)) : ?>
   <section class="why-choose-sec">
     <div class="container why-choose-wrapper">

       <!-- IMAGE SIDE -->
       <div class="image-col">
         <?php if ($why_us['image']) : ?>
           <div class="image-wrap">
             <img src="<?php echo $why_us['image']['url'] ?>" alt="<?php echo $why_us['image']['alt'] ?>">
           </div>
         <?php endif; ?>
         <img class="circle circle-top" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/circle1.svg" alt="Customer Service">
         <img class="circle circle-bottom" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/circle2.svg" alt="Customer Service">
       </div>

       <div class="content-col">
         <?php if ($why_us['section_label']) : ?>
           <span class="tag"><?php echo $why_us['section_label'] ?></span>
         <?php endif; ?>
         <?php if ($why_us['title']) : ?>
           <h2><?php echo $why_us['title'] ?></h2>
         <?php endif; ?>
         <?php if ($why_us['content']) : ?>
           <p><?php echo $why_us['content'] ?></p>
         <?php endif; ?>
         <?php if ($why_us['cta_label'] && $why_us['cta_url']) : ?>
           <a href="<?php echo $why_us['cta_url'] ?>" class="details-btn"><?php echo $why_us['cta_label'] ?></a>
         <?php endif; ?>
       </div>

     </div>
   </section>
 <?php endif; ?>

 <?php $testimonial_sec = get_field('testimonial_section', $pageID); ?>
 <?php $testimonials = get_field('testimonials', $pageID); ?>

 <?php if (!empty($testimonials)): ?>
   <section class="testimonial-section">
     <div class="container">

       <div class="testimonial-header">
         <?php if ($testimonial_sec['section_label']) : ?>
           <span class="tag"><?php echo $testimonial_sec['section_label'] ?></span>
         <?php endif; ?>
         <?php if ($testimonial_sec['section_label']) : ?>
           <h2><?php echo $testimonial_sec['title'] ?></h2>
         <?php endif; ?>
       </div>

       <?php if (!empty($testimonials)): ?>
         <div class="swiper testimonialSwiper testimonial-swiper">
           <div class="swiper-wrapper">

             <?php foreach ($testimonials as $testimonial) :  ?>
               <div class="swiper-slide">
                 <div class="testimonial-card">
                   <img class="badge" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/testimonial/double-quote.svg">
                   <?php if ($testimonial['testimonial_content']) : ?>
                     <p class="text"><?php echo $testimonial['testimonial_content'] ?></p>
                   <?php endif; ?>
                   <div class="card-footer">
                     <?php if ($testimonial['logo']) : ?>
                       <img src="<?php echo $testimonial['logo']['url'] ?>">
                     <?php endif; ?>
                     <div>
                       <?php if (!empty($testimonial['client'])) :  ?>
                         <h4><?php echo $testimonial['client']; ?></h4>
                       <?php endif; ?>
                       <a href="#">Find out More</a>
                     </div>
                   </div>
                 </div>
               </div>
             <?php endforeach; ?>


           </div>

           <!-- ✅ UNIQUE PAGINATION -->
           <div class="swiper-pagination testimonial-pagination"></div>
         </div>
       <?php endif; ?>

     </div>
   </section>
 <?php endif; ?>


 <?php $oppurtunities = get_field('oppurtunties_section', $pageID); ?>

 <?php if (!empty(array_filter($oppurtunities))) : ?>
   <section class="opportunity-section">
     <div class="container">

       <div class="opportunity-card">

         <!-- LEFT FLOAT IMAGE -->
         <?php if ($oppurtunities['top_image']) : ?>
           <div class="float-img top-left">
             <img src="<?php echo $oppurtunities['top_image']['url'] ?>" alt="<?php echo $oppurtunities['top_image']['url'] ?>">
           </div>
         <?php endif; ?>

         <!-- RIGHT FLOAT IMAGE -->
         <?php if ($oppurtunities['bottom_image']) : ?>
           <div class="float-img bottom-right">
             <img src="<?php echo $oppurtunities['bottom_image']['url'] ?>" alt="<?php echo $oppurtunities['bottom_image']['url'] ?>">
           </div>
         <?php endif; ?>

         <!-- DECORATIVE CIRCLES -->
         <span class="circle circle-left"></span>
         <span class="circle circle-right"></span>

         <!-- CONTENT -->
         <div class="content">
           <?php if ($oppurtunities['title']) : ?>
             <h2><?php echo $oppurtunities['title'] ?></h2>
           <?php endif; ?>
           <?php if ($oppurtunities['content']) : ?>
             <p><?php echo $oppurtunities['content'] ?></p>
           <?php endif; ?>

           <?php if ($oppurtunities['cta_url'] && $oppurtunities['cta_label']) : ?>
             <a href="<?php echo $oppurtunities['cta_url'] ?>" class="details-btn"><?php echo $oppurtunities['cta_label'] ?></a>
           <?php endif; ?>
         </div>

       </div>

     </div>
   </section>
 <?php endif; ?>



 <?php $news_section = get_field('news', $pageID) ?>

 <?php $get_news = new WP_Query([
    'post_type' => 'news',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order_by' => 'date',
    'order' => 'DESC'
  ]) ?>

 <section class="news-section">
   <div class="container">

     <div class="news-header">
       <div class="left">
         <?php if ($news_section['section_label']): ?>
           <span class="tag"><?php echo $news_section['section_label'] ?></span>
         <?php endif; ?>
         <?php if ($news_section['title']): ?>
           <h2><?php echo $news_section['title'] ?></h2>
         <?php endif; ?>
       </div>
       <?php if ($news_section['cta_url'] && $news_section['cta_label']) : ?>
         <a href="<?php echo $news_section['cta_url'] ?>" class="details-btn"><?php echo $news_section['cta_label'] ?></a>
       <?php endif; ?>
     </div>

     <!-- NEWS CARDS -->
     <div class="news-cards">

       <?php if ($get_news->have_posts()): ?>
         <?php while ($get_news->have_posts()): $get_news->the_post(); ?>
           <article class="news-card">

             <div class="img-wrap">
               <?php if (has_post_thumbnail()): ?>
                 <?= get_the_post_thumbnail(get_the_ID(), 'medium_large') ?>
               <?php else: ?>
                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/common/default-news.png" alt="news">
               <?php endif; ?>
             </div>

             <div class="content">
               <h3><?= esc_html(get_the_title()) ?></h3>

               <p><?= esc_html(wp_trim_words(get_the_excerpt(), 14)) ?></p>

               <div class="card-footer">
                 <span class="date"><?= esc_html(get_the_date('F j, Y')) ?></span>
                 <a href="<?php echo get_the_permalink() ?>" class="arrow">
                   <img src="<?= esc_url(get_stylesheet_directory_uri() . '/images/home/newsarrow.svg') ?>" alt="">
                 </a>
               </div>
             </div>

           </article>
         <?php endwhile;
          wp_reset_postdata(); ?>
       <?php endif; ?>



     </div>
   </div>
 </section>


 <?php get_footer(); ?>