<?php

/**
 * ACF Blocks
 *
 */

add_filter('block_categories_all', function ($categories) {

    // Adding a new category and prepending it to the top.

    array_unshift($categories, array(
        'slug'  => 'narb',
        'title' => 'NARB Layouts',
    ));

    return $categories;
});





add_action('acf_block_render_template', 'aco_render_acf_preview', 10, 3);

function aco_render_acf_preview($block, $content, $is_preview)

{

    if ($is_preview) {

        if (isset($block['data']['aco_has_preview_image']) && $block['data']['aco_has_preview_image']) :    /* rendering in inserter preview  */

            echo '<img src="' . get_stylesheet_directory_uri() . '/' . dirname($block['render_template']) . '/preview.png" style="width:100%; height:auto;">';

        // get_stylesheet_directory_uri()

        endif;
    }
}





// NARB Blocks

add_action('acf/init', 'my_acf_init');

function my_acf_init()

{

    // // 1.  Hero Slider Banner - archana

    // acf_register_block_type(array(

    //     'name' => 'hero-slider-banner',

    //     'title' => __('Hero Slider Banner'),

    //     'description' => __('A custom block for sliding banners.'),

    //     'render_template' => 'blocks/hero-slider-banner/hero-slider-banner.php',

    //     'category' => 'nexty',

    //     'icon' => 'cover-image',

    //     'keywords' => array('banner', 'hero banner', 'home'),

    //     'mode' => 'preview',

    //     'supports' => [

    //         'align' => true,

    //         'mode' => true,

    //         'anchor' => true,

    //     ],

    //     'align' => array('left', 'right', 'full'),

    //     'enqueue_assets' => function () {

    //         wp_enqueue_script('hero-slider-banner', get_stylesheet_directory_uri() . '/blocks/hero-slider-banner/hero-slider-banner.js', array('jquery'), '', true);

    //     },

    //     'example' => array(

    //         'attributes' => array(

    //             'mode' => 'preview',

    //             'data' => array(

    //                 'aco_has_preview_image' => true,

    //             ),

    //         ),

    //     ),

    // ));



    // 2. two-col-info-block

    acf_register_block_type(array(
        'name' => 'banner-block',
        'title' => __('Banner block'),
        'description' => __('Custom banner block for service pages'),
        'render_template' => 'blocks/banner-block/banner-block.php',
        'category' => 'narb',
        'icon' => 'cover-image',
        'keywords' => array('banner', 'services'),
        'mode' => 'preview',
        'supports' => [
            'align' => true,
            'mode' => true,
            'anchor' => true,
        ],

        'align' => array('left', 'right', 'full'),
        'enqueue_assets' => function () {
            // wp_enqueue_script('hero-slider-banner', get_stylesheet_directory_uri() . '/blocks/two-col-info-block/two-col-info-block.js', array('jquery'), '', true);
        },
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'aco_has_preview_image' => true,
                ),
            ),
        ),
    ));


    // 2. two-col-info-block

    acf_register_block_type(array(
        'name' => 'service-intro-block',
        'title' => __('Service intro block'),
        'description' => __('Service introduction block'),
        'render_template' => 'blocks/service-intro-block/service-intro-block.php',
        'category' => 'narb',
        'icon' => 'cover-image',
        'keywords' => array('contents', 'services'),
        'mode' => 'preview',
        'supports' => [
            'align' => true,
            'mode' => true,
            'anchor' => true,
        ],

        'align' => array('left', 'right', 'full'),
        'enqueue_assets' => function () {
            // wp_enqueue_script('hero-slider-banner', get_stylesheet_directory_uri() . '/blocks/two-col-info-block/two-col-info-block.js', array('jquery'), '', true);
        },
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'aco_has_preview_image' => true,
                ),
            ),
        ),
    ));


    acf_register_block_type(array(
        'name' => 'service-features-block',
        'title' => __('Service features block'),
        'description' => __('Service introduction block'),
        'render_template' => 'blocks/service-features/service-features.php',
        'category' => 'narb',
        'icon' => 'cover-image',
        'keywords' => array('contents', 'services','features'),
        'mode' => 'preview',
        'supports' => [
            'align' => true,
            'mode' => true,
            'anchor' => true,
        ],

        'align' => array('left', 'right', 'full'),
        'enqueue_assets' => function () {
            // wp_enqueue_script('hero-slider-banner', get_stylesheet_directory_uri() . '/blocks/two-col-info-block/two-col-info-block.js', array('jquery'), '', true);
        },
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'aco_has_preview_image' => true,
                ),
            ),
        ),
    ));

    acf_register_block_type(array(
        'name' => 'cta-bar',
        'title' => __('CTA Bar'),
        'description' => __('CTA'),
        'render_template' => 'blocks/cta-bar/cta-bar.php',
        'category' => 'narb',
        'icon' => 'cover-image',
        'keywords' => array('cta', 'services','apply'),
        'mode' => 'preview',
        'supports' => [
            'align' => true,
            'mode' => true,
            'anchor' => true,
        ],

        'align' => array('left', 'right', 'full'),
        'enqueue_assets' => function () {
            // wp_enqueue_script('hero-slider-banner', get_stylesheet_directory_uri() . '/blocks/two-col-info-block/two-col-info-block.js', array('jquery'), '', true);
        },
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'aco_has_preview_image' => true,
                ),
            ),
        ),
    ));


    acf_register_block_type(array(
        'name' => 'news-block',
        'title' => __('News block'),
        'description' => __('News block'),
        'render_template' => 'blocks/news-block/news-block.php',
        'category' => 'narb',
        'icon' => 'cover-image',
        'keywords' => array('cta', 'services','apply'),
        'mode' => 'preview',
        'supports' => [
            'align' => true,
            'mode' => true,
            'anchor' => true,
        ],

        'align' => array('left', 'right', 'full'),
        'enqueue_assets' => function () {
            // wp_enqueue_script('hero-slider-banner', get_stylesheet_directory_uri() . '/blocks/two-col-info-block/two-col-info-block.js', array('jquery'), '', true);
        },
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'aco_has_preview_image' => true,
                ),
            ),
        ),
    ));


}
