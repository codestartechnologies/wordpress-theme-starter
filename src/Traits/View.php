<?php
/**
 * View trait
 *
 * This file contains View trait file which contains methods for classes that load views in the admin area or public area of the site.
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
 * Trait View
 *
 * This trait contains methods for loading views in the admin area or public area of the site.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
trait View {
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
            wts_load_view( $view, $params, $type, $once );
        } else {
            $this->invalid_view_type_message( $type );
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
}