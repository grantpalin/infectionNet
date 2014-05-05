<?php
/**
 * Handle registration of custom menus
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */

/**
 * Register custom menus to be used within the theme
 *
 * @since infectionNet 0.1
 */
function inet_register_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'inet' ),
            'meta' => __( 'Meta Menu', 'inet' ),
            'footer' => __( 'Footer Menu', 'inet' ),
            'about' => __( 'About Section Menu', 'inet' ),
        )
    );
}