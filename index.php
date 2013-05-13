<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css). It is used to
 * display a page when nothing more specific matches a query. E.g., it puts
 * together the blog home page when no home.php file exists.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();
?>
                <div id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">
<?php
if ( have_posts() ):
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
get_sidebar();
get_footer();
?>