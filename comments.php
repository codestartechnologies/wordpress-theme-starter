<?php
/**
 * The comments template file in WordPress theme
 *
 */

if ( comments_open() || get_comments_number() ) {
    $title_markup = sprintf(
        _nx(
            'One comment in this topic:',
            '%s comments in this topic:',
            get_comments_number(),
            'comments title',
            'rome'
        ),
        number_format_i18n( get_comments_number() )
    );

    printf( '<p>%s</p>', $title_markup );

    wp_list_comments();
}

?>
