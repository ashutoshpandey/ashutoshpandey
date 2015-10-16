<?php
/*
 * Header Section of Decent Theme.
 * 
 * @package Decent
 */

    $root = get_home_url() . '/';
?>
<!DOCTYPE html >
<!--[if IE 6]>
<html id="ie6" <?php language_attributes() ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes() ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes() ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes() ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="parent-wrapper" class="parent-wrapper grid-col-16">
        <div id="wrapper" class="wrapper grid-col-16">

        <?php if(!decent_get_option('disable_header')): ?>
            <div class="header-bg-section clearfix">
                <div id="header-section" class="header-section grid-col-16 clearfix">
                    <div id="logo-section" class="logo-section grid-col-16 grid-float-left clearfix"><?php decent_logo() ?></div>
                    <div id="my-image"><img src="<?php echo get_bloginfo('template_directory');?>/images/ashutosh-pandey.jpg" alt="Ashutosh Pandey"/></div>
                    <?php // get_sidebar('top') ?>
                </div><!-- header section ends -->
            </div><!-- header bg section ends -->
	<?php endif ?>

            <div id="nav-section" class="nav-section grid-col-15 clearfix">
                <div id="primarymenu-resp" class="primarymenu-resp"><i class="mdf mdf-bars"></i><span>Menu</span></div>
                <div id="primarymenu-section" class="primarymenu-section nav">
                    <?php// decent_nav() ?>
                    <ul class="sf-menu sf-js-enabled" id="decent_menu">
                        <li class="page_item"><a href="<?php echo $root;?>">About Me</a></li>
                        <li class="page_item"><a href="<?php echo $root;?>category/java">Java</a></li>
                        <li class="page_item"><a href="<?php echo $root;?>category/ruby">Ruby</a></li>
                        <li class="page_item"><a href="<?php echo $root;?>category/ruby-rails">Ruby on Rails</a></li>
                        <li class="page_item"><a href="<?php echo $root;?>category/ruby-rails/spree-commerce">Spree Commerce</a></li>
                        <li class="page_item"><a href="<?php echo $root;?>category/django">Django</a></li>
                        <li class="page_item"><a href="<?php echo $root;?>category/php">PHP</a></li>
                        <li class="page_item"><a href="<?php echo $root;?>category/php/magento">Magento</a></li>
                    </ul>
                </div>
            </div>
                        
            <div id="main-section" class="main-section grid-col-16 clearfix">