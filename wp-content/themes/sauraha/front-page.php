<?php
get_header(); ?>

<section class="trending">
    <div class="container">
        <ul>
            <li>Trending Now</li>
            <li><a href="#">#नेपाली चलचित्र</a></li>
            <li><a href="#">#सरकार</a></li>
            <li><a href="#">#बलिउड</a></li>
            <li><a href="#">#संविधान संशोधन</a></li>
            <li><a href="#">#अपराध</a></li>
        </ul>
    </div>
</section>

<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/insurance.gif" alt="" /></a>
        </div>
    </div>
</section>
<section class="top-news-wrapper">
    <div class="container">
        <?php
        $args = array(
            'post_type' => 'news', 'posts_per_page' => 3,
            'meta_query' => array(
                array(
                    'key'     => '_set_to_homepage',
                    'value'   => '1',
                    'compare' => '='
                )
            )
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
        ?>
            <?php
            while ($the_query->have_posts()) {
                $the_query->the_post();
            ?>
                <div class="headline-news">
                    <h1><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
                </div>
        <?php }
        } ?>
        <div class="tow-news-inner">
            <div class="row">
                <?php
                $terms = get_terms(array('taxonomy' => 'newscategory'));
                ?>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <!-- news-category start -->
                    <?php
                    $args = array(
                        'post_type' => 'news', 'posts_per_page' => 5,
                        'meta_query' => array(
                            array(
                                'key'   => '_add_to_slider',
                                'value' => '1',
                                'compare' => '='
                            )
                        )

                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                    ?>
                        <div class="news-catagory">
                            <ul id="news-category-slider" class="news-category-slider">
                                <?php
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                ?>
                                    <li>
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>')"><?php get_single_news_post_term(); ?>
                                        </fig>
                                        <figcaption>
                                            <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                                            <div class="date-wrapper">
                                                <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                            </div>
                                            <p class="info"><?php echo wp_trim_words(get_the_content(), 35, false) ?>...</p>
                                        </figcaption>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div><!-- news-category close -->
                    <?php }
                    ?>
                </div>

                <?php
                $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_show_to_tab', 'meta_value' => 1));
                ?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="news-category-tab">
                        <div class="tab-box">
                            <ul class="nav-tabs">
                                <?php
                                $counter = 0;
                                foreach ($terms as $term) {
                                ?>
                                    <li class="<?php echo ($counter++ == 0) ? 'active' : '' ?>"><a data-toggle="tab" href="#<?php echo $term->slug ?>"><?php echo $term->name ?></a></li>
                                <?php } ?>
                            </ul>

                            <div class="tab-content scroll">
                                <?php
                                $counter = 0;
                                foreach ($terms as $term) {
                                ?>
                                    <?php
                                    $args = array(
                                        'post_type' => 'news', 'posts_per_page' => 5,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'newscategory',
                                                'field' => 'slug',
                                                'terms' => $term->slug
                                            )
                                        )
                                    );
                                    $the_query = new WP_Query($args);
                                    ?>
                                    <div id="<?php echo $term->slug ?>" class="tab-pane fade <?php echo ($counter++ == 0) ? 'active in' : '' ?>  ">
                                        <div class="top-news-inner">
                                            <?php while ($the_query->have_posts()) {
                                                $the_query->the_post();  ?>
                                                <div class="top-news-list">
                                                    <a href="#">
                                                        <fig class="top-news-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>')"></fig>
                                                    </a>
                                                    <div class="top-news-info">
                                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>

                        </div><!-- tab-box close -->
                    </div><!-- news-categort-tab close -->
                </div>
                <?php adssidebytabs('ads_sideby_tabs') ?>
            </div>
        </div>
    </div>
</section>
<?php
showadsaftertabs('ads_below_tabs');
?>


<?php
$terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_first_news_template', 'meta_value' => 1));
?>
<section class="chitwan-news-wrapper">
    <div class="container">
        <?php

        foreach ($terms as $term) {
        ?>
            <div class="section-title">
                <h2><?php echo $term->name ?></h2>
                <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
            </div>
            <div class="chitwan-news-inner">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="chitwan-news-catagory">
                            <ul id="chitwan-news-slider" class="chitwan-news-slider">
                                <?php $args = array(
                                    'post_type' => 'news', 'posts_per_page' => 12,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'newscategory',
                                            'field' => 'slug',
                                            'terms' => $term->slug
                                        )
                                    )
                                );
                                $the_query = new WP_Query($args);
                                $counter = 0;
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    // if($counter <2){


                                ?>
                                    <li>
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                        <div class="title">
                                            <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                            <div class="date-wrapper">
                                                <span><?php echo get_the_date() ?> | <a href="#">Sauraha Reporter</a></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                    if ($counter == 3) {
                                        break;
                                    }
                                    $counter++;
                                }
                                wp_reset_postdata();
                                ?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="chitwan-news-list">
                            <ul>
                                <?php
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php adssidebyfirsttemplate('ads_sideby_first_template') ?>
                </div>
            </div>
    </div>
<?php } ?>
</div>
</section>

<?php showadsbelowfirsttemplate('ads_below_first_template') ?>
<?php
$terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_second_news_template', 'meta_value' => 1));
?>
<section class="different-news-category">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php
                foreach ($terms as $term) {
                ?>
                    <div class="tourism-news-list">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>

                        <?php $args = array(
                            'post_type' => 'news', 'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'newscategory',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                )
                            )
                        );
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                        ?>

                            <div class="tourism-news clearfix">
                                <a href="<?php the_permalink(); ?>" class="tourism-news-image">
                                    <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                </a>
                                <div class="tourism-news-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    <div class="date-wrapper">
                                        <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_third_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="agriculture-news-list">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <?php $args = array(
                            'post_type' => 'news', 'posts_per_page' => 6,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'newscategory',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                )
                            )
                        );
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                        ?>
                            <div class="agriculture-news clearfix">
                                <a href="<?php the_permalink(); ?>" class="agriculture-news-image">
                                    <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                </a>
                                <div class="agriculture-news-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    <div class="date-wrapper">
                                        <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php adssidebythirdtemplate('ads_sideby_third_template') ?>
        </div>
    </div>
</section>

<?php adsbelowthirdtemplate('ads_below_third_template') ?>

<section class="different-news-category">
    <div class="container">
        <div class="row">
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_fourth_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="education-news-wrapper">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <div class="education-news-list">
                            <?php $args = array(
                                'post_type' => 'news', 'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'newscategory',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            );
                            $the_query = new WP_Query($args);
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                            ?>
                                <div class="education-news clearfix">
                                    <a href="<?php the_permalink(); ?>" class="education-news-image">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                    </a>
                                    <div class="education-news-info">
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                        <div class="date-wrapper">
                                            <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_fifth_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="agriculture-news-list">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <?php $args = array(
                            'post_type' => 'news', 'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'newscategory',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                )
                            )
                        );
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                        ?>
                            <div class="agriculture-news clearfix">
                                <a href="#" class="agriculture-news-image">
                                    <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                </a>
                                <div class="agriculture-news-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    <div class="date-wrapper">
                                        <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_sixth_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="agriculture-news-list">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <?php $args = array(
                            'post_type' => 'news', 'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'newscategory',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                )
                            )
                        );
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                        ?>
                            <div class="agriculture-news clearfix">
                                <a href="<?php the_permalink(); ?>" class="agriculture-news-image">
                                    <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                </a>
                                <div class="agriculture-news-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    <div class="date-wrapper">
                                        <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php adsabovevideo('ads_above_video') ?>

<?php
// function getVideo()
// {
$args = array('post_type' => 'video', 'posts_per_page' => 4);
$video = new WP_Query($args);
if ($video->have_posts()) {
?>
    <section class="photo-feature-section">
        <div class="container">
            <div class="section-title">
                <h2>भिडियो</h2>
                <a href="#" class="see-all">सबै हेर्नुहोस</a>
            </div>
            <div class="photo-feature-inner">
                <div class="row">
                    <?php
                    $i = 0;
                    while ($video->have_posts()) {
                        $video->the_post();
                        if ($i < 1) { ?>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="video-section">
                                    <div class="video-frame">
                                        <iframe id="bussinessplus-video" height="100%" width="100%" src="https://www.youtube.com/embed/<?php echo get_post_meta(get_the_id(), '_videourl', true); ?>" allow=""></iframe>
                                    </div>
                                    <h3><a href="#"><?php echo get_the_title(); ?></a></h3>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                            <?php
                        } else { ?>
                                <div class="video-list-wrapper">
                                    <div class="video-list-single">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4 nopad-rt">
                                                <div class="video-list-img-wrap">
                                                    <fig class="video-list-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');">
                                                        <a href="#" class="video-list" data-id="<?php echo get_post_meta(get_the_id(), '_videourl', true); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                                        <div id="playing"></div>
                                                        <div class="shadow"></div>
                                                    </fig>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 col-md-8">
                                                <div class="video-list-content">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                        }
                        $i++;
                    }
                    wp_reset_postdata(); //end of while 
                            ?>

                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
// }
?>

<?php adsbelowvideo('ads_below_video') ?>

<section class="different-news-category">
    <div class="container">
        <div class="row">
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_seventh_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="education-news-wrapper">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term); ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <div class="education-news-list">
                            <?php $args = array(
                                'post_type' => 'news', 'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'newscategory',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            );
                            $the_query = new WP_Query($args);
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                            ?>
                                <div class="education-news clearfix">
                                    <a href="<?php the_permalink(); ?>" class="education-news-image">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                    </a>
                                    <div class="education-news-info">
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                        <div class="date-wrapper">
                                            <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_eighth_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="agriculture-news-list">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <?php $args = array(
                            'post_type' => 'news', 'posts_per_page' => 3,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'newscategory',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                )
                            )
                        );
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                        ?>
                            <div class="agriculture-news clearfix">
                                <a href="<?php the_permalink(); ?>" class="agriculture-news-image">
                                    <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                </a>
                                <div class="agriculture-news-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    <div class="date-wrapper">
                                        <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_nineth_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="agriculture-news-list">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <?php $args = array(
                            'post_type' => 'news', 'posts_per_page' => 3,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'newscategory',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                )
                            )
                        );
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                        ?>
                            <div class="agriculture-news clearfix">
                                <a href="<?php the_permalink(); ?>" class="agriculture-news-image">
                                    <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                </a>
                                <div class="agriculture-news-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    <div class="date-wrapper">
                                        <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php adsbelowseventhtempalte('ads_below_seventh-_template'); ?>

<section class="different-news-category">
    <div class="container">
        <div class="row">
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_tenth_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="education-news-wrapper">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <div class="education-news-list">
                            <?php $args = array(
                                'post_type' => 'news', 'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'newscategory',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            );
                            $the_query = new WP_Query($args);
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                            ?>
                                <div class="education-news clearfix">
                                    <a href="<?php the_permalink(); ?>" class="education-news-image">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                    </a>
                                    <div class="education-news-info">
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                        <div class="date-wrapper">
                                            <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
            $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_eleventh_news_template', 'meta_value' => 1));
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php foreach ($terms as $term) {
                ?>
                    <div class="education-news-wrapper">
                        <div class="section-title">
                            <h2><?php echo $term->name ?></h2>
                            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
                        </div>
                        <div class="education-news-list">
                            <?php $args = array(
                                'post_type' => 'news', 'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'newscategory',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            );
                            $the_query = new WP_Query($args);
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                            ?>
                                <div class="education-news clearfix">
                                    <a href="<?php the_permalink(); ?>" class="education-news-image">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                    </a>
                                    <div class="education-news-info">
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                        <div class="date-wrapper">
                                            <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php adssidebyeleventhtemplate('ads_sideby_eleventh_template'); ?>
        </div>
    </div>
</section>

<?php adsabovegallery('ads_above_gallery') ?>
<?php
$args = array('post_type' => 'gallery', 'posts_per_page' => 8);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
?>
    <section class="photo-gallery">
        <div class="container">
            <div class="section-title">
                <h2>फोटो-फिचर</h2>
                <a href="<?php the_permalink(); ?>" class="see-all">सबै हेर्नुहोस</a>
            </div>
            <div class="model-gallery-wrapper">
                <ul id="model-gallery-carousel" class="model-gallery-carousel">
                    <?php while ($the_query->have_posts()) {
                        $the_query->the_post();
                    ?>
                        <li>
                            <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                            <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
<?php } ?>
<?php $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_twelveth_news_template', 'meta_value' => 1)); ?>
<section class="entertainment-wrapper">
    <?php foreach ($terms as $term) {
    ?>
        <div class="container">
            <div class="section-title">
                <h2><?php echo $term->name ?></h2>
                <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="entertainmnet-news">

                        <ul id="entertainmnet-news-slider" class="entertainmnet-news-slider">
                            <?php $args = array(
                                'post_type' => 'news',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'newscategory',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            );
                            $the_query = new WP_Query($args);
                            $counter = 0;
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                            ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                    </a>
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                </li>
                            <?php
                                if ($counter == 5) {
                                    break;
                                }
                                $counter++;
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="entertainment-news-list-wrapper">
                        <div class="row">
                            <?php while ($the_query->have_posts()) {
                                $the_query->the_post();
                            ?>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="entertainmenet-news-list">
                                        <a href="<?php the_permalink(); ?>">
                                            <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                        </a>
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>



<?php get_footer(); ?>