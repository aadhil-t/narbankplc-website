<!DOCTYPE html>

<html <?php language_attributes(); ?>>


<head>

  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <meta name="theme-color" content="#1D35AA" />

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" type="text/css" media="screen" />

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" type="text/css" media="screen" />



  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <?php if (!(get_site_icon_url())) : ?>

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

  <?php endif;

  wp_head(); ?>



  <script>
    var site_url = '<?php echo site_url(); ?>';

    var directory_url = "<?php bloginfo('template_directory'); ?>";

    window.stylesheet_directory_uri = '<?php echo get_stylesheet_directory_uri(); ?>';

    var theme_url = '<?php echo get_template_directory_uri(); ?>';

    var directory_url = "<?php bloginfo('template_directory'); ?>";

    var ajax_url = "<?php echo admin_url() . "/admin-ajax.php"; ?>";

    <?php if (get_field('head_scripts', 'option') != '') {

      echo get_field('head_scripts', 'option');
    } ?>
  </script>



  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const hamburger = document.getElementById("hamburger");
      const nav = document.getElementById("nav");

      if (hamburger && nav) {
        hamburger.addEventListener("click", function() {
          hamburger.classList.toggle("active");
          nav.classList.toggle("open");
        });
      }
    });
  </script>




  <?php global $wp_query;

  global $post; ?>

  <style>
    <?php if (get_field('custom_css', 'option') != '') {

      echo get_field('custom_css', 'option');
    }

    if ($post->ID) {

      if (get_field('custom_css', $post->ID)) {

        echo get_field('custom_css', $post->ID);
      }
    } ?>
  </style>

  <?php if (get_field('google_analytics', 'option')) {

    echo get_field('google_analytics', 'option');
  } ?>



</head>



<body <?php body_class(); ?>>

  <?php if (get_field('body_scripts', 'option') != '') {

    echo get_field('body_scripts', 'option');
  } ?>

  <?php $pageID = get_the_ID();

  global $post;

  $logo = get_field('header_logo', 'options')



  ?>



  <!-- code here... -->
  <div class="strip-info-bar">
    <div class="fluidcontainer">
      <div class="info-row">
        <div class="info-item">
          <i class="icon location"></i>
          <span>Nkrankwanta, Bono.</span>
        </div>

        <div class="info-item">
          <i class="icon mail"></i>
          <span>info@nkrankwantaarearuralbank.com</span>
        </div>

        <div class="info-item">
          <i class="icon phone"></i>
          <span>0242-702-627 / 0241-085-910</span>
        </div>
      </div>
    </div>
  </div>


  <header class="main-header <?php if (is_singular('news')) echo 'news-header'; ?> <?php echo (is_front_page() || is_home()) ? '' : 'sub-header'; ?>">
    <div class="fluidcontainer header-inner">

      <!-- Logo -->
      <div class="logo">
        <?php if (is_singular('news')): ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/dark-logo.png" alt="Logo">
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/header/header-logo.svg" alt="Logo">
        <?php endif; ?>
      </div>

      <!-- Hamburger -->
      <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <!-- Navigation -->
      <nav class="nav" id="nav">
        <ul>
          <li>
            <a href="#" class="active">
              <img src="<?php echo get_template_directory_uri(); ?>/images/header/home-icon.svg" alt="">
            </a>
          </li>
          <li><a href="https://demo-hostinger3.acodez.ca/narb/about/">About</a></li>
          <li><a href="https://demo-hostinger3.acodez.ca/narb/services/">Services</a></li>
          <li><a href="https://demo-hostinger3.acodez.ca/narb/news/">News</a></li>
          <li><a href="https://demo-hostinger3.acodez.ca/narb/career/">Careers</a></li>
          <li><a href="https://demo-hostinger3.acodez.ca/narb/contact/">Contact</a></li>
        </ul>

        <a class="apply-btn" href="#">Apply For Loan</a>
      </nav>

    </div>
  </header>