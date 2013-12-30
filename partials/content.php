<?php
/**
 * The fallback template part for displaying content if no other suitable template is available.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'inet' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <p><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></p>

        <?php if ( 'post' == get_post_type() ) : // only display post date and author if this is a Post, not a Page. ?>
            <div class="entry-meta">
                <?php inet_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if ( is_search() ) : // only display excerpts on Search results pages ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">→</span>', 'inet' ) ); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'inet' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
    <?php endif; ?>

    <?php /* show the post's tags, categories, and a comment link. */ ?>
    <footer class="entry-meta">
        <?php if ( 'post' == get_post_type() ) : // hide category and tag text for Pages in Search results ?>
            <?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( __( ', ', 'inet' ) );
            if ( $categories_list && inet_categorized_blog() ) :
                ?>
                <span class="cat-links"><?php printf( __( 'Posted in %1$s', 'inet' ), $categories_list ); ?></span>
            <?php endif; // End of categories ?>

            <?php
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', __( ', ', 'inet' ) );
            if ( $tags_list ) :
                ?>
                <span class="sep"> | </span>
                <span class="tag-links"><?php printf( __( 'Tagged %1$s', 'inet' ), $tags_list ); ?></span>
            <?php endif; // End of $tags_list ?>
        <?php endif; // end of 'post' == get_post_type() ?>

        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            <span class="sep"> | </span>
            <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'inet' ), __( '1 Comment', 'inet' ), __( '% Comments', 'inet' ) ); ?></span>
        <?php endif; ?>

        <?php edit_post_link( __( 'Edit', 'inet' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
    <?php /* close up the article and end the loop. */ ?>
</article><!-- #post-<?php the_ID(); ?> -->
