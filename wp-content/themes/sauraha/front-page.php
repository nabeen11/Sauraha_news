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
                                    $the_query->the_post()
                                ?>
                                    <li>
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>')"><a href="#" class="category">News Category</a></fig>
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
                    <?php } ?>
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
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="advertisement-wrapper bottom-gap">
                        <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-270.jpg" alt="" /></a>
                    </div>
                    <div class="advertisement-wrapper bottom-gap">
                        <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-270.jpg" alt="" /></a>
                    </div>
                    <div class="advertisement-wrapper">
                        <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-270.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-add-1170.jpg" alt="" /></a>
        </div>
    </div>
</section>

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
                                    'post_type' => 'news', 'posts_per_page' => 7,
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
                                    <li>
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                        <div class="title">
                                            <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                            <div class="date-wrapper">
                                                <span><?php echo get_the_date(); ?> | <a href="#">Sauraha Reporter</a></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

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
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="advertisement-wrapper bottom-gap">
                            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-270.jpg" alt="" /></a>
                        </div>
                        <div class="advertisement-wrapper">
                            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-270.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-add-1170.jpg" alt="" /></a>
        </div>
    </div>
</section>
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
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="advertisement-wrapper bottom-gap">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-170.jpg" alt="" /></a>
                </div>
                <div class="advertisement-wrapper">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-170.jpg" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-add-1170.jpg" alt="" /></a>
        </div>
    </div>
</section>

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

<section class="avertisement-row">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="advertisement-wrapper bottom-gap">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-370.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="advertisement-wrapper bottom-gap">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-370.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="advertisement-wrapper">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-370.jpg" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="photo-feature-section">
    <div class="container">
        <div class="section-title">
            <h2>भिडियो</h2>
            <a href="<?php echo get_term_link($term) ?>" class="see-all">सबै हेर्नुहोस</a>
        </div>
        <div class="photo-feature-inner">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="video-section">
                        <div class="video-frame" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-670.jpg')">
                            <div class="youtube-icon"></div>
                            <div class="shadow"></div>
                        </div>
                        <h3><a href="#">सगरमाथा आधारशिविर र अन्नपूर्ण पदमार्ग ‘फ्रि वाइफाई जोन' !</a></h3>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="video-list-wrapper">
                        <div class="video-list-single">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 nopad-rt">
                                    <div class="video-list-img-wrap">
                                        <a href="#">
                                            <fig class="video-list-img" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-170.jpg');">
                                                <div class="shadow"></div>
                                            </fig>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="video-list-content">
                                        <h3><a href="#">शाली नदीबाट खाली खुट्टा हिँडेरै चाँगुनारायण पुगे माधवनारायणका ब्रतालु</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="video-list-single">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 nopad-rt">
                                    <div class="video-list-img-wrap">
                                        <a href="#">
                                            <fig class="video-list-img" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-170.jpg');">
                                                <div class="shadow"></div>
                                            </fig>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="video-list-content">
                                        <h3><a href="#">कोशी पहाडी रुटमा चल्ने यात्रुबाहक बस चलेनन्, यात्रुको विचल्ली</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="video-list-single">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 nopad-rt">
                                    <div class="video-list-img-wrap">
                                        <a href="#">
                                            <fig class="video-list-img" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-170.jpg');">
                                                <div class="shadow"></div>
                                            </fig>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="video-list-content">
                                        <h3><a href="#">संविधान संशोधन नभई चुनाव हुन्न: डा. भट्टराई</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-add-1170.jpg" alt="" /></a>
        </div>
    </div>
</section>

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

<section class="avertisement-row">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="advertisement-wrapper bottom-gap">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-370.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="advertisement-wrapper bottom-gap">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-370.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="advertisement-wrapper">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-370.jpg" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</section>

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

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="advertisement-wrapper">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/news-add-370.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-add-1170.jpg" alt="" /></a>
        </div>
    </div>
</section>

<section class="photo-gallery">
    <div class="container">
        <div class="section-title">
            <h2>फोटो-फिचर</h2>
            <a href="#" class="see-all">सबै हेर्नुहोस</a>
        </div>
        <div class="model-gallery-wrapper">
            <ul id="model-gallery-carousel" class="model-gallery-carousel">
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img1.jpg');"></fig>
                    <h3><a href="#">अनौठो सौन्दर्य प्रतियोगिताः जब गाईहरु र्‍यापमा उत्रिए…</a></h3>
                </li>
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img2.jpg');"></fig>
                    <h3><a href="#">सीटी सेन्टरमा हिरोइनहरुको क्याटवाक</a></h3>
                </li>
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img3.jpg');"></fig>
                    <h3><a href="#">दीपक-दीपासँग सम्बन्ध विग्रिएको चर्चामा ‘धुर्मुस’को यस्तो स्पष्टिकरण</a></h3>
                </li>
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img4.jpg');"></fig>
                    <h3><a href="#">हलिउड फिल्ममा प्रियंकाको यस्तो हट अवतार</a></h3>
                </li>
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img5.jpg');"></fig>
                    <h3><a href="#">‘बाहुबली २’ को प्रदर्शन मिति तोकियो</a></h3>
                </li>
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img6.jpg');"></fig>
                    <h3><a href="#">पाँचौ पटकमा लियोनार्दोलाई ओस्कर</a></h3>
                </li>
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img7.jpg');"></fig>
                    <h3><a href="#">रीस्ता र सुरविनाले जेठमा ‘लुकामारी’ खेल्ने, सौगातको लुक्स लुकाइयो</a></h3>
                </li>
                <li>
                    <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-feature-img8.jpg');"></fig>
                    <h3><a href="#">स्टार शैलीः अस्करको रेड कार्पेटमा खुलेका सुन्दरी</a></h3>
                </li>
            </ul>
        </div>
    </div>
</section>
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
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></fig>
                                    </a>
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                </li>
                            <?php } ?>
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