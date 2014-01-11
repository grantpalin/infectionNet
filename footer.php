<?php
/**
 * The template for displaying the site-wide footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package infectionNet
 * @since infectionNet 0.1
 */
?>
            </div><!-- #main .site-main -->

            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="site-info">
                    <div class="meta">
<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => 'div' ) ); ?>
                        <p class="copyright">Copyright 2013 Vancouver Island Health Authority, infectionNet</p>
                        <p class="armada">Site by <a href="http://armadadesign.ca/">Armada Design</a></p>
                        <p class="twitter"><a href="#">Follow infectionNet on Twitter</a></p>
                        <p class="newsletter"><a href="#">Sign up for our newsletter</a></p>
                    </div><!-- .meta -->
                    <div class="logos">
                        <p class="infectionnet"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-infectionnet.png" width="245" height="89" alt="infectionNet" /></p>
                        <p class="viha"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-viha.png" width="157" height="83" alt="Vancouver Island Health Authority" /></p>
                    </div><!-- .logos -->
                </div><!-- .site-info -->
            </footer><!-- #colophon .site-footer -->
        </div><!-- #page .hfeed .site -->
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.topbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.section.js"></script>
<script>
jQuery(document).ready(function($) {
	// add conditional classname based on support for details / summary
	$('html').addClass($.fn.details.support ? 'details' : 'no-details');
	// emulate <details> where necessary and enable open/close event handlers
	$('details').details();
	
	$(document).foundation();
});
</script>
    </body>
</html>