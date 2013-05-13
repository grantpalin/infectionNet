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
                    <div class="left">
                        <p class="infectionnet"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-infectionnet.png" width="245" height="89" alt="infectionNet" /></p><!--
                        --><p class="viha"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-viha.png" width="160" height="89" alt="Vancouver Island Health Authority" /></p>
                    </div><!--
                    --><div class="right">
                        <nav>
                            <h1 class="assistive-text">Menu</h1>
                            <ul>
                                <li><a href="about.html">About</a></li><!--
                                --><li><a href="blog.html">The Blog</a></li><!--
                                --><li><a href="resources.html">Resources</a></li><!--
                                --><li><a href="cases.html">Cases</a></li><!--
                                --><li><a href="groups.html">Groups</a></li><!--
                                --><li><a href="questions.html">Questions</a></li><!--
                                --><li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav><!--
                        --><div class="news">
                            <p class="twitter"><a href="#">Follow infectionNet on Twitter</a></p><!--
                            --><p class="newsletter"><a href="#">Sign up for our newsletter</a></p>
                        </div><!--
                        --><div class="closing">
                            <p class="copyright">Copyright 2013 Vancouver Island Health Authority, infectionNet</p><!--
                            --><p class="armada">Site by <a href="http://armadadesign.ca/">Armada Design</a></p>
                        </div>
                    </div>
                </div><!-- .site-info -->
            </footer><!-- #colophon .site-footer -->
        </div><!-- #page .hfeed .site -->
<?php wp_footer(); ?>
    </body>
</html>