<?php

/**
 * News block
 *
 * @param array $block The block settings and attributes.
 */

$blockID = $block['id'];
$anchor = 'news-block-' . $blockID;
$class_name = '';

if (! empty($block['className'])) {
    $class_name = $block['className'];
}
if (! empty($block['anchor'])) {
    $anchor = $block['anchor'];
} ?>


<?php $block = get_field('news_block',$blockID); ?>


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
         <?php if ($block['section_label']): ?>
           <span class="tag"><?php echo $block['section_label'] ?></span>
         <?php endif; ?>
         <?php if ($block['title']): ?>
           <h2><?php echo $block['title'] ?></h2>
         <?php endif; ?>
       </div>
       <?php if ($block['cta_url'] && $block['cta_label']) : ?>
         <a href="<?php echo $block['cta_url'] ?>" class="details-btn"><?php echo $block['cta_label'] ?></a>
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



