 <?php
  /*

    */
  get_header();

  $current_news_ID = get_the_ID();

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


 <section class="news-detail-section">
   <div class="container">
     <div class="news-layout">

       <!-- LEFT CONTENT -->
       <div class="news-content">
         <h1><?php echo esc_html(the_title()); ?></h1>

         <div class="news-date-blk">
           <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
           <span class="date"><?php echo get_the_date('F j, Y') ?></span>
         </div>

         <?php the_content() ?>

         <a href="#" class="details-btn">View all news</a>
       </div>

       <!-- RIGHT SIDEBAR -->
       <aside class="news-sidebar">
         <div class="featured-image">
           <?php if (has_post_thumbnail()): ?>
             <?= get_the_post_thumbnail(get_the_ID(), 'medium_large') ?>
           <?php else: ?>
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/common/default-news.png" alt="news">
           <?php endif; ?>
         </div>

         <div class="recent-news">
           <h3>Recent News</h3>

           <?php $get_recent_news = new WP_Query([
              'post_type' => 'news',
              'post_status' => 'publish',
              'posts_per_page' => 4,
              'orderby' => 'date',
              'order' => 'DESC',
              'post__not_in'   => [$current_news_ID],
            ]) ?>


           <?php if ($get_recent_news->have_posts()): ?>
             <?php while ($get_recent_news->have_posts()): $get_recent_news->the_post() ?>
               <a href="<?php echo get_the_permalink() ?>" class="recent-item">
                 <?php if (has_post_thumbnail()) : ?>
                   <?= get_the_post_thumbnail(get_the_ID(), 'full', [
                      'class' => 'rece-img',
                      'alt'   => 'news'
                    ]); ?>
                 <?php else : ?>
                   <img class="rece-img"
                     src="<?= get_stylesheet_directory_uri(); ?>/images/common/default-news.png"
                     alt="news">
                 <?php endif; ?>
                 <div class="info">
                   <h4><?php echo esc_html(the_title()) ?></h4>
                   <div class="news-date-blk">
                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
                     <span class="date"><?php echo get_the_date('F j, Y') ?></span>
                   </div>
                 </div>
                 </a>
           <?php endwhile;
              wp_reset_postdata();
            endif; ?>


         </div>
       </aside>

     </div>
   </div>
 </section>


 <?php get_footer(); ?>