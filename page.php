<?php

get_header();
?>
<div class="default_page">
    <div class="container">
        <?php if (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>