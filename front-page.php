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
?>
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <header class="entry-header">
                <h1 class="entry-title"><?php echo get_field('subtitle'); ?></h1>
				<p><?php echo get_field('introduction'); ?></p>
            </header><!-- .entry-header -->
            
            <div class="entry-content">
<?php dynamic_sidebar( 'sidebar-homepage' ); ?>
            </div><!-- .entry-content -->
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php
//get_sidebar();
get_footer();
?>