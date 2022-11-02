<?php

$default_page_id = get_option( 'wts_sidebar_page' )['default_page'] ?? null;
$sidebar_active = get_option( 'wts_sidebar_page' )['show_sidebar'] ?? null;

if ( is_active_sidebar( 'wts-sidebar' ) && $sidebar_active && ( get_the_ID() === $default_page_id ) ) {
    dynamic_sidebar( 'wts-sidebar' );
}
