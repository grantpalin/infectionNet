<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */

/**
 * Prints HTML with meta information for the current post-date/time.
 *
 * @since infectionNet 0.1
 */
function inet_posted_on() {
    printf(
        __('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline">', 'inet' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
}

/**
 * Returns true if a blog has more than 1 category
 *
 * @since infectionNet 0.1
 */
function inet_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
        // create an array of all the categories that are attached to posts
        $all_the_cool_cats = get_categories( array(
            'hide_empty' => 1,
        ) );

        // count the number of categories that are attached to the posts
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'all_the_cool_cats', $all_the_cool_cats );
    }

    if ( '1' != $all_the_cool_cats ) {
        // this blog has more than 1 category so inet_categorized_blog should return true
        return true;
    } else {
        // this blog has only 1 category so inet_categorized_blog should return false
        return false;
    }
}

/**
 * Flush out the transients used in inet_categorized_blog
 *
 * @since infectionNet 0.1
 */
function inet_category_transient_flusher() {
    delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'inet_category_transient_flusher' );
add_action( 'save_post', 'inet_category_transient_flusher' );

/**
 * Display breadcrumb to show user the current location in the site
 *
 * @since infectionNet 0.1
 */
function inet_breadcrumb($before = '<p class="breadcrumb">', $after = '</p>') {
    if ( function_exists( 'bcn_display' ) ) {
        echo $before . bcn_display(true) . $after;
    }
}

/**
 * Display navigation to next/previous pages when applicable
 *
 * @since infectionNet 0.1
 */
function inet_content_nav( $nav_id ) {
	// if the PageNavi plugin is activated, use that for paging
	if ( function_exists( 'wp_pagenavi' ) ) {
		wp_pagenavi();
		return;
	}

    global $wp_query, $post;

    // don't print empty markup on single pages if there's nowhere to navigate
    if ( is_single() ) {
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous )
            return;
    }

    // don't print empty markup in archives if there's only one page
    if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
        return;

    $nav_class = 'site-navigation paging-navigation';
    if ( is_single() )
        $nav_class = 'site-navigation post-navigation';
?>
    <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
        <h1 class="assistive-text"><?php _e( 'Post navigation', 'inet' ); ?></h1>
<?php
    if ( is_single() ) : // navigation links for single posts
        previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'inet' ) . '</span> %title' );
        next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'inet' ) . '</span>' );
    elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages
        if ( get_next_posts_link() ) :
?>
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'inet' ) ); ?></div>
<?php
        endif;

        if ( get_previous_posts_link() ) :
?>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'inet' ) ); ?></div>
<?php
        endif;
    endif;
?>
    </nav><!-- #<?php echo $nav_id; ?> -->
<?php
}

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since infectionNet 0.1
 */
function inet_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            ?>
            <li class="post pingback">
            <p><?php _e( 'Pingback:', 'inet' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'inet' ), ' ' ); ?></p>
<?php
            break;
        default :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <footer>
                        <div class="comment-author vcard">
                            <?php echo get_avatar( $comment, 40 ); ?>
                            <?php printf( __( '%s <span class="says">says:</span>', 'inet' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                        </div><!-- .comment-author .vcard -->
                        <?php if ( $comment->comment_approved == '0' ) : ?>
                            <em><?php _e( 'Your comment is awaiting moderation.', 'inet' ); ?></em>
                            <br />
                        <?php endif; ?>

                        <div class="comment-meta commentmetadata">
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                                    <?php
                                    /* translators: 1: date, 2: time */
                                    printf( __( '%1$s at %2$s', 'inet' ), get_comment_date(), get_comment_time() ); ?>
                                </time></a>
                            <?php edit_comment_link( __( '(Edit)', 'inet' ), ' ' );
                            ?>
                        </div><!-- .comment-meta .commentmetadata -->
                    </footer>

                    <div class="comment-content"><?php comment_text(); ?></div>

                    <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div><!-- .reply -->
                </article><!-- #comment-## -->
            <?php
            break;
    endswitch;
}
