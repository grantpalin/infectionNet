<?php
/**
 * The template for displaying single Case entries.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();
?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
<?php inet_breadcrumb(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<div class="standardsub-left">
						<div class="header-icon">
							<img src="<?php bloginfo('template_url'); ?>/img/header-icon-cases.png" width="77" height="78" alt="" />
						</div>
					</div>
					<div class="standardsub-right" style="background:url(<?php bloginfo('template_url'); ?>/img/header-image-clinical-resources.jpg) top left no-repeat;">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</div>
				</header>

				<div class="entry-content">
                    <div class="entry-content-right">
                        <?php the_content(); ?>
                        <div class="taxonomies">
							<?php inet_tax_terms_singular(); ?>
                        </div>
                    </div><!--.entry-content-right-->
                    <div class="entry-content-left">
<?php
$categories = wp_get_post_terms(get_the_ID(), 'case_type');

if($categories):
	$category = $categories[0];
?>
<p>Category: <a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></p>
<?php
endif;
?>
<h2>Other Cases</h2>
<?php
$categories = get_categories(
	array (
		'type' => 'case',
		'taxonomy' => 'case_type',
		'hierarchical' => 0
	)
);
?>
<ul class="links-list">
<?php
foreach ($categories as $cat):
?>
<li><a href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a></li>
<?php
endforeach;
?>
</ul>

<?php inet_related_content('h2', 'Related Content'); ?>
                    </div><!--.entry-content-left-->
				</div><!-- .entry-content -->

				<footer class="entry-meta">
					<?php //inet_entry_meta(); ?>
                    <?php edit_post_link( __( 'Edit', 'inet' ), '<p class="edit-link">', '</p>' ); ?>
				</footer><!-- .entry-meta -->
			<?php endwhile; // end of the loop. ?>
			</article><!-- #post -->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer();
?>