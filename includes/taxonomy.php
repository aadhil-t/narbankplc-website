<?php 

/*Register taxonomies ----*/

function add_custom_taxonomies() {
    register_taxonomy('service-categories', array('services'), array(
        'hierarchical' => true,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,

        'labels' => array(
            'name' => _x('Service categories', 'taxonomy general name'),
            'singular_name' => _x('Service Category', 'taxonomy singular name'),
            'search_items' => __('Search Service'),
            'all_items' => __('All Category'),
            'parent_item' => __('Parent Category'),
            'parent_item_colon' => __('Parent Category:'),
            'edit_item' => __('Edit Category'),
            'update_item' => __('Update Category'),
            'add_new_item' => __('Add New Category'),
            'new_item_name' => __('New Category Name'),
            'menu_name' => __('Service Categories'),

        ),

        'rewrite' => array(
            'with_front'   => false,
            'hierarchical' => true,
            'ep_mask'      => EP_NONE
        )

    ));

}

add_action('init', 'add_custom_taxonomies');







?>