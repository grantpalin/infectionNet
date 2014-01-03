<?php
/**
 * infectionNet functions and definitions
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since infectionNet 0.1
 */
//if ( ! isset( $content_width ) )
//    $content_width = 654; /* pixels */

define( 'INET_THEME_URL', get_bloginfo( 'stylesheet_directory' ) . '/' );
define( 'INET_CSS_URL', INET_THEME_URL . 'scss/' );
define( 'INET_JS_URL', INET_THEME_URL . 'js/' );
define( 'INET_IMAGES_URL', INET_THEME_URL . 'img/' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support for post thumbnails.
 *
 * @since infectionNet 0.1
 */
function inet_setup() {
    require 'functions/menus.php';
    require 'functions/widgets.php';
    require 'functions/template-tags.php';
    require 'functions/tweaks.php';

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'case', 'note', 'question', 'therapy_guideline' ) );
    // support custom background, custom header?

    // set custom thumbnail dimensions
    set_post_thumbnail_size( 100, 100, true );

    add_action( 'widgets_init', 'inet_widgets_init' );
    add_action( 'init', 'inet_register_menus' );
    add_action( 'wp_enqueue_scripts', 'inet_enqueue_scripts_styles' );
    add_action( 'p2p_init', 'inet_connection_types' );
} // inet_setup
add_action( 'after_setup_theme', 'inet_setup' );

function inet_enqueue_scripts_styles() {
    // documented at http://codex.wordpress.org/Function_Reference/wp_enqueue_style
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), null, 'all');
}

function inet_connection_types() {
    // ensure plugin is active, bail out if not
    if ( !function_exists( 'p2p_register_connection_type' ) )
        return;

    $matches = array (
        'post' => array ('post', 'page', 'topic', 'cases', 'notes', 'questions', 'therapy_guideline'),
        'page' => array ('page', 'topic', 'cases', 'notes', 'questions', 'therapy_guideline'),
        'topic' => array ('topic', 'cases', 'notes', 'questions', 'therapy_guideline'),
        'cases' => array ('cases', 'notes', 'questions', 'therapy_guideline'),
        'notes' => array ('notes', 'questions', 'therapy_guideline'),
        'questions' => array ('questions', 'therapy_guideline'),
        'therapy_guideline' => array ('therapy_guideline')
    );

    foreach ($matches as $from => $targets) {
        foreach ($targets as $to) {
            p2p_register_connection_type(
                array (
                    'name' => $from . '-related-' . $to,
                    'from' => $from,
                    'to' => $to,
                    'reciprocal' => true // each pair of content types can be registered just once, works both ways
                )
            );
        }
    }
}
