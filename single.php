<?php
get_header();
$page_ID = get_the_ID();
?>
<div class="blog-details-page">
    <div class="container">
        <?php if (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) :
                the_post_thumbnail();
            endif; ?>
            <?php the_content(); ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>