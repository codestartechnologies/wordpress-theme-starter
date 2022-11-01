<?php
/**
 * PageViewLoader trait
 *
 * This file contains PageViewLoader trait file which contains methods for classes that load views in the admin area or public area of the site.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Traits;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! trait_exists( 'PageViewLoader' ) ) {
    /**
     * Trait PageViewLoader
     *
     * This class contains methods for loading views in the admin area or public area of the site.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    trait PageViewLoader {
        /**
         * Include a view in the page
         *
         * @param string $view      The relative path to the view file. Paths are separated using dots (.)
         * @param array $params     Parameters passed to the view. Default is an empty array
         * @param string $type      The directory to search for the view. Can be either "admin" or "public". Default is admin
         * @return void
         */
        public function load_view( string $view, array $params = array(), string $type = 'admin' ) : void
        {
            $view = str_replace( '.', '/', $view );
            $base_path = null;

            if ( in_array( $type, array( 'admin', 'public' ), true ) ) {
                $base_path = 'admin' === $type ? WTS_ADMIN_VIEWS_DIR : WTS_PUBLIC_VIEWS_DIR;
                $full_path = $base_path . $view . '.php';

                if ( is_readable( $full_path ) ) {

                    if ( ! empty( $params ) ) {
                        extract( $params );
                    }

                    require_once $full_path;
                } else {
                    $this->view_not_found_message( $full_path );
                }
            } else {
                $this->invalid_view_type_message( $type );
            }
        }

        /**
         * Prints error message for views loaded with an invalid type parameter.
         *
         * @param string $type  The view type
         * @return void
         * @since 1.0.0
         */
        public function invalid_view_type_message( $type ) : void
        {
            printf(
                __(
                    '
                        <h3 style="color: red;">View type does not exist!</h3>
                        <p>View of type <b>%s</b> is invalid. Valid types are <em>admin</em> and <em>site</em> </p>
                    '
                ),
                $type
            );
        }

        /**
         * Prints error message for non existing views.
         *
         * @param string $type  Path to the view file
         * @return void
         * @since 1.0.0
         */
        public function view_not_found_message( $file_path ) : void
        {
            printf(
                __(
                    '
                        <h3 style="color: red;">View could not be loaded!</h3>
                        <p>There was an error loading <b>%s</b>. Please check file exist and is readable. </p>
                    '
                ),
                $file_path
            );
        }
    }
}