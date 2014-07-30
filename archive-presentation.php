<?php
/**
 * The template for displaying the Events archive. Overrides the generic archive.php.
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
				<div class="standardsub-right" style="background:url(<?php header_image(); ?>) top left no-repeat;">
					<h1 class="archive-title"><?php _e( 'Presentations', 'inet' ); ?></h1>
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
	
	$todaysDate = date('Y-m-d');
?>
<h2>Upcoming Presentations</h2>
<?php
	$upcomingQuery = new WP_Query(
		array(
			'post_type' => 'presentation',
			'meta_key' => 'end_date',
			'meta_compare' => '>=',
			'meta_value' => $todaysDate,
			'orderby' => 'start_date',
			'order' => 'ASC'
		)
	);

	while ($upcomingQuery->have_posts()) : $upcomingQuery->the_post();
		$startDate = get_post_meta($post->ID, 'start_date', true);
		$endDate = get_post_meta($post->ID, 'end_date', true);
		$dateSpan = $startDate . ' - ' . $endDate;
		
		if ($startDate == $endDate):
			$dateSpan = $endDate;
		endif;
?>
					<article id="post-<?php the_ID()?>" <?php post_class(); ?>>
<?php if (has_post_thumbnail()):
the_post_thumbnail();
endif; ?>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?> (<?php echo $dateSpan; ?>)</a></h2>
						<div class="excerpt"><?php the_excerpt(); ?></div>
					</article><!--#post-<?php the_ID(); ?>-->
<?php
	endwhile;
	
	wp_reset_postdata();
?>
<h2>Past Presentations</h2>
<?php
	$pastQuery = new WP_Query(
		array(
			'post_type' => 'presentation',
			'meta_key' => 'end_date',
			'meta_compare' => '<',
			'meta_value' => $todaysDate,
			'orderby' => 'start_date',
			'order' => 'DESC'
		)
	);

	while ($pastQuery->have_posts()) : $pastQuery->the_post();
		$startDate = get_post_meta($post->ID, 'start_date', true);
		$endDate = get_post_meta($post->ID, 'end_date', true);
		$dateSpan = $startDate . ' - ' . $endDate;
		
		if ($startDate == $endDate):
			$dateSpan = $endDate;
		endif;
?>
					<article id="post-<?php the_ID()?>" <?php post_class('entry-brief'); ?>>
<?php if (has_post_thumbnail()):
the_post_thumbnail();
endif; ?>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?> (<?php echo $dateSpan; ?>)</a></h2>
						<div class="excerpt"><?php the_excerpt(); ?></div>
					</article><!--#post-<?php the_ID(); ?>-->
<?php
	endwhile;

	wp_reset_postdata();

	inet_content_nav( 'nav-below' );
?>

<?php
else :
	get_template_part( 'content', 'none' );
endif; // have_posts
?>
				</div><!-- .entry-content-right -->
                
                <div class="entry-content-left">
                	<h2>Presentation Types</h2>
<ul class="categories links-list">
<?php
$categories = get_post_type_terms('presentation_type');
echo $categories;
?>
</ul>
				</div><!-- .entry-content-left -->
			</div><!--.entry-content-->
		</div><!-- #content -->
	</section><!-- #primary .site-content -->
<?php get_footer(); ?>