<?php get_header();
the_post();
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
                        <p><?php echo  get_the_content(); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="agriculture-news-list bottom-gap">
                    <div class="section-title">
                        <h2>मुख्य समाचार</h2>
                    </div>
                    <div class="agriculture-news clearfix">
                        <a href="#" class="agriculture-news-image">
                            <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-img1-117.jpg');"></fig>
                        </a>
                        <div class="agriculture-news-info">
                            <h3><a href="#">विमान संग्रहालय: जहाँ जहाजबारे अध्ययन गर्न सकिन्छ</a></h3>
                            <div class="date-wrapper">
                                <span>31st Jan 2017 | <a href="#">Sauraha Reporter</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="agriculture-news clearfix">
                        <a href="#" class="agriculture-news-image">
                            <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-img2-117.jpg');"></fig>
                        </a>
                        <div class="agriculture-news-info">
                            <h3><a href="#">बेमौसममा फुल्यो गुराँस</a></h3>
                            <div class="date-wrapper">
                                <span>31st Jan 2017 | <a href="#">Sauraha Reporter</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="agriculture-news clearfix">
                        <a href="#" class="agriculture-news-image">
                            <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-img3-117.jpg');"></fig>
                        </a>
                        <div class="agriculture-news-info">
                            <h3><a href="#">७६ वर्षमा १२ कक्षा उत्तीर्ण !</a></h3>
                            <div class="date-wrapper">
                                <span>31st Jan 2017 | <a href="#">Sauraha Reporter</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="agriculture-news clearfix">
                        <a href="#" class="agriculture-news-image">
                            <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-img4-117.jpg');"></fig>
                        </a>
                        <div class="agriculture-news-info">
                            <h3><a href="#">ताप्लेजुङमा पाथिभरा मात्रै छ ?</a></h3>
                            <div class="date-wrapper">
                                <span>31st Jan 2017 | <a href="#">Sauraha Reporter</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="agriculture-news clearfix">
                        <a href="#" class="agriculture-news-image">
                            <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-img5-117.jpg');"></fig>
                        </a>
                        <div class="agriculture-news-info">
                            <h3><a href="#">महाराष्ट्रको गाउँमा तीनदेशीय संवाद</a></h3>
                            <div class="date-wrapper">
                                <span>31st Jan 2017 | <a href="#">Sauraha Reporter</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="agriculture-news clearfix">
                        <a href="#" class="agriculture-news-image">
                            <fig style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/news-img6-117.jpg');"></fig>
                        </a>
                        <div class="agriculture-news-info">
                            <h3><a href="#">कुखुराको भालेको पनि बन्ध्याकरण !</a></h3>
                            <div class="date-wrapper">
                                <span>31st Jan 2017 | <a href="#">Sauraha Reporter</a></span>
                            </div>
                        </div>
                    </div>
                </div>
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