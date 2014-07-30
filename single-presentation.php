<?php
/**
 * The template for displaying single Note entries.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();

// post id
// field name
// single field
$start = get_post_meta($post->ID, 'start_date', true);
$end = get_post_meta($post->ID, 'end_date', true);
$location = get_post_meta($post->ID, 'location', true);
$notes = get_post_meta($post->ID, 'notes', true);
?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
<?php inet_breadcrumb(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<div class="standardsub-left">
						<div class="header-icon">
							<img src="<?php bloginfo('template_url'); ?>/img/header-icon-notes.png" width="76" height="76" alt="" />
						</div>
					</div>
					<div class="standardsub-right" style="background:url(<?php header_image(); ?>) top left no-repeat;">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</div>
				</header>

                <div class="entry-content">
                    <div class="entry-content-right">

<?php
if ($notes):
?>
						<h2>Presentation Notes</h2>
<?php
	echo $notes;
endif;

if (get_field('attachments')):
?>
                        <h2>Attachments</h2>

                        <ul>
<?php
	while(has_sub_field('attachments')):
		$name = get_sub_field('name');
		$attachment = get_sub_field('link');
		$attUrl = get_attachment_link($attachment->ID);
		$nameDisplayed = (strlen(trim($name)) > 0) ? $name: $attachment->post_title;
?>
							<li><a href="<?php echo $attUrl; ?>"><?php echo $nameDisplayed; ?></a></li>
<?php
	endwhile;
?>
						</ul>
<?php
endif;
?>
                    </div><!--.entry-content-right-->
                    <div class="entry-content-left">
<?php
$categories = wp_get_post_terms(get_the_ID(), 'presentation_type');

if($categories):
	$category = $categories[0];
?>
<p>Category: <a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></p>
<?php
endif;
?>
                    	<h2>About the Presentation</h2>
<?php
if ($start && $end && $start == $end):
?>
<p><strong>Date:</strong> <?php echo $start; ?></p>
<?php
else:
	if ($start):
?>
<p><strong>Start date:</strong> <?php echo $start; ?></p>
<?php
	endif;

	if ($end):
?>
<p><strong>End date:</strong> <?php echo $end; ?></p>
<?php
	endif;
endif;

if ($location):
?>
<p><strong>Location:</strong> <?php echo $location; ?></p>
<?php
endif;

$profile = pods('profile');
$params = array(
	'where' => 'post_author = ' . get_the_author_meta('ID')
);

$profile->find($params);

if($profile->getTotalRows() > 0):
	while($profile->fetch()):
?>
<p><strong>Presenter:</strong> <a href="<?php echo $profile->field('permalink') ?>"><?php echo $profile->field('name'); ?></a></p>
<?php
	endwhile;
endif;
?>
<h2>Presentation Types</h2>
<?php
$categories = get_categories(
	array (
		'type' => 'presentation',
		'taxonomy' => 'presentation_type',
		'hierarchical' => 0
	)
);
?>
<details>
<summary>Presentation Types</summary>
<ul class="links-list">
<?php
foreach ($categories as $cat):
?>
<li><a href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a></li>
<?php
endforeach;
?>
</ul>
</details>
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