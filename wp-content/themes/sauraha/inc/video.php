<?php

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */

function prefix_video()
{
    $labels = array(
        'name'               => __('Videos', 'sauraha'),
		'singular_name'      => __('Video', 'sauraha'),
		'add_new'            => _x('Add Video', 'sauraha', 'sauraha'),
		'add_new_item'       => __('Add New Video', 'sauraha'),
		'edit_item'          => __('Edit Video', 'sauraha'),
		'new_item'           => __('New Video', 'sauraha'),
		'view_item'          => __('View Video', 'sauraha'),
		'search_items'       => __('Search Videos', 'sauraha'),
		'not_found'          => __('No Videos found', 'sauraha'),
		'not_found_in_trash' => __('No Videos found in Trash', 'sauraha'),
		'parent_item_colon'  => __('Parent Video:', 'sauraha'),
		'menu_name'          => __('Videos', 'sauraha'),
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
        'menu_icon'           => 'dashicons-video-alt3',
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

    register_post_type('video', $args);
}

add_action('init', 'prefix_video');

add_action('add_meta_boxes', 'video_metabox_funct');
function video_metabox_funct()
{
    add_meta_box(
        'textbox_id',
        'Video URL',
        'videourl_textbox_callback_function',
        'video',
        'advanced',
        'high'
    );
}

function videourl_textbox_callback_function($post)
{

    wp_nonce_field('videourl_textbox_meta_save_function', 'videourl_textbox_meta_info_nonce');
    $videourl = get_post_meta($post->ID, '_videourl', true);


?>
    <label for="videourl">URL</label>
    <input type="text" name="videourl" placeholder="Url" id="videourl" value="<?php echo $videourl ?>">
<?php
}

function videourl_textbox_meta_save_function($post_id)
{

    if (!isset($_POST['videourl_textbox_meta_info_nonce'])) {
        return $post_id;
    }
    if (!wp_verify_nonce($_POST['videourl_textbox_meta_info_nonce'], 'videourl_textbox_meta_save_function')) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // Check the user's permissions.
    if ('video' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    $videourl = esc_sql(sanitize_text_field($_POST['_videourl']));
    $videourl = $_POST['videourl'];
    update_post_meta($post_id, '_videourl', $videourl);
}
add_action('save_post', 'videourl_textbox_meta_save_function');


?>