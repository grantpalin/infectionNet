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
                <section class="latest-news">
                    <h2>Latest News</h2>
                    <ul>
                        <?php
                        $query = new WP_Query(
                            array (
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            )
                        );
        
                        while( $query->have_posts() ):
                            $query->next_post();
                            echo '<li><a href="' . get_permalink( $query->post->ID ) . '">' . get_the_title( $query->post->ID ) . '</a></li>';
                        endwhile;
        
                        wp_reset_postdata();
                        ?>
                    </ul>
                    <p><a href="/blog/" class="go-deeper">Read more news</a></p>
                </section><!-- .latest-news -->
        
                <section class="whats-happening">
                    <h2>What's Happening In The Community</h2>
                    <?php bbp_get_template_part( 'bbpress/content', 'archive-topic' ); ?>
                    <p><a href="/forums/" class="go-deeper">Go to the Forums</a></p>
                </section><!-- .whats-happening -->
            </div><!-- .entry-content -->
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php
//get_sidebar();
get_footer();
?>