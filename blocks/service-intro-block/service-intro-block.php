<?php

/**
 * Service intro block
 *
 * @param array $block The block settings and attributes.
 */

$blockID = $block['id'];
$anchor = 'service-intro-block-' . $blockID;
$class_name = '';

if (! empty($block['className'])) {
    $class_name = $block['className'];
}
if (! empty($block['anchor'])) {
    $anchor = $block['anchor'];
} ?>

<?php $block = get_field('service_introduction',$blockID) ?>

<?php if(!empty(array_filter($block))): ?>
<section class="agric-loan-section">
    <div class="container">

        <div class="agric-top">
            <?php if($block['image']): ?>
            <div class="image-box">
                <img src="<?php echo $block['image']['url'] ?>" alt="Service">
            </div>
            <?php endif; ?>

            <div class="content-box">
                <?php if($block['section_label']): ?>
                    <span class="label"><?php echo $block['section_label'] ?></span>
                <?php endif; ?>
                <?php if($block['title']): ?>
                    <h2><?php echo $block['title'] ?></h2>
                <?php endif; ?>
                <?php if($block['content']): ?>
                    <p><?php echo $block['content'] ?></p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
<?php endif; ?>


