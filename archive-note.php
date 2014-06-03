<?php
/**
 * The template for displaying the Notes archive. Overrides the generic archive.php.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();
?>
	<section id="primary" class="site-content">
		<div id="content" role="main">
<?php inet_breadcrumb(); ?>
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<div class="standardsub-left">
					<div class="header-icon">
						<img src="<?php bloginfo('template_url'); ?>/img/header-icon-notes.png" width="76" height="76" alt="" />
					</div>
				</div>
				<div class="standardsub-right" style="background:url(<?php bloginfo('template_url'); ?>/img/header-image-clinical-resources.jpg) top left no-repeat;">
					<h1 class="archive-title"><?php _e( 'Notes', 'inet' ); ?></h1>
				</div>
			</header><!-- .archive-header -->

			<div class="entry-content">
				<div class="entry-content-right">
<?php
	$description = get_post_type_object(get_post_type())->description;

	if ($description):
?>
					<p class="intro"><?php echo $description; ?></p>
<?php
	endif;

	while ( have_posts() ) : the_post();
?>
					<article id="post-<?php the_ID()?>" <?php post_class(); ?>>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php if(has_excerpt()): ?>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
<?php endif; ?>
					</article><!--#post-<?php the_ID(); ?>-->
<?php
	endwhile;

	inet_content_nav( 'nav-below' );
?>
				</div><!-- .entry-content-right -->

				<div class="entry-content-left">
					<h2>Note Types</h2>

					<ul class="categories links-list">
<?php
$categories = get_post_type_terms('note_type');
echo $categories;
?>
					</ul>
				</div><!-- .entry-content-left -->
<?php
else :
	get_template_part( 'content', 'none' );
endif; // have_posts
?>
			</div><!--.entry-content-->
		</div><!-- #content -->
	</section><!-- #primary .site-content -->
<?php get_footer(); ?>