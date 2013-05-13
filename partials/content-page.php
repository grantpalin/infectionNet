<?php
/**
 * The template part for displaying page content in page.php.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content">
<?php
the_content();
wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'inet' ), 'after' => '</div>' ) );
edit_post_link( __( 'Edit', 'inet' ), '<span class="edit-link">', '</span>' );
?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->