<?php
/**
 * The template for displaying all single posts.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();
?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
<?php
inet_breadcrumb();

if (have_posts() ):
    inet_content_nav( 'nav-above' );

    while ( have_posts() ) :
        the_post();
        get_template_part( 'partials/content', 'blogsingle' );
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