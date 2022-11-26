<?php
/**
 * The header template file in WordPress theme
 *
 */
?>

<!DOCTYPE html>

<html <?php language_attributes() ?> class="no-js">
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php if ( has_excerpt() ) : ?>

        <meta name="description" content="<?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?>" />

        <?php else : ?>

        <meta name="description" content="<?php echo wp_get_document_title(); ?>" />

        <?php endif; ?>

        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class() ?>>

    <?php wp_body_open(); ?>

    <header>

        <!-- mobile top bar -->
        <div class="wts-mobile-top-bar wts-fix-float">
            <button type="button" class="wts-toggler">&blacktriangledown;</button>
        </div>
        <!-- / mobile top bar -->

        <?php if ( has_nav_menu( 'wts_mobile_menu' ) ) : ?>
        <!-- mobile nav menu -->
        <div class="wts-menu-container wts-mobile-menu-container">
            <?php wp_nav_menu( array( 'theme_location'  => 'wts_mobile_menu', ) ); ?>
        </div>
        <!-- / mobile nav menu -->
        <?php endif; ?>

        <div class="wts-container">
            <div class="wts-row">
                <!-- desktop top bar -->
                <div class="wts-desktop-top-bar">
                    <a href="<?php echo site_url(); ?>" class="wts-logo">
                        <img src="<?php echo WTS_LOGO_IMG; ?>" alt="" />
                    </a>
                </div>
                <!-- / desktop top bar -->
                <!-- desktop nav menu -->
                <div class="wts-menu-container wts-desktop-menu-container">
                    <?php if ( has_nav_menu( 'wts_pc_menu' ) ) : ?>
                        <?php wp_nav_menu( array( 'theme_location'  => 'wts_pc_menu', ) ); ?>
                    <?php endif; ?>
                    <!-- search form -->
                    <div class="wts-menu-search-form">
                        <form action="<?php echo get_search_link( 's' ); ?>" method="get" class="wts-flex">
                            <div>
                                <input type="search" name="s" id="" placeholder="<?php esc_html_e( 'search...', 'wts' ); ?>" />
                            </div>
                            <button type="submit"> <?php esc_html_e( 'search', 'wts' ); ?> </button>
                        </form>
                    </div>
                    <!-- / search form -->
                </div>
                <!-- / desktop nav menu -->
            </div>
        </div>
    </header>
