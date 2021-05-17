<?php get_header();
the_post();
$post_content = apply_filters('the_content', get_the_content());
?>
<section class="banner">
    <div class="container">
        <div class="advertisement-wrapper">
            <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/insurance.gif" alt="" /></a>
        </div>
    </div>
</section>

<section class="single-news-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="single-news-inner">
                    <div class="section-title">
                        <h2><?php the_title(); ?></h2>
                        <div class="date-wrapper">
                            <span><?php echo get_the_date() ?> | <a href="#">Sauraha Reporter</a></span>
                        </div>
                    </div>

                    <div class="single-news">
                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>')"></fig>
                        <p><?php echo  $post_content; ?></p>
                        <?php $galleryArray = get_post_gallery_ids(get_the_id());
                        if ($galleryArray != null) {
                            foreach ($galleryArray as $id) {
                        ?>
                                <fig style="background-image: url('<?php echo wp_get_attachment_url($id) ?>')"></fig>
                        <?php  }
                        } ?>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php
                $args = array('post_type' => 'news', 'posts_per_page' => 6);
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                ?>
                    <div class="agriculture-news-list bottom-gap">
                        <div class="section-title">
                            <h2>मुख्य समाचार</h2>
                        </div>
                        <?php while ($the_query->have_posts()) {
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
                <div class="advertisement-wrapper bottom-gap">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-270.jpg" alt=""></a>
                </div>
                <div class="advertisement-wrapper">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/side-news-add-270.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>