<?php

/**
 * Common banner block
 *
 * @param array $block The block settings and attributes.
 */

$blockID = $block['id'];
$anchor = 'banner-block-' . $blockID;
$class_name = '';

if (! empty($block['className'])) {
    $class_name = $block['className'];
}
if (! empty($block['anchor'])) {
    $anchor = $block['anchor'];
} ?>


<?php $block = get_field('banner_block',$blockID); ?>

<?php if(!empty(array_filter($block))): ?>
<section class="sub-banner">
  <div class="sub-banner-bg"
    style="background-image:url('<?php echo $block['image']['url'] ?>');">
  </div>

  <div class="container">

    <!-- MAIN CONTENT -->
    <div class="sub-banner-content">
      <?php if($block['title']): ?>
        <h1><?php echo $block['title'] ?></h1>
      <?php endif; ?>
      <?php if($block['description']): ?>
        <p><?php echo $block['description'] ?></p>
      <?php endif; ?>
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
<?php endif; ?>