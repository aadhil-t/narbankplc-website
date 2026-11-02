 <?php

    /*

    Template Name: News Detail Page

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


<section class="news-detail-section">
  <div class="container">
    <div class="news-layout">

      <!-- LEFT CONTENT -->
      <div class="news-content">
        <h1>NARB INTRODUCES NEW ATM FOR CONVENIENT BANKING</h1>

        <div class="news-date-blk">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
          <span class="date">November 27, 2025</span>
        </div>

        <p>
          Eu dis odio faucibus mi in egestas cursus praesent ultrices. 
          Odio est in nunc consectetur purus amet. Elementum sit volutpat
           massa amet nulla tempor ante lacus. Mattis elementum amet 
           sollicitudin maecenas adipiscing. Scelerisque integer morbi 
           nunc senectus sapien. Quisque enim iaculis rhoncus venenatis 
           amet in id.
        </p>

        <p>
          In tellus pharetra id egestas lobortis dui tellus tempor. Tellus 
          habitant lectus in pellentesque fermentum sit vestibulum massa. 
          Pellentesque amet vel euismod non. Iaculis ut mauris interdum quis 
          enim. Gravida vitae integer tempus et sit interdum varius ut facilisi. 
          Luctus sit arcu varius fusce odio. Sit accumsan egestas at nunc. Egestas 
          nam viverra felis augue libero neque bibendum. Facilisis consectetur 
          gravida eu donec augue vitae volutpat erat quis. Nunc fusce dignissim 
          facilisis mauris auctor mi pulvinar arcu nec. 
        </p>

        <p>
          Neque nam aenean adipiscing pretium quam platea enim. Interdum mauris eget 
          vitae viverra felis amet. Blandit at nulla blandit neque ultricies eros ut. 
          Sed egestas condimentum odio pellentesque. Mattis vivamus ultrices nam sit 
          malesuada nam lectus.
        </p>

        <p>
          At et eget mattis mauris. Justo ultricies viverra magna sit hendrerit duis 
          in quam elementum. Sagittis in platea facilisi sapien enim. Massa volutpat 
          sagittis euismod cursus viverra imperdiet odio auctor. In nam commodo nulla 
          imperdiet diam duis lacus et. Gravida imperdiet pellentesque in neque tellus 
          vitae. Mi neque nam rhoncus semper. Viverra eget gravida cursus diam cras.
        </p>

        <p>
          At et eget mattis mauris. Justo ultricies viverra magna sit hendrerit duis 
          in quam elementum. Sagittis in platea facilisi sapien enim. Massa volutpat 
          sagittis euismod cursus viverra imperdiet odio auctor. In nam commodo nulla 
          imperdiet diam duis lacus et. Gravida imperdiet pellentesque in neque tellus 
          vitae. Mi neque nam rhoncus semper. Viverra eget gravida cursus diam cras.
        </p>

        <a href="#" class="details-btn">View all news</a>
      </div>

      <!-- RIGHT SIDEBAR -->
      <aside class="news-sidebar">
        <div class="featured-image">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog-detail/featured.png" alt="">
        </div>

        <div class="recent-news">
          <h3>Recent News</h3>

          <div class="recent-item">
          <img class="rece-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog-detail/rcnwes1.svg" alt="">
            <div class="info">
              <h4>EMPOWERING CLIENTS: A BANK'S TRAINING INITIATIVE.</h4>
                <div class="news-date-blk">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
                    <span class="date">November 27, 2025</span>
                </div>
            </div>
          </div>

          <div class="recent-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog-detail/rcnwes2.svg" alt="">
            <div class="info">
              <h4>NARB INTRODUCES NEW ATM FOR CONVENIENT BANKING.</h4>
                <div class="news-date-blk">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
                    <span class="date">November 27, 2025</span>
                </div>
            </div>
          </div>

          <div class="recent-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog-detail/rcnwes3.svg" alt="">
            <div class="info">
              <h4>NARB INTRODUCES NEW ATM FOR CONVENIENT BANKING.</h4>
                <div class="news-date-blk">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
                    <span class="date">November 27, 2025</span>
                </div>
            </div>
          </div>

          <div class="recent-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog-detail/rcnwes4.svg" alt="">
            <div class="info">
              <h4>ARB APEX BANK ADDRESSES CONCERNS AND PLEDGES SUPPORT FOR RURAL BANKS</h4>
                <div class="news-date-blk">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-blog/date-icon.svg" alt="">
                    <span class="date">November 27, 2025</span>
                </div>
            </div>
          </div>

        </div>
      </aside>

    </div>
  </div>
</section>


 <?php get_footer(); ?>