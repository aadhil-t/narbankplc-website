 <?php

    /*

    Template Name: Contact Page

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

<?php $banner = get_field('banner',$pageID) ?>

<?php if(!empty(array_filter($banner))): ?>
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

<!-- CONTACT + MAP SECTION -->
<section class="contact-map-section">

  <!-- CONTACT -->
  <?php $contacts = get_field('get_in_touch',$pageID) ?>
  <?php if(!empty(array_filter($contacts))) : ?>
  <div class="contact-wrapper">
    <div class="container contact-grid">

      <!-- LEFT -->
      <div class="contact-left">
        <?php if($contacts['title']): ?>
          <h2><?php echo $contacts['title'] ?></h2>
        <?php endif; ?>
        <?php if($contacts['description']): ?>
          <p><?php echo $contacts['description'] ?></p>
        <?php endif; ?>

        <ul class="contact-info">
          <?php if($contacts['phone']): ?>
          <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact/call.svg" />
            <a href="tel:<?php echo $contacts['phone'] ?>"><?php echo $contacts['phone'] ?></a>
          </li>
          <?php endif; ?>
          <?php if($contacts['email']): ?>
          <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact/mail.svg" />
            <a href="mailto:<?php echo $contacts['email'] ?>">
              <?php echo $contacts['email'] ?>
            </a>
          </li>
          <?php endif; ?>
          <?php if($contacts['email_2']): ?>
          <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact/yahoo.svg" />
            <a href="mailto:<?php echo $contacts['email_2'] ?>"><?php echo $contacts['email_2'] ?></a>
          </li>
          <?php endif; ?>
          <?php if($contacts['location']): ?>
          <li>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact/loc.svg" />
                <?php echo $contacts['location'] ?>
          </li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- RIGHT -->
      <div class="contact-form">
        <h6>FILL THE FORM!</h6>
          <?php echo do_shortcode('[contact-form-7 id="252aab7" title="Contact form"]') ?>
         
      </div>

    </div>
  </div>
  <?php endif; ?>

  <!-- MAP -->
  <?php $location = get_field('locate_us_section',$pageID); ?>
  <?php if(!empty(array_filter($location))): ?>
  <div class="map-wrapper">
    <div class="container">
      <?php if($location['section_label']): ?>
        <span class="map-tag"><?php echo $location['section_label'] ?></span>
      <?php endif; ?>
      <?php if($location['title']): ?>
        <h2><?php echo $location['title'] ?></h2>
      <?php endif; ?>
  
      <?php if($location['location_url']): ?>
      <div class="map-box">
        <iframe
          src="<?php echo $location['location_url'] ?>"
          allowfullscreen
          loading="lazy">
        </iframe>
        <span class="map-hint"></span>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
</section>



 <?php get_footer(); ?>