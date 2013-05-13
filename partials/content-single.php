<?php
/**
 * The template part for displaying post content in single.php.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php inet_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'inet' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
<?php
/* translators: used between list items, there is a space after the comma */
$category_list = get_the_category_list( __( ', ', 'inet' ) );

/* translators: used between list items, there is a space after the comma */
$tag_list = get_the_tag_list( '', ', ' );

if ( ! inet_categorized_blog() ) {
    // this blog post only has 1 category so just need to worry about tags in the meta text
    if ( '' != $tag_list ) {
        $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'inet' );
    } else {
        $meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'inet' );
    }
} else {
    // but this blog post has loads of categories so should display them here
    if ( '' != $tag_list ) {
        $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'inet' );
    } else {
        $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'inet' );
    }
} // end check for categories on this blog

printf(
    $meta_text,
    $category_list,
    $tag_list,
    get_permalink(),
    the_title_attribute( 'echo=0' )
);

edit_post_link( __( 'Edit', 'inet' ), '<span class="edit-link">', '</span>' );
?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->