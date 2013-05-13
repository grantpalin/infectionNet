<?php
/**
 * Handle registration of widget areas (sidebars)
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */

/**
* Register widgetized area and update sidebar with default widgets
*
* @since infectionNet 0.1
*/
function inet_widgets_init() {
    register_sidebar(
        array(
            'name' => __( 'Primary Widget Area', 'inet' ),
            'id' => 'sidebar-1',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );

    register_sidebar(
        array(
            'name' => __( 'Secondary Widget Area', 'inet' ),
            'id' => 'sidebar-2',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );
}