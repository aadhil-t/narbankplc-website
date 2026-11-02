 <?php

  /*

    Template Name: About Page

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

   <!-- Image swiper accordian -->
   <script>
     document.addEventListener("DOMContentLoaded", function() {

       /* ==========================
          INIT SWIPER
       ========================== */
       const swiper = new Swiper(".branchSwiper", {
         slidesPerView: 1,
         effect: "fade",
         speed: 600,
         pagination: {
           el: ".swiper-pagination",
           clickable: true,
         },
       });

       const accordionItems = document.querySelectorAll(".accordion-item");

       /* ==========================
          LOAD IMAGES INTO SWIPER
          + BUILD THUMBNAILS
       ========================== */
       function loadImages(images, thumbsContainer) {
         // Clear swiper + thumbs
         swiper.removeAllSlides();
         thumbsContainer.innerHTML = "";

         images.forEach((src, index) => {
           // Add slide
           swiper.appendSlide(`
        <div class="swiper-slide">
          <img src="${src}" alt="">
        </div>
      `);

           // Create thumbnail
           const thumb = document.createElement("img");
           thumb.src = src;

           thumb.addEventListener("click", function() {
             swiper.slideTo(index);
           });

           thumbsContainer.appendChild(thumb);
         });

         swiper.slideTo(0);
         swiper.update();
       }

       /* ==========================
          ACTIVATE ACCORDION ITEM
       ========================== */
       function activateAccordion(item) {
         // Close previous
         document
           .querySelector(".accordion-item.active")
           ?.classList.remove("active");

         item.classList.add("active");

         // Get images
         const images = JSON.parse(item.dataset.images);
         const thumbs = item.querySelector(".thumbs");

         loadImages(images, thumbs);

         // ✅ Mobile UX polish
         if (window.innerWidth < 768) {
           setTimeout(() => {
             item.scrollIntoView({
               behavior: "smooth",
               block: "start"
             });
           }, 150);
         }
       }

       /* ==========================
          INITIAL LOAD (FIRST OPEN)
       ========================== */
       const firstActive = document.querySelector(".accordion-item.active");
       if (firstActive) {
         activateAccordion(firstActive);
       }

       /* ==========================
          CLICK HANDLERS
       ========================== */
       accordionItems.forEach(item => {
         const header = item.querySelector(".accordion-header");

         header.addEventListener("click", function() {
           // Prevent reloading same active item
           if (item.classList.contains("active")) return;

           activateAccordion(item);
         });
       });

     });
   </script>


   <!-- Our team -->
   <!-- <script>
  const teamSwiper = new Swiper(".teamSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 700,
    navigation: {
      nextEl: ".team-next",
      prevEl: ".team-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1200: { slidesPerView: 3 },
    },
  });

  document.querySelectorAll(".tab-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
      btn.classList.add("active");

      // Replace swiper slides here if needed (AJAX / dynamic data)
      teamSwiper.slideTo(0);
    });
  });
</script> -->

   <script>
     let teamSwiper;

     // Store original slides ONCE
     const wrapper = document.querySelector(".teamSwiper .swiper-wrapper");
     const allSlidesHTML = Array.from(wrapper.children);

     function initSwiper() {
       teamSwiper = new Swiper(".teamSwiper", {
         slidesPerView: 3,
         spaceBetween: 30,
         speed: 700,
         navigation: {
           nextEl: ".team-next",
           prevEl: ".team-prev",
         },
         pagination: {
           el: ".swiper-pagination",
           clickable: true,
         },
         breakpoints: {
           0: {
             slidesPerView: 1
           },
           768: {
             slidesPerView: 2
           },
           1200: {
             slidesPerView: 3
           },
         },
       });
     }

     function filterSlides(team) {
       if (teamSwiper) teamSwiper.destroy(true, true);

       wrapper.innerHTML = "";

       allSlidesHTML.forEach(slide => {
         if (slide.dataset.team === team) {
           wrapper.appendChild(slide);
         }
       });

       initSwiper();
     }

     // Default
     filterSlides("management");

     document.querySelectorAll(".tab-btn").forEach(btn => {
       btn.addEventListener("click", () => {
         document.querySelectorAll(".tab-btn").forEach(b =>
           b.classList.remove("active")
         );
         btn.classList.add("active");

         filterSlides(btn.dataset.tab);
       });
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

 <?php $about_section = get_field('about_section', $pageID); ?>

 <section class="about-intro">
   <div class="container">

     <?php if (!empty(array_filter($about_section))): ?>
       <div class="about-grid">

         <!-- LEFT -->
         <div class="about-left">
           <?php if ($about_section['section_label']): ?>
             <span class="tag"><?php echo $about_section['section_label'] ?></span>
           <?php endif; ?>
           <?php if ($about_section['title']): ?>
             <h2><?php echo $about_section['title'] ?></h2>
           <?php endif; ?>
         </div>

         <!-- RIGHT -->
         <?php if ($about_section['content']): ?>
           <div class="about-right">
             <?php echo $about_section['content'] ?>
           </div>
         <?php endif; ?>

       </div>
     <?php endif; ?>


     <?php $stats = get_field('stats', $pageID); ?>

     <div class="stats-grid">
       <?php foreach ($stats as $stat):
          if ($stat): ?>
           <div class="stat">
             <h3 class="gradient-text"><?php echo $stat['stat_value'] ?></h3>
             <p><?php echo $stat['stat_label'] ?></p>
           </div>
       <?php endif;
        endforeach; ?>
     </div>

   </div>
 </section>

 <?php $mission_vision = get_field('mission_vision', $pageID); ?>

 <section class="mv-section">
   <div class="container">

     <?php if (!empty(array_filter($mission_vision))): ?>
       <div class="mv-wrapper">

         <!-- LEFT STACK -->
         <div class="mv-col left has-dot">

           <div class="mv-card mission">
             <?php if ($mission_vision['card_1_title']): ?>
               <h4><?php echo $mission_vision['card_1_title'] ?></h4>
             <?php endif; ?>
             <?php if ($mission_vision['card_1_content']): ?>
               <p><?php echo $mission_vision['card_1_content'] ?></p>
             <?php endif; ?>
           </div>

           <?php if ($mission_vision['card_1_image']): ?>
             <div class="mv-img">
               <img src="<?php echo $mission_vision['card_1_image']['url'] ?>" alt="<?php echo $mission_vision['card_1_image']['alt'] ?>">
             </div>
           <?php endif; ?>
           <span class="green-dot-left"></span>

         </div>

         <!-- RIGHT STACK -->
         <div class="mv-col right has-dot">

           <?php if ($mission_vision['card_2_image']): ?>
             <div class="mv-img ">
               <img src="<?php echo $mission_vision['card_2_image']['url'] ?>" alt="<?php echo $mission_vision['card_2_image']['alt'] ?>">
             </div>
           <?php endif; ?>
           <span class="green-dot-right"></span>

           <div class="mv-card vision">
             <?php if ($mission_vision['card_2_title']): ?>
               <h4><?php echo $mission_vision['card_2_title'] ?></h4>
             <?php endif; ?>
             <?php if ($mission_vision['card_2_content']): ?>
               <p><?php echo $mission_vision['card_2_content'] ?></p>
             <?php endif; ?>
           </div>

         </div>

       </div>
     <?php endif; ?>

     <?php $core_values = get_field('core_values', $pageID); ?>
     <!-- VALUES -->
     <div class="values">
       <?php if (get_field('core_values_title', $pageID)): ?>
         <h2><?php echo get_field('core_values_title', $pageID) ?></h2>
       <?php endif; ?>

       <div class="values-grid">
         <?php foreach ($core_values as $value): ?>
           <div class="value-card active">
             <?php if ($value['icon']): ?>
               <img src="<?php echo $value['icon']['url'] ?>" alt="<?php echo $value['icon']['alt'] ?>">
             <?php endif; ?>
             <?php if ($value['title']): ?>
               <h4><?php echo $value['title'] ?></h4>
             <?php endif; ?>
             <?php if ($value['content']): ?>
               <p><?php echo $value['content'] ?></p>
             <?php endif; ?>
           </div>
         <?php endforeach; ?>


       </div>
     </div>

   </div>
 </section>

 <?php $branches_sec = get_field('branches', $pageID); ?>
 <?php $branches = get_field('list_branches', $pageID); ?>

 <!-- Branches section -->
 <section class="branches-section">
   <div class="container">

     <div class="branches-grid">

       <!-- LEFT : IMAGE SWIPER -->
       <div class="branches-left">
         <div class="swiper branchSwiper">
           <div class="swiper-wrapper"></div>
           <div class="swiper-pagination"></div>
         </div>
       </div>

       <!-- RIGHT -->
       <div class="branches-right">

         <?php if ($branches_sec['heading']): ?>
           <h3><?php echo $branches_sec['heading'] ?></h3>
         <?php endif; ?>
         <?php if ($branches_sec['content']): ?>
           <p class="intro"><?php echo $branches_sec['content'] ?></p>
         <?php endif; ?>

         <div class="branch-accordion">

           <!-- ITEM 1 -->
           <?php if (!empty($branches)): ?>
             <?php foreach ($branches as $branch): ?>
               <div class="accordion-item active"
                 data-images='[
              "<?php echo $branch['image']['url'] ?>",
              "<?php echo get_stylesheet_directory_uri(); ?>/images/branches/recnew1.png"
            ]'>

                 <div class="accordion-header">
                   <span class="loc">
                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/branches/loc.svg" alt="">
                   </span>
                   <h5><?php echo $branch['location'] ?></h5>
                   <span class="arrow"></span>
                 </div>

                 <div class="accordion-body">
                   <p><?php echo $branch['description'] ?></p>
                   <div class="thumbs"></div>
                 </div>
               </div>
           <?php endforeach;
            endif; ?>


         </div>
       </div>

     </div>
   </div>
 </section>

 <!-- Our team section -->
 <!-- <section class="our-team-section">
  <div class="container">

    <div class="team-top">
      <div class="left">
        <span class="tag">OUR TEAM</span>
        <h2>Committed Leadership for a<br>Stronger Community</h2>

        <div class="tabs">
          <button class="tab-btn active" data-tab="management">Management Team</button>
          <button class="tab-btn" data-tab="board">Board of Directors</button>
        </div>
      </div>

      <div class="right">
        <p>
          Empowering rural development through experienced guidance and
          responsible governance.
        </p>

        <div class="nav-btns">
          <div class="team-prev">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/left-arrow.svg" alt="Previous">
          </div>
          <div class="team-next">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/right-arrow.svg" alt="Next">
          </div>
        </div>

      </div>
    </div>

    <div class="swiper teamSwiper" data-tab-content="management">
      <div class="swiper-wrapper">

        <div class="swiper-slide" data-team="management">
          <div class="team-card">
            <div class="img-wrap">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/team/team1.png" alt="">
            </div>
            <h4>Hon. Kwaku Agyeman-Manu</h4>
            <span>Board Chair</span>
          </div>
        </div>

        <div class="swiper-slide" data-team="management">
          <div class="team-card">
            <div class="img-wrap">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/team/team2.png" alt="">
            </div>
            <h4>Duku Paul</h4>
            <span>Chief Executive Officer</span>
          </div>
        </div>

        <div class="swiper-slide" data-team="board">
          <div class="team-card">
            <div class="img-wrap">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/team/team3.png" alt="">
            </div>
            <h4>Felix K. Yeboah</h4>
            <span>Head of Audit</span>
          </div>
        </div>

        <div class="swiper-slide" data-team="board">
          <div class="team-card">
            <div class="img-wrap">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/team/team1.png" alt="">
            </div>
            <h4>Hon. Kwaku Agyeman-Manu</h4>
            <span>Board Chair</span>
          </div>
        </div>

      </div>

      <div class="swiper-pagination"></div>
    </div>

  </div>
</section> -->

<?php $team_sec = get_field('team_section', $pageID); ?>
<?php $mgt_team = get_field('management', $pageID); ?>
<?php $bod = get_field('bod', $pageID); ?>



 <section class="our-team-section">
   <div class="container">

     <div class="team-top">
       <div class="left">
         <?php if ($team_sec['section_label']): ?>
           <span class="tag"><?php echo $team_sec['section_label'] ?></span>
         <?php endif; ?>
         <?php if ($team_sec['title']): ?>
           <h2><?php echo $team_sec['title'] ?></h2>
         <?php endif; ?>

         <div class="tabs">

         <?php if(!empty($mgt_team)): ?>
           <button class="tab-btn active" data-tab="management">Management Team</button>
          <?php endif; ?>
         <?php if(!empty($bod)): ?>
           <button class="tab-btn" data-tab="board">Board of Directors</button>
          <?php endif; ?>

         </div>
       </div>

       <div class="right">
         <?php if ($team_sec['description']): ?>
           <p><?php echo $team_sec['description'] ?></p>
         <?php endif; ?>

         <div class="nav-btns">
           <div class="team-prev">
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/left-arrow.svg" alt="">
           </div>
           <div class="team-next">
             <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/right-arrow.svg" alt="">
           </div>
         </div>
       </div>
     </div>

     <div class="swiper teamSwiper">
       <div class="swiper-wrapper">

         <!-- MANAGEMENT -->
         <?php foreach($mgt_team as $member): ?>
           <div class="swiper-slide" data-team="management">
             <div class="team-card">
              <?php if($member['image']): ?>
               <div class="img-wrap">
                 <img src="<?php echo $member['image']['url'] ?>" alt="member">
               </div>
               <?php endif ?>
               <?php if ($member['name']): ?>
                 <h4><?php echo $member['name'] ?></h4>
               <?php endif; ?>
               <?php if ($member['designation']): ?>
                 <span><?php echo $member['designation'] ?></span>
               <?php endif; ?>
             </div>
           </div>
         <?php endforeach; ?>



         <!-- BOARD -->
         <?php foreach($bod as $member): ?>
         <div class="swiper-slide" data-team="board">
           <div class="team-card">
             <?php if($member['image']): ?>
               <div class="img-wrap">
                 <img src="<?php echo $member['image']['url'] ?>" alt="member">
               </div>
               <?php endif ?>
             <?php if ($member['name']): ?>
                 <h4><?php echo $member['name'] ?></h4>
               <?php endif; ?>
              <?php if ($member['designation']): ?>
                 <span><?php echo $member['designation'] ?></span>
               <?php endif; ?>
           </div>
         </div>
         <?php endforeach; ?>


       </div>

       <div class="swiper-pagination"></div>
     </div>

   </div>
 </section>



 <?php $oppurtunities = get_field('oppurtunities_section_about', $pageID); ?>

 <?php if (!empty(array_filter($oppurtunities))) : ?>
   <section class="opportunity-section service-opportunity">
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

 <section class="news-section news-sec-cmn">
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