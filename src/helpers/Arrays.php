<?php
/**
 * Arrays class file.
 *
 * This file contains Arrays class used in creating objects from an array of classes.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Helpers;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Arrays class
 *
 * This class contains methods for creating objects from from an array of classes.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
class Arrays
{
    /**
     * Returns an array of class objects.
     *
     * Value passed to this method parameter will likely be an indexed array.
     *
     * @final
     * @param array $classes
     * @return array
     * @since 1.0.0
     */
    final public static function create_objects( array $classes = array() ) : array
    {
        $objects_array = array();

        if ( ! empty( $classes ) ) {
            foreach ( $classes as $class ) {
                if ( class_exists( $class ) ) {
                    $objects_array[] = new $class();
                }
            }
        }

        return $objects_array;
    }

    /**
     * Returns an array of class objects that require config settings injected via their constructor.
     *
     * Value passed to this method parameter will likely be an associative array.
     *
     * @final
     * @param array $classes
     * @return array
     * @since 1.0.0
     */
    public static function create_objects_with_config( array $classes = array() ) : array
    {
        $objects_array = array();

        if ( ! empty( $classes ) ) {
            foreach ( $classes as $class => $config ) {
                if ( class_exists( $class ) ) {
                    $objects_array[] = new $class( wts_config( $config ) );
                }
            }
        }

        return $objects_array;
    }
}