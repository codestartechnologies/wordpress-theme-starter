<?php
/**
 * ViewLoader trait
 *
 * This file contains ViewLoader trait file which contains methods for classes that load views in the admin area or public area of the site.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Traits;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Trait ViewLoader
 *
 * This trait contains methods for loading views in the admin area or public area of the site.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
trait ViewLoader {
    /**
     * Include a view in the page
     *
     * @access public
     * @param string $view      The relative path to the view file. Paths are separated using dots (.)
     * @param array $params     Parameters passed to the view. Default is an empty array
     * @param string $type      The directory to search for the view. Can be either "admin" or "public". Default is admin
     * @param bool $once        Whether to include the view only once. Default true
     * @return void
     * @since 1.0.0
     */
    public function load_view( string $view, array $params = array(), string $type = 'admin', bool $once = true ) : void
    {
        if ( in_array( $type, array( 'admin', 'public' ), true ) ) {
            $base_path = WTS_PATH;
            $base_path .= ( 'admin' === $type ) ? WTS_ADMIN_VIEWS_DIR : WTS_PUBLIC_VIEWS_DIR;
            $this->load( $base_path, $view, $params, $once );
        } else {
            $this->invalid_view_type_message( $type );
        }
    }

    /**
     * Include a core view in the page
     *
     * @access public
     * @param string $view      The relative path to the view file. Paths are separated using dots (.)
     * @param array $params     Parameters passed to the view. Default is an empty array
     * @param string $type      The directory to search for the view. Can be either "admin" or "public". Default is admin
     * @param bool $once        Whether to include the view only once. Default true
     * @return void
     * @since 1.0.0
     */
    public function load_core_view( string $view, array $params = array(), string $type = 'admin', bool $once = true ) : void
    {
        if ( in_array( $type, array( 'admin', 'public' ), true ) ) {
            $base_path = WTS_PATH . 'src/';
            $base_path .= ( 'admin' === $type ) ? WTS_ADMIN_VIEWS_DIR : WTS_PUBLIC_VIEWS_DIR;
            $this->load( $base_path, $view, $params, $once );
        } else {
            $this->invalid_view_type_message( $type );
        }
    }

    /**
     * Method to load the view
     *
     * @access private
     * @param string $base_path     The base path to the view. Default is null
     * @param string $view          The relative path to the view file. Paths are separated using dots (.)
     * @param array $params         Parameters passed to the view. Default is an empty array
     * @param bool $once            Whether to include the view only once. Default true
     * @return void
     * @since 1.0.0
     */
    private function load( string $base_path = null, string $view, array $params = array(), bool $once = true ) : void
    {
        $view = str_replace( '.', '/', $view );
        $full_path = $base_path . $view . '.php';

        if ( is_readable( $full_path ) ) {

            if ( ! empty( $params ) ) {
                extract( $params );
            }

            if ( $once ) {
                require_once $full_path;
            } else {
                require $full_path;
            }
        } else {
            $this->view_not_found_message( $full_path );
        }
    }

    /**
     * Prints error message for views loaded with an invalid type parameter.
     *
     * @access public
     * @param string $type  The view type
     * @return void
     * @since 1.0.0
     */
    public function invalid_view_type_message( $type ) : void
    {
        $markup = array_filter( ( array ) wts_config( 'views.error_messages' ) );
        $markup = wp_parse_args( ( array ) $markup, array(
            'invalid_type'  => __(
                '<h3 style="color: red;">View type does not exist!</h3><p>View of type <b>%s</b> is invalid. Valid types are <em>admin</em> and <em>site</em> </p>',
                'wts'
            ),
        ) );

        printf( $markup['invalid_type'], $type );
    }

    /**
     * Prints error message for non existing views.
     *
     * @access public
     * @param string $type  Path to the view file
     * @return void
     * @since 1.0.0
     */
    public function view_not_found_message( $file_path ) : void
    {
        $markup = array_filter( ( array ) wts_config( 'views.error_messages' ) );
        $markup = wp_parse_args( ( array ) $markup, array(
            'not_found'  => __(
                '<h3 style="color: red;">View could not be loaded!</h3><p>There was an error loading <b>%s</b>. Please check file exist and is readable. </p>',
                'wps'
            ),
        ) );

        printf( $markup['not_found'], $file_path );
    }
}