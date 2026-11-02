<?php 



function filter_products_by_category() {

    $cat_id = intval($_POST['cat_id']);

    $args = array(
        'post_type' => 'products', 
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product-categories', 
                'field'    => 'term_id',
                'terms'    => $cat_id,
            ),
        ),
    );

    
    $args = array(
        'post_type' => 'products', 
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product-categories', 
                'field'    => 'term_id',
                'terms'    => $cat_id,
            ),
        ),
    );


    $query = new WP_Query($args);
    if ($query->have_posts()) :

        while ($query->have_posts()) : $query->the_post(); ?>

            <div class="dropProduct">

                <div class="dropName">

                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

            </div>

        <?php endwhile;

        wp_reset_postdata();

    else :

        echo '<div class=""><div class="">No products found.</div></div>';

    endif;



    wp_die();

}

 function my_enqueue_scripts() {

    // wp_enqueue_script('custom-ajax', get_stylesheet_directory_uri() . '/js/custom-ajax.js', array('jquery'), null, true);



    wp_localize_script('custom-ajax', 'ajax_object', array(

        'ajaxurl' => admin_url('admin-ajax.php')

    ));

 }

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



// End Test ajax