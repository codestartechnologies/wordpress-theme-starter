<!-- sidebar -->
<aside class="wts-sidebar">

    <?php
        $default_page_id = get_option( 'wts_sidebar_page' )['default_page'] ?? null;
        $sidebar_active = get_option( 'wts_sidebar_page' )['show_sidebar'] ?? null;

        if (
            is_active_sidebar( 'wts-sidebar' ) &&
            ( $sidebar_active === 'yes' ) &&
            ( empty( $default_page_id ) || ( get_the_ID() == $default_page_id ) )
        ) {
            dynamic_sidebar( 'wts-sidebar' );
        } else {
            if ( is_user_logged_in() ) {
                printf(
                    __( '<div><br /><b>WTS Sidebar is inactive or is not enabled on this page. <a href="%1$s">Add a widget</a> or <a href="%2$s">change settings</a></b>.</div>', 'wts' ),
                    admin_url( 'widgets.php' ),
                    admin_url( 'options-general.php?page=wts-options-page' )
                );
            }
        }
    ?>

</aside>
<!-- / sidebar -->