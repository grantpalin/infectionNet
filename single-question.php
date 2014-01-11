<?php
/**
 * The template for displaying single Question entries.
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
							<img src="<?php bloginfo('template_url'); ?>/img/header-icon-questions.png" width="76" height="76" alt="" />
						</div>
					</div>
					<div class="standardsub-right" style="background:url(<?php bloginfo('template_url'); ?>/img/header-image-clinical-resources.jpg) top left no-repeat;">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</div>
				</header>

				<div class="entry-content">
                    <div class="entry-content-right">
                        <?php the_content(); ?>
                    </div><!--.entry-content-right-->
                    <div class="entry-content-left">
                        <div class="taxonomies">
	                        <h2>Find Similar Content</h2>
							<?php inet_tax_terms_singular(); ?>
                        </div><!-- .taxonomies -->
                        <div class="related-content">
        	                <?php get_template_part('partials/related'); ?>
                        </div><!-- .related-content -->
                    </div><!--.entry-content-left-->
				</div><!-- .entry-content -->

				<footer class="entry-meta">
                    <?php edit_post_link( __( 'Edit', 'inet' ), '<p class="edit-link">', '</p>' ); ?>
				</footer><!-- .entry-meta -->
			<?php endwhile; // end of the loop. ?>
			</article><!-- #post -->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer();
?>