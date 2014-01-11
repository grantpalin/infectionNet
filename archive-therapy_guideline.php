<?php
/**
 * The template for displaying the Therapy Guidelines archive. Overrides the generic archive.php.
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
						<img src="<?php bloginfo('template_url'); ?>/img/header-icon-therapy-guidelines.png" width="77" height="78" alt="" />
					</div>
				</div>
				<div class="standardsub-right" style="background:url(<?php bloginfo('template_url'); ?>/img/header-image-clinical-resources.jpg) top left no-repeat;">
					<h1 class="archive-title"><?php _e( 'Therapy Guidelines', 'inet' ); ?></h1>
				</div>
			</header><!-- .archive-header -->

            <div class="entry-content">
<?php
if (!is_paged()):
	$description = get_post_type_object(get_post_type())->description;

	if ($description):
?>
<p class="intro"><?php echo $description; ?></p>
<?php
	endif;
?>
	            <!--h2>Find Therapy Guidelines</h2>

				<div class="taxonomies">
<?php
$taxonomies = array (
	'infection_types' => 'Infection Type',
	'micro_organisms' => 'Organism Type',
	'antibiotic_types' => 'Antibiotic Type'
);

foreach ($taxonomies as $tax => $title): ?>
                    <div class="taxonomy">
                        <div class="inner">
                            <h3 class="taxonomy-name"><?php echo $title; ?></h3>
                            <ul class="taxonomy-term-list">
<?php echo get_post_type_terms($tax); ?>
                            </ul>
                        </div>
                    </div>
<?php endforeach; ?>
                </div--> <!-- .taxonomies -->
			<?php
				while ( have_posts() ) : the_post();
            ?>
                <div id="post-<?php the_ID()?>" <?php post_class('entry-brief'); ?>>
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                </div><!--#post-<?php the_ID(); ?>-->
            <?php
				endwhile;
			else: // not on the archive main page, but a later page
				while ( have_posts() ) : the_post();
            ?>
                <div id="post-<?php the_ID()?>" <?php post_class('entry-brief'); ?>>
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                </div><!--#post-<?php the_ID(); ?>-->
            <?php
				endwhile;
			endif; // is_paged

			inet_content_nav( 'nav-below' );
         else :
			get_template_part( 'content', 'none' );
		endif; // have_posts
        ?>
            </div><!--.entry-content-->
		</div><!-- #content -->
	</section><!-- #primary .site-content -->
<?php get_footer(); ?>