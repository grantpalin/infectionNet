<?php
/**
 * The home template file.
 *
 * Despite the name, this template is for post archives that have been assigned to a static page via the WordPress settings. This is not for the site homepage.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();
?>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
<?php inet_breadcrumb(); ?>
<?php
if (have_posts() ):
    inet_content_nav( 'nav-above' );

    while ( have_posts() ) :
        the_post();
        get_template_part( 'partials/content', get_post_format() );
    endwhile;

    inet_content_nav( 'nav-below' );
else :
    get_template_part( 'partials/no-results', 'index' );
endif; // have_posts()
?>
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php
//get_sidebar();
get_footer();
?>