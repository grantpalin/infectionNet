<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */

/**
 * Get the wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since infectionNet 0.1
 */
function inet_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'inet_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since infectionNet 0.1
 */
function inet_body_classes( $classes ) {
    global $post;
	
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
	
    // Adds a class of group-blog to blogs with more than 1 published author
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    return $classes;
}
add_filter( 'body_class', 'inet_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since infectionNet 0.1
 */
function inet_enhanced_image_navigation( $url, $id ) {
    if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
        return $url;

    $image = get_post( $id );
    if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
        $url .= '#main';

    return $url;
}
add_filter( 'attachment_link', 'inet_enhanced_image_navigation', 10, 2 );

/**
 * Act before retrieval of content items in an archive to control content loading & display
 *
 * @since infectionNet 0.1
 */
function inet_pre_get_posts( $query ) {
	// do not execute following actions if in the backend, or if not the main query
	if ( is_admin() || !$query->is_main_query() ) return;

	if (is_post_type_archive('case')) {
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
	}

	if (is_post_type_archive('note')) {
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
	}

	if (is_post_type_archive('question')) {
		$query->set('orderby', 'date');
		$query->set('order', 'DESC');
	}

	if (is_post_type_archive('therapy_guideline')) {
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
	}
}
add_action( 'pre_get_posts', 'inet_pre_get_posts' );