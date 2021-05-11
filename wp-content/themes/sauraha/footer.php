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
                                <p>Teku, Kathmandu Nepal 44601</p>
                                <p>Phone: 01-400000</p>
                                <p>Email: info@saurahaonline.com</p>
                                <p>Fax: 01-000000</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-content">
                                <h2>Get Connected</h2>
                                <ul class="social-link">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-content advertise">
                                <h2>Advertise with us</h2>
                                <p>You can advertise with us and can know all the details in below link:</p>
                                <span><a href="#">Advertise Detail Link</a></span>
                                <p>Phone: +977-01-000000</p>
                                <p>Email: info@saurahaonline.com</p>
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

<?php wp_footer(); ?>

</body>
</html>
