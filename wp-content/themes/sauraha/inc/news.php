<?php

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */

function prefix_news()
{
    $labels = array(
        'name'                 => __('News', 'sauraha'),
        'singular_name'        => __('News', 'sauraha'),
        'add_new'              => __('Add New News', 'sauraha', 'sauraha'),
        'add_new_item'       => __('Add New News', 'sauraha'),
        'edit_item'          => __('Edit News', 'sauraha'),
        'new_item'           => __('New News', 'sauraha'),
        'view_item'          => __('View News', 'sauraha'),
        'search_items'       => __('Search News', 'sauraha'),
        'not_found'          => __('No News found', 'sauraha'),
        'not_found_in_trash' => __('No News found in Trash', 'sauraha'),
        'parent_item_colon'  => __('Parent News', 'sauraha'),
        'menu_name'          => __('News', 'sauraha'),
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
        'menu_icon'           => 'dashicons-media-text',
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

    register_post_type('news', $args);
}

add_action('init', 'prefix_news');


/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */

function newscategory()
{
    $labels = array(
        'name'                  => _x('Categories', 'Categories', 'sauraha'),
        'singular_name'         => _x('Category', 'Category', 'sauraha'),
        'search_items'          => __('Search Categories', 'sauraha'),
        'popular_items'         => __('Popular Categories', 'sauraha'),
        'all_items'             => __('All Categories', 'sauraha'),
        'parent_item'           => __('Parent Category', 'sauraha'),
        'parent_item_colon'     => __('Parent Category', 'sauraha'),
        'edit_item'             => __('Edit Category', 'sauraha'),
        'update_item'           => __('Update Category', 'sauraha'),
        'add_new_item'          => __('Add New Category', 'sauraha'),
        'new_item_name'         => __('New Category Name', 'sauraha'),
        'add_or_remove_items'   => __('Add or remove Categories', 'sauraha'),
        'choose_from_most_used' => __('Choose from most used Categories', 'sauraha'),
        'menu_name'             => __('Categories', 'sauraha'),
    );
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => true,
        'show_tagcloud'     => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'query_var'         => true,
        'capabilities'      => array(),
    );
    register_taxonomy('newscategory', array('news'), $args);
}
add_action('init', 'newscategory');

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */

function newstag()
{
    $labels = array(
        'name'                  => _x('Tags', 'Tags', 'sauraha'),
        'singular_name'         => _x('Tag', 'Tag', 'sauraha'),
        'search_items'          => __('Search Tags', 'sauraha'),
        'popular_items'         => __('Popular Tags', 'sauraha'),
        'all_items'             => __('All Tags', 'sauraha'),
        'parent_item'           => __('Parent Tag', 'sauraha'),
        'parent_item_colon'     => __('Parent Tag', 'sauraha'),
        'edit_item'             => __('Edit Tag', 'sauraha'),
        'update_item'           => __('Update Tag', 'sauraha'),
        'add_new_item'          => __('Add New Tag', 'sauraha'),
        'new_item_name'         => __('New Tag Name', 'sauraha'),
        'add_or_remove_items'   => __('Add or remove Tags', 'sauraha'),
        'choose_from_most_used' => __('Choose from most used Tags', 'sauraha'),
        'menu_name'             => __('Tags', 'sauraha'),
    );
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => false,
        'show_tagcloud'     => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'query_var'         => true,
        'capabilities'      => array(),
    );
    register_taxonomy('newstag', array('news'), $args);
}
add_action('init', 'newstag');

/* Tabs for News */

/*
*Adding new meta to News Category Taxonomy 
* parameter
*	$tag =  {taxonomy-slug}_add_form_fields
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 1
*/
add_action('newscategory_add_form_fields', 'adding_tab_meta_to_news_category', 10, 2);
function adding_tab_meta_to_news_category($taxonomy)
{
?>
	<div class="form-field term-group">

		<label for="show_in_section">Show this category in : </label>
		<input type="checkbox" name="show_to_tab" id="show_to_tab" /><i font-weight="400">Show To Tab</i><br />
	</div>
<?php
}

/*
*Saving new meta info to News Category Taxonomy 
* parameter
*	$tag =  created_{taxonomy-slug}
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 2
*/
add_action('created_newscategory', 'save_tab_news_category_meta', 10, 2);
function save_tab_news_category_meta($term_id, $tt_id)
{
	$show_to_tab = (isset($_POST['show_to_tab']) && $_POST['show_to_tab'] == 'on') ? 1 : 0;
	update_term_meta($term_id, '_show_to_tab', $show_to_tab);
}
/*
*Editing new meta info to News Category Taxonomy 
* parameter
*	$tag =  {taxonomy-slug}_edit_form_fields
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 2
*/
add_action('newscategory_edit_form_fields', 'editing_tab_meta_info_in_news_category', 10, 2);


function editing_tab_meta_info_in_news_category($term, $taxonomy)
{
	$show_to_tab = get_term_meta($term->term_id, '_show_to_tab', true);

?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="feature-group">Show this in category : </label>
		</th>
		<td>
			<!-- Banner Tab -->
			<input type="checkbox" name="show_to_tab" id="show_to_tab" <?php
																						if ($show_to_tab == 1)
																							echo " checked = 'checked'";
																						else
																							echo "";
																						?> /> <i font-weight="400"><small>Show To Tab</small></i>
		</td>
	</tr>

<?php
}
/*
*Saving edited meta info to News Category Taxonomy 
* parameter
*	$tag =  edited_{taxonomy-slug}
*	$function_to_add = custom callback function name
*	$priority  as required
*	$callback args = 2
*/

add_action('edited_newscategory', 'updating_tab_edited_news_category_meta', 10, 2);

function updating_tab_edited_news_category_meta($term_id, $tt_id)
{
	//Banner Tab edit-update
	$show_to_tab = (isset($_POST['show_to_tab']) && $_POST['show_to_tab'] == 'on') ? 1 : 0;
	update_term_meta($term_id, '_show_to_tab', $show_to_tab);	
}

include 'news_template.php';

/* meta box for check box */

add_action('add_meta_boxes', 'checkbox_meta_function');

function checkbox_meta_function()
{
    add_meta_box('checkbox_id', 'Additional Details', 'checkbox_callback_function', 'news', 'advanced', 'high');
}

function checkbox_callback_function($post)
{
    wp_nonce_field('checkbox_save_function', 'checkbox_meta_info_nonce');
    $set_to_homepage = get_post_meta($post->ID, '_set_to_homepage', true);
    $add_to_slider = get_post_meta($post->ID,'_add_to_slider',true);
?>
    <table>
        <tr>
            <td>
                <label for="featured-group">Sticky News: </label>
                <input type="checkbox" name="set_to_homepage" id="set_to_homepage" <?php
                                                                                    if ($set_to_homepage == 1) {
                                                                                        echo  "checked = 'checked'";
                                                                                    } else {
                                                                                        echo "";
                                                                                    }
                                                                                    ?>>
            </td>
            <td>
                <label for="featured-group">Add To Slider </label>
                <input type="checkbox" name="add_to_slider" id="add_to_slider" <?php
                                                                                    if ($add_to_slider == 1) {
                                                                                        echo  "checked = 'checked'";
                                                                                    } else {
                                                                                        echo "";
                                                                                    }
                                                                                    ?>>
            </td>
        </tr>
    </table>
<?php
}
function checkbox_save_function($post_id)
{
    if (!isset($_POST['checkbox_meta_info_nonce'])) {
        return $post_id;
    }
    if (!wp_verify_nonce($_POST['checkbox_meta_info_nonce'], 'checkbox_save_function')) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    //check the user's permission
    if ('news' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    $set_to_homepage = (isset($_POST['set_to_homepage']) && $_POST['set_to_homepage'] == 'on') ? 1 : 0;
    update_post_meta($post_id, '_set_to_homepage', $set_to_homepage);

    $add_to_slider = (isset($_POST['add_to_slider']) && $_POST['add_to_slider'] == 'on') ? 1 : 0;
    update_post_meta($post_id, '_add_to_slider', $add_to_slider);
}
add_action('save_post_news', 'checkbox_save_function');


?>