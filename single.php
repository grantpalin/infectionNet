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
while ( have_posts() ) :
    the_post();
    inet_content_nav( 'nav-above' );
    get_template_part( 'partials/content', 'single' );
    inet_content_nav( 'nav-below' );

    // If comments are open or there is at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() )
        comments_template( '', true );
endwhile;
?>
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php
get_sidebar();
get_footer();
?>