<?php
/**
 * The sidebar(s) containing the main widget areas.
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
?>
<div id="secondary" class="widget-area" role="complementary">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="search" class="widget widget_search">
            <?php get_search_form(); ?>
        </aside><!-- #search .widget .widget_search -->

        <aside id="archives" class="widget">
            <h1 class="widget-title"><?php _e( 'Archives', 'inet' ); ?></h1>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside><!-- #archives .widget -->

        <aside id="meta" class="widget">
            <h1 class="widget-title"><?php _e( 'Meta', 'inet' ); ?></h1>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside><!-- #meta .widget -->
    <?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->

<div id="tertiary" class="widget-area" role="supplementary">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #tertiary .widget-area -->
