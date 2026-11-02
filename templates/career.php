 <?php

    /*

    Template Name: Career Page

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
      slideChange: function () {
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

<?php $banner = get_field('banner',$pageID); ?>

<?php if(!empty($banner)): ?>
<section class="sub-banner">
  <?php if($banner['banner_image']): ?>
  <div class="sub-banner-bg"
    style="background-image:url('<?php echo $banner['banner_image']['url'] ?>');">
  </div>
  <?php endif; ?>

  <div class="container">
    <div class="sub-banner-content">
      <?php if($banner['heading']): ?>
      <h1><?php echo $banner['heading'] ?></h1>
      <?php endif; ?>
      <?php if($banner['description']): ?>
      <p><?php echo $banner['description'] ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<?php $careers = get_field('careers',$pageID); ?>

 <!-- CAREERS SECTION -->
 <section class="careers-section">
   <div class="container">
     
     <!-- TOP CONTENT -->
    <?php if(!empty(array_filter($careers))): ?>
    <div class="careers-top">
      <?php if($careers['image']): ?>
      <div class="image-wrap">
        <img src="<?php echo $careers['image']['url'] ?>" alt="<?php echo $careers['image']['alt'] ?>">
        <span class="dot dot-top"></span>
        <span class="dot dot-bottom"></span>
      </div>
      <?php endif; ?>

      <div class="content">
        <?php if($careers['section_label']): ?>
          <span class="tag"><?php echo $careers['section_label'] ?></span>
        <?php endif; ?>
        <?php if($careers['title']): ?>
          <h2><?php echo $careers['title'] ?></h2>
        <?php endif; ?>
        <?php if($careers['description']): ?>
          <p><?php echo $careers['description'] ?></p>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>

    <?php $jobs = get_field('job_listings',$pageID);  ?>
    <!-- JOB LIST -->
     <?php if(!empty($jobs)): ?>
    <div class="job-list">

    <?php foreach($jobs as $job):
      if(!empty($job)): ?>
      <div class="job-item">
        <div class="job-info">
          <?php if($job['job_title']): ?>
            <h4><?php echo $job['job_title'] ?></h4>
          <?php endif; ?>
          <?php if($job['job_description']): ?>
            <p><?php echo $job['job_description'] ?></p>
          <?php endif; ?>
          <div class="meta">
            <?php if($job['location']): ?>
              <span><?php echo $job['location'] ?></span>
            <?php endif; ?>
            <?php if($job['experience']): ?>
              <span><?php echo $job['experience'] ?></span>
            <?php endif; ?>
          </div>
        </div>
        <a href="#" class="details-btn">Apply Now</a>
      </div>
      <?php endif; endforeach; ?>


    </div>
    <?php endif; ?>

  </div>
</section>


<?php $oppurtunities = get_field('oppurtunities_section_career', $pageID); ?>

 <?php if (!empty(array_filter($oppurtunities))) : ?>
   <section class="opportunity-section career-opportunity">
     <div class="container">

       <div class="opportunity-card">

         <!-- LEFT FLOAT IMAGE -->
         <?php if ($oppurtunities['top_image']) : ?>
           <div class="float-img top-left">
             <img src="<?php echo $oppurtunities['top_image']['url'] ?>" alt="<?php echo $oppurtunities['top_image']['alt'] ?>">
           </div>
         <?php endif; ?>

         <!-- RIGHT FLOAT IMAGE -->
         <?php if ($oppurtunities['bottom_image']) : ?>
           <div class="float-img bottom-right">
             <img src="<?php echo $oppurtunities['bottom_image']['url'] ?>" alt="<?php echo $oppurtunities['bottom_image']['alt'] ?>">
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

 <?php get_footer(); ?>