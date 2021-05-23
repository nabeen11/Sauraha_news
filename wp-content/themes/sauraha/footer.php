<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sauraha_online
 */

?>

<?php

$address = myprefix_get_theme_option('address');
$telephone = myprefix_get_theme_option('telephone');
$fax = myprefix_get_theme_option('fax');
$email = myprefix_get_theme_option('email');

$facebook = myprefix_get_theme_option('facebook');
$twitter = myprefix_get_theme_option('twitter');
$youtube = myprefix_get_theme_option('youtube');

// $office_time = myprefix_get_theme_option('office_time');
// $office_day = myprefix_get_theme_option('office_day');
// $regd_num = myprefix_get_theme_option('regd_num');
?>
<footer>
        <div class="footer-top">
            <div class="container">
                <h2>News Categories</h2>
                <ul>
                    <li><a href="#">News category</a></li>
                    <li><a href="#">Category Name Here</a></li>
                    <li><a href="#">Title Of News Category</a></li>
                    <li><a href="#">News category</a></li>
                    <li><a href="#">Category Name Here</a></li>
                    <li><a href="#">Title Of News Category</a></li>
                    <li><a href="#">News category</a></li>
                    <li><a href="#">Category Name Here</a></li>
                    <li><a href="#">Title Of News Category</a></li>
                    <li><a href="#">News category</a></li>
                    <li><a href="#">Category Name Here</a></li>
                    <li><a href="#">Title Of News Category</a></li>
                    <li><a href="#">News category</a></li>
                    <li><a href="#">Category Name Here</a></li>
                    <li><a href="#">Title Of News Category</a></li>
                    <li><a href="#">News category</a></li>
                    <li><a href="#">Category Name Here</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-inner">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-content">
                                <h2>Contact Address</h2>
                                <p><?php echo $address; ?></p>
                                <p>Phone: <?php echo $telephone; ?></p>
                                <p>Email: <?php echo $email; ?></p>
                                <p>Fax: <?php echo $fax; ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-content">
                                <h2>Get Connected</h2>
                                <ul class="social-link">
                                    <li><a href="<?php echo $facebook; ?>" target="_blank" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $twitter; ?>" target="_blank" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $youtube; ?>" target="_blank" class="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-content advertise">
                                <h2>Advertise with us</h2>
                                <p>You can advertise with us and can know all the details in below link:</p>
                                <span><a href="#">Advertise Detail Link</a></span>
                                <p>Phone: <?php echo $telephone; ?></p>
                                <p>Email: <?php echo $email; ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-content subscribe">
                                <h2>Subscribe Our Newsletter</h2>
                                <p>Get the latest news update on your email, we don’t spam.</p>
                                <form class="subscribe-form">
                                    <input type="email" name="email-address" id="email-address" placeholder="Email Address here">
                                    <input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-text">
                    <p>© Saurahaonline.com 2016 | All rights reserved  | Powered by: <a href="#" target="_blank">TANGOBANGO</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.min.js"></script>  
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/custom.js"></script> 
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/videoplay.js"></script> 

<?php wp_footer(); ?>

</body>
</html>
