<?php
/**
 * The front-page template file.
 *
 * This is used when the site has a static page selected as homepage via the WordPress settings.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();

$subtitle = '';
$introduction = '';

if (function_exists('get_field')):
	$subtitle = get_field('subtitle');
	$introduction = get_field('introduction');
endif;
?>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <header class="entry-header">
                <h1 class="entry-title"><?php echo ($subtitle ? $subtitle : get_bloginfo('name')); ?></h1>
<?php
if ($introduction):
?>
				<p><?php echo $introduction; ?></p>
<?php
endif;
?>
            </header><!-- .entry-header -->
<?php
//$intro = get_field('intro');
$intro = get_post_meta($post->ID, 'intro', true);
if ($intro):
    $hasFeaturedImage = has_post_thumbnail();
?>
            <div class="intro <?php if ($hasFeaturedImage) echo ' with-thumbnail'; ?>">
                <div class="intro-inner">
<?php
if ($hasFeaturedImage):
    echo get_the_post_thumbnail(get_the_ID(), array (150, 150));
endif;
?>
                    <?php echo $intro; ?>
                </div>
            </div>
<?php
endif;
?>
            <div class="entry-content">
<?php dynamic_sidebar( 'sidebar-homepage' ); ?>
            </div><!-- .entry-content -->
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php
//get_sidebar();
get_footer();
?>