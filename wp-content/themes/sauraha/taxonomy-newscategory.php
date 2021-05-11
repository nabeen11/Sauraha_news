<?php get_header();
$cat_title = single_cat_title('', false);

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
                    <h2><?php echo $cat_title ?></h2>
                </div>
                <div class="news-listing-inner">
                    <div class="row">
                        <?php while (have_posts()) {
                            the_post()
                        ?>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="news">
                                    <a href="<?php the_permalink(); ?>">
                                        <fig style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>');"></fig>
                                    </a>
                                    <div class="news-info">
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                        <p><?php echo wp_trim_words(get_the_content(), 55, false) ?>...</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="news-category-tab">
                    <div class="tab-box">
                        <ul class="nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#top-news">मुख्य खबर</a></li>
                            <li><a data-toggle="tab" href="#politics">राजनीित</a></li>
                            <li><a data-toggle="tab" href="#chitwan-serofero">चितवन-सरोफेरो</a></li>
                        </ul>
                        <div class="tab-content scroll">
                            <div id="top-news" class="tab-pane fade in active">
                                <div class="top-news-inner">
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">दुई भारतीयको हत्या गर्नेकाे अन्तर्राष्ट्रिय आतंकवादी संगठनसँग सम्बन्ध रहेको दाबी</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">अष्ट्रेलियाको संसदीय निर्वाचनमा नेपाली उम्मेदवार</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">मलेसियामा अश्लिल तस्बिर राख्नेलाई १२ महिना जेल</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">पाँचथरमा हट्यो यातायातमा सिन्डिकेट</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">हिमपात र हिमपहिरोमा परी अफगानिस्तानमा १ सय ५ जना भन्दा बढीको मृत्यु</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="politics" class="tab-pane fade">
                                <div class="top-news-inner">
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">अनुत्पादक आयातले पनि तरलतामा चाप</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">कतार एयरवेजको जहाजले पुरा गर्‍यो विश्वको सबैभन्दा लामो उडान</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">ट्रम्पलाई अदालतको तर्फबाट झट्का– भ्रमणमा रोक नलगाउन आदेश</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">ट्रम्पको दबाब ईयूलाई अस्वीकार्य : फ्रान्सेली राष्ट्रपति</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">ट्रम्पलाई अदालतको तर्फबाट झट्का– भ्रमणमा रोक नलगाउन आदेश</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="chitwan-serofero" class="tab-pane fade">
                                <div class="top-news-inner">
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">लन्डनको सेयर बजारमा प्रविधिले दियो प्रतिफल</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">विमान संग्रहालय: जहाँ जहाजबारे अध्ययन गर्न सकिन्छ</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#"> भूकम्पपीडितलाई ट्याक्सी: आवेदकको अन्तिम नामावली तयार</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">म्यानपावरका निर्देशकलाई ओमनको राजदूत सिफारिस</a></h3>
                                        </div>
                                    </div>
                                    <div class="top-news-list">
                                        <a href="#">
                                            <fig class="top-news-image" style="background-image: url('images/news-111.jpg')"></fig>
                                        </a>
                                        <div class="top-news-info">
                                            <h3><a href="#">कतार एयरवेजको जहाजले पुरा गर्‍यो विश्वको सबैभन्दा लामो उडान</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="advertisement-wrapper bottom-gap">
                    <a href="#"><img src="images/side-news-add-270.jpg" alt=""></a>
                </div>
                <div class="advertisement-wrapper">
                    <a href="#"><img src="images/side-news-add-270.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

</section>






<?php get_footer(); ?>