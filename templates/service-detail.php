 <?php

    /*

    Template Name: Service Detail Page

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

 
<!-- Sub banner -->
<section class="sub-banner">
  <div class="sub-banner-bg"
    style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/service-detail/bnr-srvdetail.png');">
  </div>

  <div class="container">

    <!-- MAIN CONTENT -->
    <div class="sub-banner-content">
      <h1>Agriculture Loans</h1>
      <p>
        Empowering farmers and agribusinesses with the financial support needed
        to improve productivity, grow operations, and boost long-term sustainability.
      </p>
    </div>

    <!-- BREADCRUMBS (BOTTOM LEFT) -->
    <div class="breadcrumbs">
      <a href="http://192.168.0.157/narb/service/">Services</a>
      <span>/</span>
      <a href="/services/loans">Loans</a>
      <span>/</span>
      <span class="current">Agricultural Loans</span>
    </div>

  </div>
</section>



  <!-- ================= AGRICULTURAL LOAN SECTION ================= -->
  <section class="agric-loan-section">
    <div class="container">

      <div class="agric-top">
        <div class="image-box">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-detail/agricloan.png" alt="Service">
        </div>

        <div class="content-box">
          <span class="label">AGRICULTURAL LOANS</span>
          <h2>Financing That Matches Your<br>Farming Seasons</h2>
          <p>
            Agriculture drives our local economy. At Nkrankwanta Area Rural Bank,
            we offer Agriculture Loans that provide short-term financial assistance
            for planting, harvesting, input supplies, and other farming activities.
            Designed to match the realities of farming, this loan gives you the
            funds you need — right when you need them.
          </p>
        </div>
      </div>

    </div>
  </section>


  <!-- ================= KEY FEATURES SECTION ================= -->
  <section class="agric-features-section">
      <div class="container">

        <div class="features-wrap">

          <!-- GRID ITEM 1 -->
          <div class="features-left">
            <span class="label">KEY FEATURES</span>
            <h3>What Makes Our<br>Agric Loan Different</h3>
            <p class="intro-text">
              Helping you increase productivity, expand operations,
              and secure better harvests.
            </p>
          </div>

          <!-- GRID ITEM 2–6 -->
          <div class="features-right">

            <div class="feature-card">
              <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-detail/withdrawal.svg" alt="Service icon">
              <h4>Over Withdrawal on Current Account</h4>
              <p>
                Enjoy the flexibility of over withdrawal on your current account. Our Agriculture Loans are structured to 
                accommodate the dynamic financial requirements of agricultural activities, allowing you to access additional 
                funds when needed.
              </p>
            </div>

            <div class="feature-card">
              <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-detail/account.svg" alt="Service icon">
              <h4>Open to All Current Account Salary Customers</h4>
              <p>
                Our Agriculture Loans are accessible to all current account salary customers of the bank. Whether you’re 
                an individual farmer or part of an agribusiness, seize the opportunity to fuel your agricultural initiatives.
              </p>
            </div>

            <div class="feature-card">
              <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-detail/credit.svg" alt="Service icon">
              <h4>Short-Term Credit Facility</h4>
              <p>
                Our Agriculture Loans offer a short-term credit facility, providing immediate financial assistance for your 
                agricultural projects. Whether you need funds for planting, harvesting, or other agricultural activities, 
                we’ve got you covered.
              </p>
            </div>

            <div class="feature-card">
              <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-detail/farming.svg" alt="Service icon">
              <h4>Tailored for Farming Needs</h4>
              <p>
                Customize your loan to suit your specific farming needs. We understand the diverse nature of agriculture, 
                and our Agriculture Loans are adaptable to various agricultural activities, ensuring you have the right 
                financial support.
              </p>
            </div>

            <div class="feature-card">
              <img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-detail/process.svg" alt="Service icon">
              <h4>Swift Application Process</h4>
              <p>
                Experience a swift and hassle-free application process. We prioritize the urgency of your agricultural 
                projects and strive to provide quick approvals, allowing you to commence your farming activities without 
                delay.
              </p>
            </div>

          </div>
        </div>

      </div>
  </section>


  <!-- OPPORTUNITY SECTION Common -->
  <section class="opportunity-section service-opportunity">
    <div class="container">

      <div class="opportunity-card agric">

        <!-- LEFT FLOAT IMAGE -->
        <div class="float-img top-left">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/opportunity/opprt1.png" alt="">
        </div>

        <!-- RIGHT FLOAT IMAGE -->
        <div class="float-img bottom-right">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/opportunity/opprt2.png" alt="">
        </div>

        <!-- DECORATIVE CIRCLES -->
        <span class="circle circle-left"></span>
        <span class="circle circle-right"></span>

        <!-- CONTENT -->
        <div class="content">
          <h2>We are open for opportunities!</h2>

          <p>
            Our approach to serving its community and fostering growth and prosperity.
            It conveys a sense of readiness to embrace new prospects, meet the evolving
            financial needs of the rural populace, and be a trusted partner for those
            seeking opportunities to thrive. to resolving issues promptly, while our
            robust feedback loop ensures that customer input drives continuous improvement.
          </p>

          <a href="#" class="details-btn">Apply Now</a>
        </div>

      </div>

    </div>
  </section>

  <!-- news section -->
  <section class="news-section news-sec-cmn">
    <div class="container">

      <!-- HEADER -->
      <div class="news-header">
        <div class="left">
          <span class="tag">OUR NEWS</span>
          <h2>Know what is happening</h2>
        </div>

        <a href="#" class="details-btn">View all news</a>
      </div>

      <!-- NEWS CARDS -->
      <div class="news-cards">

        <article class="news-card">
          <div class="img-wrap">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/news/news1.png" alt="">
          </div>
          <div class="content">
            <h3>EMPOWERING CLIENTS: A BANK’S TRAINING INITIATIVE.</h3>
            <p>At Capital Growth Bank, financial literacy is key...</p>
            <div class="card-footer">
              <span class="date">October 27, 2025</span>
              <span class="arrow">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/newsarrow.svg" alt="">
              </span>
            </div>
          </div>
        </article>

        <article class="news-card">
          <div class="img-wrap">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/news/news2.png" alt="">
          </div>
          <div class="content">
            <h3>NARB INTRODUCES NEW ATM FOR CONVENIENT BANKING.</h3>
            <p>NARB has launched a new ATM machine to enhance...</p>
            <div class="card-footer">
              <span class="date">October 27, 2025</span>
              <span class="arrow">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/newsarrow.svg" alt="">
              </span>
            </div>
          </div>
        </article>

        <article class="news-card">
          <div class="img-wrap">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/news/news3.png" alt="">
          </div>
          <div class="content">
            <h3>NARB INTRODUCES NEW ATM FOR CONVENIENT BANKING.</h3>
            <p>NARB has launched a new ATM machine to enhance...</p>
            <div class="card-footer">
              <span class="date">October 27, 2025</span>
              <span class="arrow">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/newsarrow.svg" alt="">
              </span>
            </div>
          </div>
        </article>

        <article class="news-card">
          <div class="img-wrap">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/news/news4.png" alt="">
          </div>
          <div class="content">
            <h3>NARB INTRODUCES NEW ATM FOR CONVENIENT BANKING.</h3>
            <p>NARB has launched a new ATM machine to enhance...</p>
            <div class="card-footer">
              <span class="date">October 27, 2025</span>
              <span class="arrow">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/newsarrow.svg" alt="">
              </span>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

 <?php get_footer(); ?>