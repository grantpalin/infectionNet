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
                    	<h2>Question</h2>
                        <?php //the_content(); ?>
                        <?php echo get_post_meta($post->ID, 'question', true); ?>
                        <h2>Answer</h2>
                        <?php echo get_post_meta($post->ID, 'answer', true); ?>
                        <div class="taxonomies">
							<?php inet_tax_terms_singular(); ?>
                        </div>
                    </div><!--.entry-content-right-->
                    <div class="entry-content-left">
<?php
$showResponder = get_post_meta($post->ID, 'show_responder', true);

if ($showResponder):
	$profile = pods('profile');
	$params = array(
		'where' => 'post_author = ' . get_the_author_meta('ID')
	);
	
	$profile->find($params);

	if($profile->getTotalRows() > 0):
		while($profile->fetch()):
?>
                    	<p>Answered by <a href="<?php echo $profile->field('permalink'); ?>"><?php echo $profile->field('name'); ?></a>.</p>
<?php
		endwhile;
	endif;
endif;

$categories = wp_get_post_terms(get_the_ID(), 'question_type');

if($categories):
	$category = $categories[0];
?>
<p>Category: <a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></p>
<?php
endif;
?>
<h2>Other Questions</h2>
<?php
$categories = get_categories(
	array (
		'type' => 'question',
		'taxonomy' => 'question_type',
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
                    <?php edit_post_link( __( 'Edit', 'inet' ), '<p class="edit-link">', '</p>' ); ?>
				</footer><!-- .entry-meta -->
			<?php endwhile; // end of the loop. ?>
			</article><!-- #post -->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer();
?>