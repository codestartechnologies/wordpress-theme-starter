<main>

    <div class="wts-section-divider"></div>

    <div class="wts-container">

        <?php

        if ( is_search() ) {

            _e( '<h5>Search:</h5>', 'wts' );

            get_search_form();

        }

        if ( have_posts() ) {

            if ( is_home() ) {
        ?>
                <section>
                    <?php get_template_part( 'template-parts/content/posts' ); ?>
                </section>
        <?php
            } elseif ( is_page() ) {
        ?>
                <section>
                    <?php
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    ?>
                </section>
        <?php
            } else {
        ?>
                <div class="wts-flex wts-blog-container">

                    <!-- blog section -->
                    <section class="wts-blog-section">
                        <?php
                            while ( have_posts() ) {
                                the_post();

                                printf( '<h2>%s</h2>', get_the_title() );

                                if ( has_post_thumbnail() ) {

                                    if ( is_singular() ) {

                                        printf( '<p>%s</p><br />', get_the_post_thumbnail( null, 'medium_large' ) );

                                    } else {

                                        printf( '<p><a href="%1$s">%2$s</a></p><br />', get_the_permalink(), get_the_post_thumbnail( null, 'medium' ) );

                                    };

                                };

                                printf('<p><b><i>%s</i></b></p>', get_the_date( 'd M, Y' ) );

                                if ( is_archive() || is_search() || ! is_singular() ) {

                                    printf( '<div>%s</div>', get_comments_number_text() );

                                    printf( '<p>%s</p>', get_the_excerpt() );

                                    the_shortlink( esc_html__( 'See Post', 'wts' ) );

                                } else {

                                    printf( '<p>%s</p>', get_the_content() );

                                }

                            }
                        ?>
                    </section>
                    <!-- / blog section -->

                    <?php
                        if ( is_archive() || is_singular() ) {
                            get_sidebar();
                        }
                    ?>

                </div>
        <?php
            }

            if ( is_singular() ) {

                comments_template();

                if ( comments_open() ) {

                    comment_form();

                }
            }

            if (  is_archive() || is_search() || ! is_singular()  ) {

                wts_paginate();

            } elseif ( is_single() ) {

                printf( __( '<h5>Previous Post</h5><p>%s</p><br />', 'wts' ), get_previous_post_link() );

                printf( __( '<h5>Next Post</h5><p>%s</p><br />', 'wts' ), get_next_post_link() );

            }

        } else {

            esc_html_e( 'Sorry, no posts matched your criteria.', 'wts' );

        }

        ?>

    </div>

    <div class="wts-section-divider"></div>

</main>