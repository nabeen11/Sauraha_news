<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sauraha_online
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>NewsPortal</title>
    <!--Stylesheet
     ================================================== -->
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/reset.css" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/jquery.bxslider.css" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/responsive.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-12 logo-wrapper">
                <a class="navbar-brand" href="index.html"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.png" alt="ADS" /></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 right-add-wrapper">
                <div class="advertisement-wrapper">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bajaj-final.gif" alt="ADS" />
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="#" class="active">गृहपृष्ठ</a></li> -->
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu' => 'main_menu',
                        'menu_class' => 'nav navbar-nav',
                        'container' => ''
                    ))
                    ?>
                    <!-- <li><a href="#">समाचार</a>
                        <ul class="sub-menu">
                            <li><a href="#">देश समाज</a></li>
                            <li><a href="#">राजनीति</a></li>
                            <li><a href="#">अपराध</a></li>
                        </ul>
                    </li>
                    <li><a href="#">मध्य-सेरोफेरो</a>
                        <ul class="sub-menu">
                            <li><a href="#">मध्य-सेरोफेरो</a></li>
                        </ul>
                    </li>
                    <li><a href="#">संरक्षण-पर्यटन</a></li>
                    <li><a href="#">विचार-विमर्श</a></li>
                    <li><a href="#">कला-शैली</a></li>
                    <li><a href="#">अर्थ-विजनेस</a>
                        <ul class="sub-menu">
                            <li><a href="#">कृषि-सहकारी</a></li>
                            <li><a href="#">अटो-कर्पोरेट</a></li>
                        </ul>
                    </li>
                    <li><a href="#">स्वास्थ्य</a></li>
                    <li><a href="#">शिक्षा</a></li>
                    <li><a href="#">विविध</a>
                        <ul class="sub-menu">
                            <li><a href="#">अन्तरवार्ता</a></li>
                            <li><a href="#">भिडियो</a></li>
                            <li><a href="#">फोटो-फिचर</a></li>
                            <li><a href="#">ब्लग</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>