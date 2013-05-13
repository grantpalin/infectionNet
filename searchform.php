<?php
/**
 * The template for displaying search forms
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <label for="s" class="assistive-text"><?php _e( 'Search', 'inet' ); ?></label>
    <input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'inet' ); ?>" />
    <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'inet' ); ?>" />
</form>