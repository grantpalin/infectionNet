<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * inet_comment() which is located in the functions/template-tags.php file.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */

 // if the current post is protected by a password and the visitor has not yet entered the password, return early without loading the comments
if ( post_password_required() )
    return;
?>
<div id="comments" class="comments-area">
<?php
if ( have_comments() ) :
?>
    <h2 class="comments-title"><?php
    printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'inet' ),
        number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
?></h2>
<?php
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation
?>
    <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
        <h1 class="assistive-text"><?php _e( 'Comment navigation', 'inet' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'inet' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'inet' ) ); ?></div>
    </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
<?php
    endif; // check for comment navigation
?>
    <ol class="commentlist">
<?php
    // loop through and list the comments; use the inet_comment() function to format the comments
    wp_list_comments( array( 'callback' => 'inet_comment' ) );
?>
    </ol><!-- .commentlist -->
<?php
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation
?>
    <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
        <h1 class="assistive-text"><?php _e( 'Comment navigation', 'inet' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'inet' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'inet' ) ); ?></div>
    </nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
<?php
    endif; // check for comment navigation
endif; // have_comments()

// if comments are closed and there are comments, show a message
if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
    <p class="nocomments"><?php _e( 'Comments are closed.', 'inet' ); ?></p>
<?php
endif;

// display the comment form
comment_form();
?>
</div><!-- #comments .comments-area -->