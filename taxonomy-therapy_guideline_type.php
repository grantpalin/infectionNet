<?php
/**
 * The generic template for displaying taxonomy archives. Overrides the generic archive.php.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
get_header();

$taxName = get_query_var('taxonomy');
$termName = get_query_var('term');
$termDescription = term_description( '', $termName );
?>
    <section id="primary" class="site-content">
        <div id="content" role="main">
            <?php inet_breadcrumb(); ?>
            <?php if ( have_posts() ) : ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php echo get_taxonomy($taxName)->labels->singular_name ?> : <?php single_term_title(); ?></h1>
            </header><!-- .archive-header -->

            <div class="entry-content">
                <div class="entry-content-right">
<?php
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
                    else :
                        get_template_part( 'content', 'none' );
                    endif;
                    ?>
                </div><!--.entry-content-right-->
                <div class="entry-content-left">
					<?php
                    if($termDescription != '') : ?>
                        <div class="tax-desc">
                            <h2>About this term</h2>
                            <?php echo $termDescription; ?>
                        </div>
                    <?php
                    endif;
					?>
                    <h2>Therapy Guideline Types</h2>
					<ul class="categories links-list">
<?php
$categories = get_post_type_terms($taxName);
echo $categories;
?>
					</ul>
                </div><!--.entry-content-left-->
            </div><!--.entry-content-->
        </div><!-- #content -->
    </section><!-- #primary .site-content -->
<?php
get_footer();
?>