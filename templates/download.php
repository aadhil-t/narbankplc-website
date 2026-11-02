<?php
/*
Template Name: Download Page
*/
get_header();

$pageID = get_the_ID();

wp_enqueue_script('Swiper');
wp_enqueue_script('gsap');
wp_enqueue_script('aos');

add_action('wp_footer', 'home_scripts', 25);
function home_scripts()
{ ?>
  <script>
    const tabs = document.querySelectorAll(".forms-sidebar .tab");
    const panels = document.querySelectorAll(".tab-panel");

    tabs.forEach(tab => {
      tab.addEventListener("click", () => {
        tabs.forEach(t => t.classList.remove("active"));
        panels.forEach(p => p.classList.remove("active"));
        tab.classList.add("active");
        document.getElementById(tab.dataset.tab).classList.add("active");
      });
    });
  </script>
<?php } ?>


<?php $banner = get_field('banner', $pageID); ?>
<?php if ($banner): ?>
  <section class="sub-banner">
    <div class="sub-banner-bg" style="background-image:url('<?php echo $banner['banner_image']['url']; ?>')"></div>
    <div class="container">
      <div class="sub-banner-content">
        <h1><?php echo $banner['heading']; ?></h1>
        <p><?php echo $banner['description']; ?></p>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php if (have_rows('categories', $pageID)): ?>
  <section class="forms-section">
    <div class="container">
      <div class="forms-layout">

        
        <aside class="forms-sidebar">
          <?php $i = 1;
          while (have_rows('categories', $pageID)): the_row(); ?>
            <button class="tab <?php echo ($i == 1) ? 'active' : ''; ?>" data-tab="tab-<?php echo $i; ?>">
              <?php the_sub_field('category_title'); ?>
            </button>
          <?php $i++;
          endwhile; ?>
        </aside>

        
        <div class="forms-content">
          <?php $i = 1;
          while (have_rows('categories', $pageID)): the_row(); ?>
            <div class="tab-panel <?php echo ($i == 1) ? 'active' : ''; ?>" id="tab-<?php echo $i; ?>">

              <h2><?php the_sub_field('category_title'); ?></h2>

              <?php if (have_rows('downloadable_item')): ?>
                <div class="forms-list">
                  <?php while (have_rows('downloadable_item')): the_row(); ?>
                    <div class="form-item">
                      <span><?php the_sub_field('title'); ?></span>
                      <a href="<?php the_sub_field('url'); ?>" target="_blank">Download</a>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>

            </div>
          <?php $i++;
          endwhile; ?>
        </div>

      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>