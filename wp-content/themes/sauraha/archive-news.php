<?php get_header();
the_post();
?>
<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/insurance.gif" alt="" /></a>
        </div>
    </div>
</section>

<section class="news-listing-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="section-title">
                    <h2>समाचार</h2>
                </div>
                <div class="news-listing-inner">
                    <div class="row">
                        <?php
                        $post_per_page = 10;
                        $total_post = $GLOBALS['wp_query']->found_post;
                        while (have_posts()) {
                            the_post();
                        ?>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="news">
                                    <a href="<?php the_permalink(); ?>">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>');"></fig>
                                    </a>
                                    <div class="news-info">
                                        <span><?php samadhannews_convert_to_nepali_date(get_the_time('Y-m-d')); ?></span>
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 5, false); ?></a></h3>
                                        <p><?php echo wp_trim_words(get_the_content(), 25, false); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div id="append-news" data-offset="<?php echo $post_per_page ?>"   data-total="<?php echo $total_post; ?>">
                </div>
                <div class="button-holder">
                    <button type="button" class="btn btn-success">Load More</button>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php
                $terms = get_terms(array('taxonomy' => 'newscategory', 'meta_key' => '_show_to_tab', 'meta_value' => 1));
                ?>
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
               <?php innerpage('inner_sidebar_ads'); ?>
            </div>
        </div>
    </div>
</section>
</section>
<?php get_footer(); ?>