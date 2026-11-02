<?php

/*------- Theme Supports ---------*/

add_action('after_setup_theme', 'res_theme_support');

function res_theme_support()

{

    add_theme_support('wp-block-styles');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_post_type_support('page', 'excerpt');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');

    // Woocommerce Support
    add_theme_support('woocommerce');
    //Woocommerce gallery support
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    /*** end ***/

}

@ini_set('upload_max_size', '1G');
@ini_set('post_max_size', '1G');
@ini_set('max_execution_time', '3000');

/* Flush rewrite rules for custom post types. */

add_action('after_switch_theme', 'awpr_flush_rewrite_rules');

function awpr_flush_rewrite_rules()

{
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}



/*------------- Disallow Backend Editting ----------------*/

define('DISALLOW_FILE_EDIT', true);



/*-------------- Disable XMLRPC ---------------------*/

add_filter('xmlrpc_enabled', '__return_false');



/*------------- Hide Wordpress Version Generator ---------------*/

add_filter('the_generator', 'version');

function version()

{

    return '';

}



/*----------- Remove WP-Embed script ---------------*/

function disable_embeds_init()

{

    // Remove the REST API endpoint.

    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.

    // Don't filter oEmbed results.

    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.

    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.

    remove_action('wp_head', 'wp_oembed_add_host_js');

}

add_action('init', 'disable_embeds_init', 9999);



// import files 
require_once get_template_directory() . '/includes/post_types.php';
require_once get_template_directory() . '/includes/taxonomy.php';
require_once get_template_directory() . '/includes/acf_blocks.php';
require_once get_template_directory() . '/includes/acf_themeoptions.php';  



/*------- Remove emoji script and css ------*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/*---------------acf Settings ----------*/
include_once('includes/acf-pro/acf.php');

add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path($path)

{

    // update path

    $path = get_bloginfo('stylesheet_directory') . '/includes/acf-pro/';

    // return

    return $path;

}



add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir($dir)

{

    $dir = get_stylesheet_directory_uri() . '/includes/acf-pro/';



    return $dir;

}



/**

 * acf options page

 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(

        'page_title'  => 'Theme General Settings',

        'menu_title'  => 'Theme Options',

        'menu_slug'   => 'theme-general-settings',

        'capability'  => 'edit_posts',

        'redirect'    => false

    ));



    acf_add_options_sub_page(array(

        'page_title'  => 'Social Media',

        'menu_title'  => 'Social Media',

        'parent_slug' => 'theme-general-settings',

    ));



    acf_add_options_sub_page(array(

        'page_title'  => 'Footer',

        'menu_title'  => 'Footer',

        'parent_slug' => 'theme-general-settings',

    ));



}



/**

 * Remove acf sttings from backend

 */

//add_filter( 'acf/settings/show_admin', '__return_false' );



/*------- Excerpt -------*/

function new_excerpt_length($length)

{

    return 200;  // length used for media press release

}

add_filter('excerpt_length', 'new_excerpt_length');



function trim_excerpt($more)

{

    return '...';

}

add_filter('excerpt_more', 'trim_excerpt');

/*** end ***/



/* ------------Shorten text without cutting words in half-------------------*/

// function trim_text($input, $length, $ellipses = true, $strip_html = true)

// {

//     //strip tags, if desired

//     if ($strip_html) {

//         $input = strip_tags($input);

//     }

//     //no need to trim, already shorter than trim length

//     if (strlen($input) <= $length) {

//         return $input;

//     }



//     //find last space within length

//     $last_space = strrpos(substr($input, 0, $length), ' ');

//     $trimmed_text = substr($input, 0, $last_space);



//     //add ellipses (...)

//     if ($ellipses) {

//         $trimmed_text .= ' ...';

//     }



//     return $trimmed_text;

// }





/*----- svg support -----*/

function cc_mime_types($mimes)

{

    $mimes['svg'] = 'image/svg+xml';

    return $mimes;

}

add_filter('upload_mimes', 'cc_mime_types');



/*----- custom post archive -----*/

add_filter('pre_get_posts', 'query_post_type');

function query_post_type($query)

{

    if (is_category() || is_tag() || is_month() || is_day() || is_year()) {

        $post_type = get_query_var('post_type');

        if ($post_type)

            $post_type = $post_type;

        else

            $post_type = get_post_types();

        $query->set('post_type', $post_type);

        return $query;

    }

}









// *----- Wp Login Page Logo Link ------*/

add_filter('login_headerurl', 'custom_loginlogo_url');

function custom_loginlogo_url($url)

{

    return get_home_url();

}

/*-----------------------------Admin login logo-------------------------------*/



function put_my_url()

{

    return (site_url('/login'));

}





/*------- Removing p tag --------*/

add_filter('wpcf7_autop_or_not', '__return_false');





/*------- Enqueue Scripts & Styles --------*/

add_action('wp_enqueue_scripts', 'theme_scripts_styles');

function theme_scripts_styles()

{

    wp_deregister_script('jquery');

    wp_deregister_script('jquery-migrate');

    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');

    wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/migrate.js');

    wp_enqueue_script('jquery');

    wp_enqueue_script('jquery-migrate');



    //Custom

    wp_register_script('Swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), '', true);

    wp_register_script('sticky', get_template_directory_uri() . '/js/sticky.js', array('jquery'), '', true);

    wp_register_script('gsap', get_template_directory_uri() . '/js/gsap.min.js', array('jquery'), '', true);

    wp_register_script('scrollTrigger', get_template_directory_uri() . '/js/scroll-trigger.min.js', array('jquery'), '', true);

    wp_register_script('common_scripts', get_template_directory_uri() . '/js/common.js', array('jquery'), '', true);

    wp_register_script('magnificPopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '', true);

    wp_register_script('validate', get_template_directory_uri() . '/js/validate.js', array('jquery'), '', true);

    wp_register_script('aos', get_template_directory_uri() . '/js/aos.js', array('jquery'), '', true);



    wp_enqueue_script('Swiper');

    wp_enqueue_script('gsap');

    wp_enqueue_script('scrollTrigger');

    wp_enqueue_script('aos');

    wp_enqueue_script('common_scripts');

    wp_enqueue_script('magnificPopup');

}



/*------ Remove script attributes -------*/

add_filter('style_loader_tag', 'mtheme_remove_type_attr', 10, 2);

add_filter('script_loader_tag', 'mtheme_remove_type_attr', 10, 2);

function mtheme_remove_type_attr($tag, $handle)

{

    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);

}



/**

 * Adding Defer attribute to scripts

 */

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

function add_defer_attribute($tag, $handle)

{

    // add script handles to the array below

    $scripts_to_defer = array('google_map');



    foreach ($scripts_to_defer as $defer_script) {

        if ($defer_script === $handle) {

            return str_replace(' src', ' defer="defer" src', $tag);

        }

    }

    return $tag;

}



/*------- remove css and js versions --------*/

function vc_remove_wp_ver_css_js($src)

{

    if (strpos($src, 'ver=' . get_bloginfo('version')))

        $src = remove_query_arg('ver', $src);

    return $src;

}

add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);

add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);



/*-------- Move header scripts to footer ------*/

function remove_head_scripts()

{

    remove_action('wp_head', 'wp_print_scripts');

    remove_action('wp_head', 'wp_print_head_scripts', 9);

    remove_action('wp_head', 'wp_enqueue_scripts', 1);



    add_action('wp_footer', 'wp_print_scripts', 5);

    add_action('wp_footer', 'wp_enqueue_scripts', 5);

    add_action('wp_footer', 'wp_print_head_scripts', 5);

}

add_action('wp_enqueue_scripts', 'remove_head_scripts');



/*------ Register Navigation Menu -------*/

register_nav_menus(

    array(

        'header_menu' => 'Header Menu',

        'right_header_menu' => 'Right Header Menu',

        'footer_menu1' => 'Footer Menu1',

        'quick_links' => 'Quick Links Menu',

        'affiliated_links' => 'Affiliated Companies Menu',

    )

);











// Remove category archives

// add_action('template_redirect', 'jltwp_adminify_remove_archives_category');

// function jltwp_adminify_remove_archives_category()

// {

//     if (is_category()) {

//         $target = get_option('siteurl');

//         $status = '301';

//         wp_redirect($target, 301);

//         die();

//     }

// }



// Register Custom Post Type



// function custom_post_type()



// {



   



    

// }



// add_action('init', 'custom_post_type', 0);





// /*------------------------ Register taxonomies --------------------------*/

// function add_custom_taxonomies()

// {

//     register_taxonomy('genre', array('department'), array(

//         'hierarchical' => true,

//         'has_archive' => false,

//         'public' => false,

//         'show_ui' => true,

//         'show_admin_column' => true,

//         'show_in_rest' => true,

//         'labels' => array(

//             'name' => _x('Genre', 'taxonomy general name'),

//             'singular_name' => _x('Genre', 'taxonomy singular name'),

//             'search_items' => __('Search Genre'),

//             'all_items' => __('All Genre'),

//             'parent_item' => __('Parent Genre'),

//             'parent_item_colon' => __('Parent Genre:'),

//             'edit_item' => __('Edit Genre'),

//             'update_item' => __('Update Genre'),
//            'add_new_item' => __('Add New Genre'),
//             'new_item_name' => __('New Genre Name'),
//             'menu_name' => __('Genre'),
//         ),
//         'rewrite' => array(
//             'with_front'   => false,
//             'hierarchical' => true,

//             'ep_mask'      => EP_NONE

//         )

//     ));

// }

// add_action('init', 'add_custom_taxonomies');






//   Custom Login Page Styling



function nexty_custom_login_design() { ?>

    <style>

        /* ===== NKrankwanta Bank – wp-login  */

body.login {
    background: linear-gradient(135deg, #0E7F64, #0E3A6F) !important;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Main container */
#login {
    width: 420px !important;
    padding: 0 !important;
}

/* Card */
#loginform {
    background: #ffffff !important;
    border-radius: 18px !important;
    padding: 45px 45px 40px !important;
    box-shadow: 0 25px 60px rgba(0,0,0,.35) !important;
    border: none !important;
}

/* Logo */
.login h1 a {
    background-image: url('http://192.168.0.157/narb/wp-content/uploads/2025/12/narb-logo-white.png') !important;
    width: 220px !important;
    height: 60px !important;
    background-size: contain !important;
    margin: 0 auto 20px !important;
}

/* Labels */
#loginform label {
    font-weight: 600 !important;
    color: #0E3A6F !important;
}

/* Inputs */
#loginform input[type="text"],
#loginform input[type="password"] {
    width: 100% !important;
    background: transparent !important;
    border: none !important;
    border-bottom: 2px solid #cbd5e1 !important;
    padding: 12px 6px !important;
    font-size: 14px !important;
    box-shadow: none !important;
}

#loginform input:focus {
    border-bottom-color: #0E7F64 !important;
    outline: none !important;
}

/* Button */
#wp-submit {
    width: 100% !important;
    border-radius: 30px !important;
    padding: 13px !important;
    font-weight: 600 !important;
    background: linear-gradient(135deg, #0E7F64, #0E3A6F) !important;
    border: none !important;
    color: #ffffff !important;
    margin-top: 12px !important;
    cursor: pointer !important;
}

#wp-submit:hover {
    filter: brightness(1.1) !important;
}

/* Remember me */
.forgetmenot label {
    color: #ffffffff !important;
}

/* Links */
#nav, #backtoblog {
    display: block !important;
    text-align: center !important;
    margin-top: 18px !important;
}

#nav a, #backtoblog a {
    color: #ffffffff !important;
    font-weight: 600 !important;
    text-decoration: none !important;
}

#nav a:hover, #backtoblog a:hover {
    text-decoration: underline !important;
}

/* Error & messages */
.login .message, .login #login_error {
    border-left: 4px solid #0E7F64 !important;
}

/* Remove WP underline curve effect */
.login form .input,
.login input[type="text"],
.login input[type="password"] {
    border-radius: 0 !important;
}

    </style>

<?php }

add_action('login_enqueue_scripts', 'nexty_custom_login_design');



// Remove WordPress footer credit everywhere
add_filter( 'admin_footer_text', '__return_empty_string', 11 );
add_filter( 'update_footer', '__return_empty_string', 11 );

// Removed comments from dashboard
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});


// function my_custom_dashboard_widget() {
//     wp_add_dashboard_widget(
//         'my_widget_id',
//         'My Custom Widget',
//         'my_custom_dashboard_widget_content'
//     );
// }

// function my_custom_dashboard_widget_content() {
//     echo '<p>Hello! This is my custom dashboard widget.</p>';
//     echo '<a href="https://example.com">Visit my site</a>';
// }

// add_action('wp_dashboard_setup', 'my_custom_dashboard_widget');



//store acf fields as json
add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});



// hide acf from sidebar
add_filter('acf/settings/show_admin', '__return_false');





?>



