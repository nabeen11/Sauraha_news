<?php

/**
 * Sauraha_online functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sauraha_online
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('sauraha_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sauraha_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sauraha_online, use a find and replace
		 * to change 'sauraha' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('sauraha', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'sauraha'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sauraha_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'sauraha_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sauraha_content_width()
{
	$GLOBALS['content_width'] = apply_filters('sauraha_content_width', 640);
}
add_action('after_setup_theme', 'sauraha_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sauraha_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'sauraha'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'sauraha'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'sauraha_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function sauraha_scripts()
{
	wp_enqueue_style('sauraha-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('sauraha-style', 'rtl', 'replace');

	wp_enqueue_script('sauraha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	wp_enqueue_script('loadmore-sauraha', get_template_directory_uri() . '/js/loadmore.js', array(), _S_VERSION, true);
	wp_localize_script('loadmore-sauraha', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'sauraha_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

//news added
require get_template_directory() . '/inc/news.php';

//gallery added
require get_template_directory() . '/inc/gallery.php';

//nepali calender
require get_template_directory() . '/inc/nep_calender.php';

// include_once('nep_calendar.php');

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function add_featured_galleries_to_ctp($post_types)
{
	array_push($post_types, 'gallery'); // ($post_types comes in as array('post','page'). If you don't want FGs on those, you can just return a custom array instead of adding to it. )
	//$post_types = 'multiple-images';
	return $post_types;
}
add_filter('fg_post_types', 'add_featured_galleries_to_ctp');

function get_single_news_post_term()
{
	$terms =  get_the_terms(get_the_id(), 'newscategory');
	if ($terms && !is_wp_error($terms)) :
		$last_element = end($terms);
		foreach ($terms as $term) {
			$term_link = get_term_link($term->term_id, 'newscategory');
			echo '<a href="' . $term_link . '" class="category" >' . $term->name . '</a>';
		}
	endif;
}

add_action('wp_ajax_get_additional_featured_product', 'get_additional_featured_product_callback');
add_action('wp_ajax_nopriv_get_additional_featured_product', 'get_additional_featured_product_callback');


function get_additional_featured_product_callback()
{

	global $post;
	$offset = intval(sanitize_post($_POST['offset'], 'crafts'));
	$title = (sanitize_post($_POST['title']));
	$taxonomy = (sanitize_post($_POST['type']));
	$tax_query = null;
	// $return_value = array();

		$tax_query = array('taxonomy' => $taxonomy, 'field' => 'name', 'terms' => $title );

		$post_per_page = 3;
		$return_value = array();

		$args = array(
			'post_type' => 'news',
			'offset' => $offset,
			'posts_per_page' => $post_per_page,
			'tax_query' => array($tax_query),
	);
	$the_query = new WP_Query($args);

		$count = 1;
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$return_value[$count]['title']  = get_the_title();
			$return_value[$count]['permalink'] = get_the_permalink();
			$return_value[$count]['image'] = get_the_post_thumbnail_url(get_the_ID());
			$return_value[$count]['content'] = wp_trim_words(get_the_content(), 55, false);
			$return_value[$count]['date'] = get_samadhannews_convert_to_nepali_date(get_the_time('Y-m-d'));
			$count++;
		}

		$return = array();
		$return['data'] = $return_value;
		$return['offset'] = $offset;
		// $return['catg-slug'] = $catg_slug;
		echo json_encode($return);
		wp_die();
	}
