<?php

if ( is_search() ) {

    _e( '<h5>Search:</h5>', 'wts' );

    get_search_form();

}

if ( have_posts() ) :

    while ( have_posts() ) : the_post();

        printf( '<h2>%s</h2>', get_the_title() );

        if ( has_post_thumbnail() ) :

            if ( is_singular() ) :

                printf( '<p>%s</p><br />', get_the_post_thumbnail( null, 'medium_large' ) );

            else :

                printf( '<p>%s</p><br />', get_the_post_thumbnail( null, 'medium' ) );

            endif;

        endif;

        if ( is_archive() || is_search() ) :

            printf( '<p>%s</p>', get_the_excerpt() );

        else:

            printf( '<p>%s</p>', get_the_content() );

        endif;

    endwhile;

else :

    esc_html_e( 'Sorry, no posts matched your criteria.', 'wts' );

endif;

if ( is_singular() ) :

    comments_template();

    if ( comments_open() ) :

        comment_form();

    endif;

endif;
