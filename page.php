<?php
/**
 * The template for displaying all static pages.
 *
 * This is the template that displays all pages by default. Note that this is
 * the WordPress construct of static pages and that other views on a
 * WordPress site will use a different template. Also note that a page can be
 * assigned a named template, in which case this template is not used.
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
while ( have_posts() ) :
    the_post();
    get_template_part( 'partials/content', 'page' );
    comments_template( '', true );
endwhile;
?>
                </div><!-- #content .site-content -->
            </div><!-- #primary .content-area -->
<?php
//get_sidebar();
get_footer();
?>