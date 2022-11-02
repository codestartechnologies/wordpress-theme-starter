<?php
/**
 * WTSCustomizer class file
 *
 * This is an example class file for creating customizer sections, settings and controls.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace App\Admin\Customizers;

use Codestartechnologies\WordpressThemeStarter\Abstracts\Customizer as AbstractsCustomizer;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WTSCustomizer' ) ) {
    /**
     * WTSCustomizer Class
     *
     * Registers customizer sections, settings and controls. This class needs to define methods that will be passed as callbacks to
     * WP_Customize_Manager::add_section(), WP_Customize_Manager::add_setting(), and WP_Customize_Manager::add_control().
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class WTSCustomizer extends AbstractsCustomizer {
        /**
         * WTSCustomizer constructor
         *
         * @access public
         * @param array $parameters     Initial arguements for WP_Customize_Manager::add_section(), WP_Customize_Manager::add_setting(), and WP_Customize_Manager::add_control()
         * @return void
         * @since 1.0.0
         */
        public function __construct( array $parameters )
        {
            parent::__construct( $parameters );
        }

        /**
         * Handle active_callback arguement for WP_Customize_Manager::add_section()
         *
         * @access public
         * @return mixed
         * @since 1.0.0
         */
        public function section_arg_active_callback() : mixed
        {
            //
        }

        /**
         * Handle validate_callback arguement for WP_Customize_Manager::add_setting()
         *
         * Adds and returns validation errors for a customizer setting.
         *
         * @access public
         * @param \WP_Error $validity
         * @param string $value
         * @return \WP_Error
         * @since 1.0.0
         */
        public function setting_arg_validate_callback( \WP_Error $validity, string $value ) : \WP_Error
        {

            /**
             * Handle validation errors for a setting
             *
             * Example:
             *
             * if ( false ) {
             *    $validity->add();
             * }
             *
             */

            return $validity;
        }

        /**
         * Handle sanitize_callback arguement for WP_Customize_Manager::add_setting()
         *
         * @access public
         * @return mixed
         * @since 1.0.0
         */
        public function setting_arg_sanitize_callback() : mixed
        {
            //
        }

        /**
         * Handle active_callback arguement for WP_Customize_Manager::add_control()
         *
         * @access public
         * @return mixed
         * @since 1.0.0
         */
        public function control_arg_active_callback() : mixed
        {
            //
        }

        /**
         * Handle active_callback arguement for WP_Customize_Manager::add_control() method of type WP_Customize_Media_Control.
         *
         * @access public
         * @return mixed
         * @since 1.0.0
         */
        public function media_control_arg_active_callback() : mixed
        {
            //
        }
    }
}