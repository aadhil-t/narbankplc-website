<?php
/**
 * Template Name: archive-services.php
 * Archive template for All Services
 */

get_header();

wp_enqueue_script('Swiper');
wp_enqueue_script('gsap');
wp_enqueue_script('aos');

add_action('wp_footer', 'all_services_scripts', 25);

function all_services_scripts()
{ ?>

<!-- Search functionality -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("serviceSearch");
  const cards = document.querySelectorAll(".service-card");

  if (searchInput && cards.length) {
    searchInput.addEventListener("input", function () {
      const searchTerm = this.value.toLowerCase().trim();
      
      cards.forEach(card => {
        const title = card.querySelector("h3").textContent.toLowerCase();
        const description = card.querySelector("p").textContent.toLowerCase();

        if (title.includes(searchTerm) || description.includes(searchTerm)) {
          card.style.display = "";
        } else {
          card.style.display = "none";
        }
      });
    });
  }
});
</script>



<?php } ?>

<!-- Sub banner -->
<section class="sub-banner">
  <div class="sub-banner-bg"
    style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/service/bnr-service.png');">
  </div>

  <div class="container">
    <div class="sub-banner-content">
      <h1>Banking Made Simple for You</h1>
      <p>
          Discover deposit, loan, and digital banking services designed to support individuals, farmers, traders, 
          and businesses across our communities.
      </p>
    </div>
  </div>
</section>

<!-- Tab service -->
<section class="tab-services-section">
  <div class="container">

    <!-- TABS & SEARCH -->
    <div class="service-tabs-wrapper">
      <div class="service-tabs">
        <!-- All Tab -->
        <a href="<?php echo get_post_type_archive_link('services'); ?>" 
           class="tab-btn active">All Services</a>
        
        <?php
        // Get all service categories
        $categories = get_terms(array(
          'taxonomy' => 'service-categories',
          'hide_empty' => true,
        ));

        if (!empty($categories) && !is_wp_error($categories)) :
          foreach ($categories as $category) : ?>
            <a href="<?php echo get_term_link($category); ?>" 
               class="tab-btn">
              <?php echo esc_html($category->name); ?>
            </a>
          <?php endforeach;
        endif;
        ?>
      </div>

      <!-- SEARCH BOX -->
      <div class="service-search">
        <input type="text" 
               id="serviceSearch" 
               placeholder="Search Services" 
               class="search-input">
        <button class="search-btn">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="2"/>
            <path d="M14 14L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- CARDS GRID -->
    <div class="services-grid">
      <?php
      // Query ALL services (no category filter)
      $args = array(
        'post_type' => 'services',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
      );

      $services_query = new WP_Query($args);

      if ($services_query->have_posts()) :
        while ($services_query->have_posts()) : $services_query->the_post();
          
          // Get custom fields
          $icon = get_post_meta(get_the_ID(), 'service_icon', true);
          
          // Get the category for this service
          $terms = get_the_terms(get_the_ID(), 'service-categories');
          $category_slug = !empty($terms) ? $terms[0]->slug : '';
          ?>

          <a href="<?php the_permalink(); ?>"
             class="service-card show"
             data-category="<?php echo esc_attr($category_slug); ?>">

            <div class="img-wrap">
              <div class="img-inner">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full'); ?>
                <?php else : ?>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/finance/slide1.png" alt="<?php the_title(); ?>">
                <?php endif; ?>
              </div>

              <span class="icon-badge">
                <?php if ($icon) : ?>
                  <img src="<?php echo esc_url($icon); ?>" alt="">
                <?php else : ?>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home/finance/fertilizing.svg" alt="">
                <?php endif; ?>
              </span>
            </div>

            <div class="service-content">
              <h3><?php the_title(); ?></h3>
              <p>
                <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
              </p>
              <span class="details-btn">Read More</span>
            </div>
          </a>

          <?php
        endwhile;
        wp_reset_postdata();
      else : ?>
        <div style="grid-column: 1/-1; text-align: center; padding: 40px;">
          <p>No services found.</p>
        </div>
      <?php endif; ?>
    </div>

    <?php $note = get_field('service_page_note','option') ?>

    <!-- NOTE -->
    <div class="service-note-wrap">
      <span class="note-line"></span>

      <?php if(!empty($note)): ?>
      <div class="service-note">
        <span class="note-icon">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service/exclam.svg" alt="">
        </span>
        <p><span>Note: </span><?php echo $note ?></p>
      </div>
      <?php endif; ?>

      <span class="note-line"></span>
    </div>

  </div>
</section>


 <?php $get_news = new WP_Query([
    'post_type' => 'news',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order_by' => 'date',
    'order' => 'DESC'
 ]); ?>

 <section class="news-section news-sec-cmn">
   <div class="container">

    <div class="news-header">
        <div class="left">
          <span class="tag">OUR NEWS</span>
          <h2>Know what is happening</h2>
        </div>

        <a href="#" class="details-btn">View all news</a>
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