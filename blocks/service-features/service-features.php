<?php

/**
 * Service intro block
 *
 * @param array $block The block settings and attributes.
 */

$blockID = $block['id'];
$anchor = 'service-features-block-' . $blockID;
$class_name = '';

if (! empty($block['className'])) {
    $class_name = $block['className'];
}
if (! empty($block['anchor'])) {
    $anchor = $block['anchor'];
} ?>

<?php $block = get_field('service_features', $blockID); ?>

<?php if (!empty(array_filter($block))): ?>
    <section class="agric-features-section">
        <div class="container">

            <div class="features-wrap">

                <!-- GRID ITEM 1 -->
                <div class="features-left">
                    <?php if ($block['section_label']): ?>
                        <span class="label"><?php echo $block['section_label'] ?></span>
                    <?php endif; ?>
                    <?php if ($block['title']): ?>
                        <h3><?php echo $block['title'] ?></h3>
                    <?php endif; ?>
                    <?php if ($block['description']): ?>
                        <p class="intro-text"><?php echo $block['description'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- GRID ITEM 2–6 -->

                <div class="features-right">

                    <?php $features = get_field('features', $blockID); ?>
                    <?php foreach ($features as $feature): ?>
                        <div class="feature-card">
                            <?php if($feature['icon']): ?>
                                <img class="icon" src="<?php echo $feature['icon']['url'] ?>" alt="service icon">
                            <?php endif; ?>
                            <?php if($feature['title']): ?>
                                <h4><?php echo $feature['title'] ?></h4>
                            <?php endif; ?>
                            <?php if($feature['content']): ?>
                                <p><?php echo $feature['content'] ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>

        </div>
    </section>
<?php endif; ?>