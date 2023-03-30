<?php
/**
 * This file is used to display contents for a page.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */
?>

<main>

    <div class="wts-section-divider"></div>

    <div class="wts-container">

        <?php

        if ( have_posts() ) {

            if ( is_home() ) {
        ?>
                <section>
                    <?php
                        get_template_part( 'template-parts/content/posts' );
                        get_template_part( 'template-parts/content/page-divider' );
                        wts_paginate();
                    ?>
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

                if ( is_search() ) {
                    get_search_form();
                    get_template_part( 'template-parts/content/page-divider' );
                }

        ?>
                <div class="wts-flex wts-blog-container">

                    <!-- blog section -->
                    <section class="wts-blog-section">
                        <?php

                            if ( is_singular() ) {

                                get_template_part( 'template-parts/content/single' );
                                comments_template();

                                if ( comments_open() ) {
                                    comment_form();
                                }

                                get_template_part( 'template-parts/content/post-navigation' );

                            }

                            if ( is_archive() || is_search() || is_tax() ) {
                                get_template_part( 'template-parts/content/title' );
                                get_template_part( 'template-parts/content/archive' );
                                get_template_part( 'template-parts/content/page-divider' );
                                wts_paginate();
                            }

                        ?>
                    </section>
                    <!-- / blog section -->

                    <?php get_sidebar(); ?>

                </div>
        <?php
            }

        } else {

            esc_html_e( 'Sorry, no posts matched your criteria.', 'wts' );

        }

        ?>

    </div>

    <div class="wts-section-divider"></div>

</main>