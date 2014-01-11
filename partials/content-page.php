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
		<div class="standardsub-left">
			<div class="header-icon">
				<img src="<?php bloginfo('template_url'); ?>/img/header-icon-about.png" width="78" height="79" alt="" />
			</div>
		</div>
		<div class="standardsub-right" style="background:url(<?php header_image(); ?>) top left no-repeat;">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
<?php
the_content();
edit_post_link( __( 'Edit', 'inet' ), '<span class="edit-link">', '</span>' );
?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->