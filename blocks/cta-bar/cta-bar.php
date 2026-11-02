<?php

/**
 * Service CTA bar block
 *
 * @param array $block The block settings and attributes.
 */

$blockID = $block['id'];
$anchor = 'cta-bar-' . $blockID;
$class_name = '';

if (! empty($block['className'])) {
    $class_name = $block['className'];
}
if (! empty($block['anchor'])) {
    $anchor = $block['anchor'];
} ?>

<?php $block = get_field('cta_bar',$blockID); ?>

<?php if (!empty(array_filter($block))): ?>
<section class="opportunity-section service-opportunity">
    <div class="container">

      <div class="opportunity-card agric">

        <!-- LEFT FLOAT IMAGE -->
        <div class="float-img top-left">
          <img src="<?php echo $block['top_image']['url'] ?>" alt="<?php echo $block['top_image']['alt'] ?>">
        </div>

        <!-- RIGHT FLOAT IMAGE -->
        <div class="float-img bottom-right">
          <img src="<?php echo $block['bottom_image']['url'] ?>" alt="<?php echo $block['bottom_image']['alt'] ?>">
        </div>

        <!-- DECORATIVE CIRCLES -->
        <span class="circle circle-left"></span>
        <span class="circle circle-right"></span>

        <!-- CONTENT -->
        <div class="content">
          <?php if($block['section_label']): ?>
            <p><?php echo $block['section_label'] ?></p>
          <?php endif; ?>

          <?php if($block['title']): ?>
            <h2><?php echo $block['title'] ?></h2>
          <?php endif; ?>

          <?php if($block['cta_url'] && $block['cta_label']): ?>
            <a href="<?php echo $block['cta_url'] ?>" class="details-btn"><?php echo $block['cta_label'] ?></a>
          <?php endif; ?>
        </div>

      </div>

    </div>
  </section>
<?php endif; ?>