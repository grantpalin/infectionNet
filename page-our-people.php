<?php
/**
 * The template for displaying the People page.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();
?>
            <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">
<?php inet_breadcrumb(); ?>
<?php
while ( have_posts() ) :
    the_post();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('our-people'); ?>>
    <header class="entry-header">
    	<div class="standardsub-left">
        	<div class="header-icon">
	        	<img src="<?php bloginfo('template_url'); ?>/img/header-icon-about.png" width="78" height="79" alt="" />
            </div>
        </div>
        <div class="standardsub-right" style="background:url(<?php bloginfo('template_url'); ?>/img/header-image-about.jpg) top left no-repeat;">
        	<h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="entry-content-right">
        	<p class="intro"><?php echo get_field('introduction'); ?></p>
<?php if (get_field('people')): ?>
<ul class="people">
<?php
	while(has_sub_field('people')):
		$postObject = get_sub_field('page');
		$authorID = get_the_author_meta('ID', $postObject->post_author);
		$authorName = get_the_author_meta('user_nicename', $postObject->ID);
?>
<li class="person"><?php
echo get_avatar($authorID, 200, '', $postObject->post_title);
?><a href="<?php echo get_permalink($postObject->ID); ?>"><?php echo $postObject->post_title; ?></a></li>
<?php endwhile; ?>
</ul>
<?php endif; ?>
        </div>
        <div class="entry-content-left">
            <p class="browse">In this section:</p>
            <?php wp_nav_menu( array( 'theme_location' => 'about', 'menu_class' => 'links-list' ) ); ?>
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php
endwhile;
?>
                </div><!-- #content .site-content -->
            </div><!-- #primary .content-area -->
<?php
//get_sidebar();
get_footer();
?>