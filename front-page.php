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
                <h1>Manage and Learn About Infections. <span>Easier.</span></h1>
                <p>This is where some information would go about infectionNet. It would probably introduce the overall concept in a sentence or two. Short and sweet. It should set the context and suggest visitors to read further on the About page.</p>
            </header>

            <div class="upper">
                <div class="section-container vertical-tabs" data-section="vertical-tabs">
                    <section>
                        <p class="title" data-section-title><a href="#">For doctors &amp; clinical pharmacists</a></p>
                        <div class="content" data-section-content>
                            <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat blandit mi. In hac habitasse platea.</strong></p>
                            <p>Nullam aliquam, augue eu feugiat ornare, massa dui mattis arcu, consectetur fermentum tortor ligula in ligula. Fusce tempor risus eget massa semper eu varius nunc eleifend. Etiam ac nisi eget dui interdum suscipit sed ut magna. Nullam viverra, sapien vitae volutpat vestibulum, purus metus commodo.</p>
                            <button>View Resources</button>
                            <button>Connect With Others</button>
                        </div>
                    </section>

                    <section>
                        <p class="title" data-section-title><a href="#">For patients & the public</a></p>
                        <div class="content" data-section-content>
                            <p>Vivamus egestas turpis ac urna pulvinar ac adipiscing nulla sollicitudin. Sed dui quam, egestas rhoncus accumsan quis, hendrerit eget eros. Nunc a lacus nisl, a vehicula elit. In ullamcorper, mauris quis faucibus dictum, nisi tellus pretium metus, in cursus dui leo eget velit. Sed auctor elementum tellus, et malesuada velit lobortis vitae. Suspendisse enim turpis, consectetur in iaculis eu, vestibulum vitae nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                        </div>
                    </section>

                    <section>
                        <p class="title" data-section-title><a href="#">Topic-specific groups</a></p>
                        <div class="content" data-section-content>
                            <p>Duis tellus mauris, semper non dictum vitae, sagittis nec ante. Integer vel elit et mauris sagittis malesuada ac id risus. Sed ultricies posuere arcu sed convallis. Fusce quis enim vel ipsum lobortis gravida. Nullam sodales elementum tellus sodales ultrices. Quisque tincidunt elementum dui, nec dictum neque accumsan eu. Proin placerat, turpis in facilisis tristique, tellus justo dictum velit, vel fermentum ipsum odio quis velit. Etiam a tellus neque, nec aliquet velit.</p>
                        </div>
                    </section>
                </div>
            </div>

            <div class="lower">
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
                    <p><a href="/blog/">Read more news</a></p>
                </section><!--

		        --><section class="whats-happening">
                    <h2>What's Happening In The Community</h2>
                </section>
            </div>
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->
<?php
//get_sidebar();
get_footer();
?>