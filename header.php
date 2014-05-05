<?php
/**
 * The common page header content for the theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
?><!doctype html>
<!--[if IE 8]>
<html class="lt-ie9 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="viewport" content="width=device-width" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="assistive-text skip-link"><a href="#content"><?php _e( 'Skip to content', 'inet' ); ?></a></div>
        <div id="page" class="hfeed site">
            <header id="masthead" class="site-header" role="banner">
                <div class="upper">
                    <div class="inner">
                        <nav role="navigation" class="site-navigation main-navigation top-bar">
                            <h1 class="assistive-text"><?php _e( 'Menu', 'inet' ); ?></h1>
                            <div class="assistive-text skip-link"><a href="#content"><?php _e( 'Skip to content', 'inet' ); ?></a></div>
                            <ul class="title-area">
                                <!-- Title Area -->
                                <li class="name"><h1><a href="<?php echo home_url( '/' ); ?>" rel="home">infection<b>Net</b></a></h1></li>
                                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                            </ul><!-- .title-area -->
                            <section class="menu-global-container top-bar-section">
                                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                            </section><!-- .menu-global-container .top-bar-section -->
                        </nav><!-- .site-navigation .main-navigation .top-bar -->
                    </div><!-- .inner -->
                </div><!-- .upper -->

                <div class="lower">
                    <p class="tagline"><?php bloginfo( 'description' ); ?></p><!--
                    --><?php get_search_form(); ?>
                </div><!-- .lower -->
            </header><!-- #masthead .site-header -->

            <div id="main" class="site-main">
