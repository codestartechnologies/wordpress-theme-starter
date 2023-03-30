<?php
/**
 * Validator trait file.
 *
 * This file contains Validator trait for validating objects parent class.
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
 * Trait Validator
 *
 * This trait is used for validating objects parent class.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
trait Validator {
    /**
     * This method will check the type of each objects in an array and return valid and invalid objects.
     *
     * @access public
     * @final
     * @param array $objects        Array containing objects
     * @param string $class_type    Class type to check against
     * @return array
     * @since 1.0.0
     */
    final public function check_objects_parent_type( array $objects, string $class_type) : array
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