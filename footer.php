<?php
/**
 * The footer template file in WordPress theme
 *
 */

if ( has_nav_menu( 'wts_footer_menu_1' ) ) {
    wp_nav_menu( array(
        'theme_location'  => 'wts_footer_menu_1',
    ) );
}

if ( has_nav_menu( 'wts_footer_menu_2' ) && ( get_theme_mod( 'wts_footer_menu_2_active' ) === 'yes' ) ) {
    wp_nav_menu( array(
        'theme_location'  => 'wts_footer_menu_2',
    ) );
}

wp_footer();

?>

    </body>
</html>