<?php

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */

function prefix_advertisement()
{
    $labels = array(
        'name'               => __('advertisements', 'sauraha'),
        'singular_name'      => __('advertisement', 'sauraha'),
        'add_new'            => _x('Add advertisement', 'sauraha', 'sauraha'),
        'add_new_item'       => __('Add New advertisement', 'sauraha'),
        'edit_item'          => __('Edit advertisement', 'sauraha'),
        'new_item'           => __('New advertisement', 'sauraha'),
        'view_item'          => __('View advertisement', 'sauraha'),
        'search_items'       => __('Search advertisements', 'sauraha'),
        'not_found'          => __('No advertisements found', 'sauraha'),
        'not_found_in_trash' => __('No advertisements found in Trash', 'sauraha'),
        'parent_item_colon'  => __('Parent advertisement:', 'sauraha'),
        'menu_name'          => __('Advertisements', 'sauraha'),
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
        'menu_icon'           => 'dashicons-index-card',
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

    register_post_type('advertisement', $args);
}

add_action('init', 'prefix_advertisement');


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

function adscategory()
{
    $labels = array(
        'name'                  => _x('Ads_Categories', 'Categories', 'sauraha'),
        'singular_name'         => _x('Ads_Category', 'Ads_Category', 'sauraha'),
        'search_items'          => __('Search Ads_Categories', 'sauraha'),
        'popular_items'         => __('Popular Ads_Categories', 'sauraha'),
        'all_items'             => __('All Ads_Categories', 'sauraha'),
        'parent_item'           => __('Parent Ads_Category', 'sauraha'),
        'parent_item_colon'     => __('Parent Ads_Category', 'sauraha'),
        'edit_item'             => __('Edit Ads_Category', 'sauraha'),
        'update_item'           => __('Update Ads_Category', 'sauraha'),
        'add_new_item'          => __('Add New Ads_Category', 'sauraha'),
        'new_item_name'         => __('New Ads_Category Name', 'sauraha'),
        'add_or_remove_items'   => __('Add or remove Ads_Categories', 'sauraha'),
        'choose_from_most_used' => __('Choose from most used Ads_Categories', 'sauraha'),
        'menu_name'             => __('Ads_Categories', 'sauraha'),
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
    register_taxonomy('adscategory', array('advertisement'), $args);
}
add_action('init', 'adscategory');


add_action('add_meta_boxes', 'date_metabox_funct');
function date_metabox_funct()
{
    add_meta_box(
        'textbox_id',
        'Ads Contents',
        'textbox_callback_function',
        'advertisement',
        'advanced',
        'high'
    );
}

function textbox_callback_function($post)
{

    wp_nonce_field('textbox_meta_save_function', 'textbox_meta_info_nonce');
    $startdate = get_post_meta($post->ID, '_startdate', true);
    $enddate = get_post_meta($post->ID, '_enddate', true);
    $adsurl = get_post_meta($post->ID, '_adsurl', true);


?>
    <label for="pricedetail">URL</label>
    <input type="text" name="adsurl" placeholder="Url" id="adsurl" value="<?php echo $adsurl ?>">

    <label for="Date">Start Date</label>
    <input type="date" name="startdate" id="startdate" value="<?php echo $startdate ?>">

    <label for="Date">End Date</label>
    <input type="date" name="enddate" id="enddate" value="<?php echo $enddate ?>">

<?php
}

function textbox_meta_save_function($post_id)
{

    if (!isset($_POST['textbox_meta_info_nonce'])) {
        return $post_id;
    }
    if (!wp_verify_nonce($_POST['textbox_meta_info_nonce'], 'textbox_meta_save_function')) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // Check the user's permissions.
    if ('advertisement' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    $adsurl = esc_sql(sanitize_text_field($_POST['_adsurl']));
    $adsurl = $_POST['adsurl'];

    $startdate = esc_sql(sanitize_text_field($_POST['_startdate']));
    $startdate = $_POST['startdate'];

    $enddate = esc_sql(sanitize_text_field($_POST['_enddate']));
    $enddate = $_POST['enddate'];

    update_post_meta($post_id, '_adsurl', $adsurl);
    update_post_meta($post_id, '_startdate', $startdate);
    update_post_meta($post_id, '_enddate', $enddate);
}
add_action('save_post', 'textbox_meta_save_function');




function getAdvertisements($ads_id, $ppp = -1, $skip = 0)
{
    $current_date = date('Y-m-d');
    $ads = new WP_Query(
        array(
            'post_type' => 'advertisement',
            'posts_per_page' => $ppp,
            'offset' => $skip,
            'tax_query' => array(
                array(
                    'taxonomy' => 'adscategory',
                    'field' => 'slug',
                    'terms' => $ads_id
                )
            ),

            'meta_query' => array(
                array(
                    'key'       => '_enddate',
                    'value'     => $current_date,
                    'compare'   => '>=',
                )
            )
        )
    );
    return $ads;
}


function showadsaftertabs($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <section class="banner">
        <div class="container">
            <?php
            if ($ads->have_posts()) {
                while ($ads->have_posts()) {
                    $ads->the_post()

            ?>
                    <div class="advertisement-wrapper">
                        <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1170" height="145" alt="" /></a>
                    </div>
            <?php }
            } ?>
        </div>
    </section>
<?php
}

function adssidebytabs($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <?php
        if ($ads->have_posts()) {
            while ($ads->have_posts()) {
                $ads->the_post()
        ?>
                <div class="advertisement-wrapper bottom-gap">
                    <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" /></a>
                </div>
        <?php }
        } ?>
    </div>
<?php
}

function adssidebyfirsttemplate($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <?php
        if ($ads->have_posts()) {
            while ($ads->have_posts()) {
                $ads->the_post()
        ?>
                <div class="advertisement-wrapper bottom-gap">
                    <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" /></a>
                </div>
        <?php }
        } ?>
    </div>
<?php
}

function showadsbelowfirsttemplate($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <section class="banner">
        <div class="container">
            <?php
            if ($ads->have_posts()) {
                while ($ads->have_posts()) {
                    $ads->the_post()

            ?>
                    <div class="advertisement-wrapper">
                        <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1170" height="145" alt="" /></a>
                    </div>
            <?php }
            } ?>
        </div>
    </section>
<?php
}

function adssidebythirdtemplate($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <?php
        if ($ads->have_posts()) {
            while ($ads->have_posts()) {
                $ads->the_post()
        ?>
                <div class="advertisement-wrapper bottom-gap">
                    <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="170" height="330" alt="" /></a>
                </div>
        <?php }
        } ?>
    </div>
<?php
}

function adsbelowthirdtemplate($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <section class="banner">
        <div class="container">
            <?php
            if ($ads->have_posts()) {
                while ($ads->have_posts()) {
                    $ads->the_post()
            ?>
                    <div class="advertisement-wrapper">
                        <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1170" height="145" alt="" /></a>
                    </div>
            <?php }
            } ?>
        </div>
    </section>
<?php
}

function adsabovevideo($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <section class="avertisement-row">
        <div class="container">
            <div class="row">
                <?php
                if ($ads->have_posts()) {
                    while ($ads->have_posts()) {
                        $ads->the_post()

                ?><div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="advertisement-wrapper">
                                <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1170" height="145" alt="" /></a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
<?php
}

function adsbelowvideo($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <section class="banner">
        <div class="container">
            <?php
            if ($ads->have_posts()) {
                while ($ads->have_posts()) {
                    $ads->the_post()
            ?>
                    <div class="advertisement-wrapper">
                        <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1170" height="145" alt="" /></a>
                    </div>
            <?php }
            } ?>
        </div>
    </section>
<?php
}

function adsbelowseventhtempalte($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <section class="avertisement-row">
        <div class="container">
            <div class="row">
                <?php
                if ($ads->have_posts()) {
                    while ($ads->have_posts()) {
                        $ads->the_post()

                ?><div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="advertisement-wrapper">
                                <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1170" height="145" alt="" /></a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
<?php
}

//eleventh
function adssidebyeleventhtemplate($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <?php
        if ($ads->have_posts()) {
            while ($ads->have_posts()) {
                $ads->the_post()
        ?>
                <div class="advertisement-wrapper">
                    <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="170" height="330" alt="" /></a>
                </div>
        <?php }
        } ?>
    </div>
<?php
}

//gallery
function adsabovegallery($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <section class="banner">
        <div class="container">
            <?php
            if ($ads->have_posts()) {
                while ($ads->have_posts()) {
                    $ads->the_post()
            ?>
                    <div class="advertisement-wrapper">
                        <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="1170" height="145" alt="" /></a>
                    </div>
            <?php }
            } ?>
        </div>
    </section>
<?php
}
//inner page

function innerpage($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <?php
    if ($ads->have_posts()) {
        while ($ads->have_posts()) {
            $ads->the_post()
    ?>
            <div class="advertisement-wrapper bottom-gap">
                <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="170" height="330" alt="" /></a>
            </div>
    <?php }
    } ?>
<?php
}

function singlepage($position, $ppp = -1, $skip = 0)
{
    $ads = getAdvertisements($position, $ppp, $skip);
?>
    <?php
    if ($ads->have_posts()) {
        while ($ads->have_posts()) {
            $ads->the_post()
    ?>
            <div class="advertisement-wrapper bottom-gap">
                <a href="<?php echo get_post_meta(get_the_ID(), '_adsurl', true) ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url(); ?>" width="170" height="330" alt="" /></a>
            </div>
    <?php }
    } ?>
<?php
}

?>