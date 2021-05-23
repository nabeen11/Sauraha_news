<?php 
add_action('wp_ajax_get_additional_news', 'get_additional_news_callback');
add_action('wp_ajax_nopriv_get_additional_news', 'get_additional_news_callback');

function get_additional_news_callback()
{
	global $post;

	$offset = intval(sanitize_post($_POST['offset'], 'crafts'));
	$post_per_page = 3;
	$return_value = array();

	$args = array(
		'post_type' => 'news',
		'offset' => $offset,
		'posts_per_page' => $post_per_page,
	);
	$the_query = new WP_Query($args);

	$count = 1;
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$return_value[$count]['title']  = wp_trim_words(get_the_title(), 5, false);
		$return_value[$count]['permalink'] = get_the_permalink();
		$return_value[$count]['image'] = get_the_post_thumbnail_url(get_the_ID());
		$return_value[$count]['content'] = wp_trim_words(get_the_content(),25,false);
		$return_value[$count]['date'] = get_samadhannews_convert_to_nepali_date(get_the_time('Y-m-d'));
		$count++;
	}

	$return = array();
	$return['data'] = $return_value;
	$return['offset'] = $offset;
	echo json_encode($return);
	wp_die();
}



?>