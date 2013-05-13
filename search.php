<?php
/**
 * The template for displaying search results pages.
 *
 * @package infectionNet
 * @since infectionNet 1.0
 */
get_header();
?>
    <section id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
<?php
if ( have_posts() ) :
?>
                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'inet' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->
<?php
    inet_content_nav( 'nav-above' );

    while ( have_posts() ) :
        the_post();
        get_template_part( 'content', 'search' );
    endwhile;

    inet_content_nav( 'nav-below' );
else :
    get_template_part( 'no-results', 'search' );
endif;
?>
        </div><!-- #content .site-content -->
    </section><!-- #primary .content-area -->
<?php
get_sidebar();
get_footer();
?>