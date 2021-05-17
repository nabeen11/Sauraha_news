<?php

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */

function prefix_gallery()
{
    $labels = array(
        'name'               => __('Galleries', 'sauraha'),
		'singular_name'      => __('Gallery', 'sauraha'),
		'add_new'            => _x('Add Gallery', 'sauraha', 'sauraha'),
		'add_new_item'       => __('Add New Gallery', 'sauraha'),
		'edit_item'          => __('Edit Gallery', 'sauraha'),
		'new_item'           => __('New Gallery', 'sauraha'),
		'view_item'          => __('View Gallery', 'sauraha'),
		'search_items'       => __('Search Galleries', 'sauraha'),
		'not_found'          => __('No Galleries found', 'sauraha'),
		'not_found_in_trash' => __('No Galleries found in Trash', 'sauraha'),
		'parent_item_colon'  => __('Parent Gallery:', 'sauraha'),
		'menu_name'          => __('Galleries', 'sauraha'),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-format-image',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            // 'custom-fields',
            'trackbacks',
            'comments',
            'revisions',
            'page-attributes',
            'post-formats',
        ),
    );

    register_post_type('gallery', $args);
}

add_action('init', 'prefix_gallery');

?>