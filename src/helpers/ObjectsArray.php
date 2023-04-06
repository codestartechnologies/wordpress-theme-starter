<?php
/**
 * ObjectsArray class file.
 *
 * This file contains ObjectsArray class used for handling classes or objects that are inside an array.
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
 * ObjectsArray class
 *
 * This class contains methods for handling classes or objects that are inside an array.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
class ObjectsArray
{
    /**
     * Returns an array of class objects.
     *
     * Value passed to this method parameter will likely be an indexed array.
     *
     * @final
     * @static
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
     * @static
     * @param array $classes
     * @return array
     * @since 1.0.0
     */
    final public static function create_objects_with_config( array $classes = array() ) : array
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

    /**
     * Checks the type of each objects in an array and return valid and invalid objects.
     *
     * @final
     * @static
     * @param array $objects        Array containing objects
     * @param string $class_type    Class type to check against
     * @return array
     * @since 1.0.0
     */
    final public static function check_objects_parent_type( array $objects, string $class_type ) : array
    {
        $result['valid']    = array();
        $result['invalid']  = array();

        foreach ($objects as $object) {
            if ( get_parent_class( $object ) == $class_type ) {
                $result['valid'][] = $object;
            } else {
                $result['invalid'][] = $object;
            }
        }

        return $result;
    }
}