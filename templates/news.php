 <?php

  /*

    Template Name: News Page

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
       speed: 900,
       autoplay: {
         delay: 5000,
         disableOnInteraction: false,
       },
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


 <?php } ?>

 <?php $banner = get_field('banner', $pageID) ?>

 <?php if (!empty($banner)): ?>
   <section class="sub-banner">
     <?php if ($banner['banner_image']): ?>
       <div class="sub-banner-bg"
         style="background-image:url('<?php echo $banner['banner_image']['url'] ?>');">
       </div>
     <?php endif; ?>

     <div class="container">
       <div class="sub-banner-content">
         <?php if ($banner['heading']): ?>
           <h1><?php echo $banner['heading'] ?></h1>
         <?php endif; ?>
         <?php if ($banner['description']): ?>
           <p><?php echo $banner['description'] ?></p>
         <?php endif; ?>
       </div>
     </div>
   </section>
 <?php endif; ?>


 <?php $get_latest_news = new WP_Query([
    'post_type' => 'news',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
  ]) ?>

 <!-- Latest News Section -->
 <?php if ($get_latest_news->have_posts()): ?>
   <?php $get_latest_news->the_post(); ?>
   <?php $latest_news_ID = get_the_ID(); ?>
   <section class="latest-news-section">
     <div class="container">

       <h2 class="section-title">Latest News</h2>

       <article class="news-feature-card">

         <!-- IMAGE -->
         <div class="news-image">
           <?php if (has_post_thumbnail()): ?>
             <?= get_the_post_thumbnail(get_the_ID(), 'medium_large') ?>
           <?php else: ?>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/common/default-news.png" alt="news">
           <?php endif; ?>
         </div>

         <!-- CONTENT -->
         <div class="news-content">
           <h3 class="news-title"><?php the_title(); ?></h3>

           <div class="news-meta">
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
             <span class="date"><?php echo get_the_date('F j, Y') ?></span>
           </div>

           <p class="news-desc"><?php echo get_the_excerpt() ?></p>

           <a href="<?php echo get_the_permalink() ?>" class="details-btn">Read More</a>
         </div>

       </article>

     </div>
   </section>
 <?php
    wp_reset_postdata();
  endif;
  ?>


 <?php $get_news = new WP_Query([
    'post_type' => 'news',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in'   => [$latest_news_ID],
  ]) ?>


 <section class="recent-news-section">
   <div class="container">

     <h2 class="section-title">Recent News</h2>

     <div class="news-grid">

       <?php if($get_news->have_posts()): ?>
        <?php while($get_news->have_posts()): $get_news->the_post() ?>
       <article class="news-card">
         <div class="image-wrap">
            <?php if (has_post_thumbnail()): ?>
             <?= get_the_post_thumbnail(get_the_ID(), 'medium_large') ?>
           <?php else: ?>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/common/default-news.png" alt="news">
           <?php endif; ?>
         </div>

         <h3 class="title"><?php the_title() ?></h3>

         <div class="rec-date-blk">
           <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
           <span class="date"><?php echo get_the_date('F j, Y') ?></span>
         </div>

         <p class="desc"><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>

         <a href="<?php echo get_the_permalink() ?>" class="details-btn">Read More</a>
       </article>

       <?php endwhile; wp_reset_postdata(); endif; ?>
       

     </div>
   </div>
 </section>


 <?php get_footer(); ?>