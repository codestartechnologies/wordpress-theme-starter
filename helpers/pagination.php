<?php
/**
 * This file contains functions for creating pagination for archives
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

if ( ! function_exists( 'wts_paginate' ) ) {
    /**
     * Creates pagination links for an archive page
     *
     * @param integer|null $pages
     * @param integer $range
     * @return void
     * @since 1.0.0
     */
    function wts_paginate( ?int $pages = null, int $range = 2 ) : void
    {
        $showitems = ( $range * 2 ) + 1;
        global $paged;

        if ( empty( $paged ) ) {
            $paged = 1;
        }

        if ( is_null( $pages ) ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( ! $pages ) {
                $pages = 1;
            }
        }

        if ( 1 != $pages ) {
            $markup = wts_config( 'comments.pagination_markup' );
            $markup = wp_parse_args( ( array ) $markup, array(
                'wrapper_open'      => '<nav>',
                'page_first'        => '<a href="%s">&laquo;</a>',
                'page_prev'         => '<a href="%s">&lsaquo;</a>',
                'page_current'      => '<a class="active" href="javascript:void(0);">%s</a>',
                'page_links'        => '<a href="%1$s">%2$s</a>',
                'page_next'         => '<a href="%s">&rsaquo;</a>',
                'page_last'         => '<a href="%s">&raquo;</a>',
                'wrapper_close'     => '</nav>',
            ) );

            ob_start();

            echo $markup['wrapper_open'];

            if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
                echo sprintf( $markup['page_first'], get_pagenum_link( 1 ) );
            }

            if ( $paged > 1 && $showitems < $pages ) {
                echo sprintf( $markup['page_prev'], get_pagenum_link( $paged - 1 ) );
            }

            for ( $i = 1; $i <= $pages; $i++ ) {
                if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
                    echo ( $paged == $i )
                        ? sprintf( $markup['page_current'], $i )
                        : sprintf( $markup['page_links'], get_pagenum_link( $i ), $i ) ;
                }
            }

            if ( $paged < $pages && $showitems < $pages ) {
                echo sprintf( $markup['page_next'], get_pagenum_link( $paged + 1 ) );
            }

            if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) {
                echo sprintf( $markup['page_last'], get_pagenum_link( $pages ) );
            }

            echo $markup['wrapper_close'];

            echo ob_get_clean();
        }
    }
}

if ( ! function_exists( 'wts_simple_paginate' ) ) {
    /**
     * Creates a simple pagination links for archive pages
     *
     * @return void
     * @since 1.0.0
     */
    function wts_simple_paginate() : void
    {
        global $paged;
        global $wp_query;

        if ( empty( $paged ) ) {
            $paged = 1;
        }

        $pages = $wp_query->max_num_pages;

        if ( ! $pages ) {
            $pages = 1;
        }

        if (  1 != $pages  ) {
            $markup = wts_config( 'comments.simple_pagination_markup' );
            $markup = wp_parse_args( ( array ) $markup, array(
                'prev'  => '<a href="%1$s">%2$s</a>',
                'next'  => '<a href="%1$s">%2$s</a>',
            ) );

            ob_start();

            if ( $paged > 1 ) {
                echo sprintf( $markup['prev'], esc_attr( get_pagenum_link( $paged - 1 ) ), esc_html__( 'Previous page' ) );
            }

            if ( $paged < $pages ) {
                echo sprintf( $markup['prev'], esc_attr( get_pagenum_link( $paged + 1 ) ), esc_html__( 'Next page' ) );
            }

            echo ob_get_clean();
        }
    }
}