<?php



// Register Custom Post Type

function register_custom_post_type()
{


    register_post_type('services', array(

        'label' => 'Services',
        'description' => 'Services offered',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'page',
        'hierarchical' => false,
        'query_var' => true,
        'exclude_from_search' => false,
        'publicly_queryable'    => true,
        'menu_icon' => 'dashicons-media-document',
        'has_archive'           => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt', 'custom-fields'),

        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Services',
            'featured_image' => __('Featured Image'),
            'menu_name' => 'Services',
            'add_new' => 'Add New Service',
            'add_new_item' => 'Add New Service',
            'edit' => 'Edit Service',
            'edit_item' => 'Edit Service',
            'new_item' => 'New Service',
            'view' => 'View Service',
            'view_item' => 'View Service',
            'search_items' => 'Search Service',
            'not_found' => 'No Services Found',
            'not_found_in_trash' => 'No Services Found in Trash',
            'parent' => 'Parent Service'
        )

    ));


    register_post_type('news', array(

        'label' => 'News',
        'description' => 'Customer notices, service changes, scheduled maintenance, and bank announcements',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'query_var' => true,
        'exclude_from_search' => false,
        'publicly_queryable'    => true,
        'menu_icon' => 'dashicons-megaphone',
        'has_archive'           => false,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt', 'custom-fields'),

        'labels' => array(
            'name' => 'News',
            'singular_name' => 'News',
            'featured_image' => __('Featured Image'),
            'menu_name' => 'News',
            'add_new' => 'Add News',
            'add_new_item' => 'Add News',
            'edit' => 'Edit News',
            'edit_item' => 'Edit News',
            'new_item' => 'New News',
            'view' => 'View News',
            'view_item' => 'View News',
            'search_items' => 'Search News',
            'not_found' => 'No News Found',
            'not_found_in_trash' => 'No News Found in Trash',
            'parent' => 'Parent News'
        )

    ));

    
}



add_action('init', 'register_custom_post_type', 0);
