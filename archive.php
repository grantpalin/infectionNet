<?php
/**
 * The template for displaying archive pages if no specialized archive template is available.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();
?>
    <section id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
<?php inet_breadcrumb(); ?>
<?php
if ( have_posts() ) :
?>
                <header class="page-header">
                    <h1 class="page-title"><?php
    // could do specialized archive templates by category, tag, author, and date
    if ( is_category() ) {
        printf( __( 'Category Archives: %s', 'inet' ), '<span>' . single_cat_title( '', false ) . '</span>' );
    } elseif ( is_tag() ) {
        printf( __( 'Tag Archives: %s', 'inet' ), '<span>' . single_tag_title( '', false ) . '</span>' );
    } elseif ( is_author() ) {
        // queue the first post, to determine which author is involved
        the_post();
        printf( __( 'Author Archives: %s', 'inet' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
        // since the_post() was called above, must rewind the loop back to the beginning so it will run properly
        rewind_posts();
    } elseif ( is_day() ) {
        printf( __( 'Daily Archives: %s', 'inet' ), '<span>' . get_the_date() . '</span>' );
    } elseif ( is_month() ) {
        printf( __( 'Monthly Archives: %s', 'inet' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
    } elseif ( is_year() ) {
        printf( __( 'Yearly Archives: %s', 'inet' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
    } else {
        _e( 'Archives', 'inet' );
    }
?></h1>
<?php
    if ( is_category() ) {
        // show an optional category description
        $category_description = category_description();
        if ( ! empty( $category_description ) )
            echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
    } elseif ( is_tag() ) {
        // show an optional tag description
        $tag_description = tag_description();
        if ( ! empty( $tag_description ) )
            echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
    }
?>
                </header><!-- .page-header -->
<?php
    inet_content_nav( 'nav-above' );

    while ( have_posts() ) :
        the_post();
        get_template_part( 'content', get_post_format() );
    endwhile;

    inet_content_nav( 'nav-below' );
else :
    get_template_part( 'no-results', 'archive' );
endif;
?>
        </div><!-- #content .site-content -->
    </section><!-- #primary .content-area -->
<?php
get_sidebar();
get_footer();
?>