<?php
/**
 * Customizer class file
 *
 * This class contains Customizer class file. This is an example class file for classes that need to register
 * customizer sections, settings and controls.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Admin\Customizers;

use Codestartechnologies\WordpressThemeStarter\Abstracts\Customizer as AbstractsCustomizer;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Customizer' ) ) {
    /**
     * Customizer Class
     *
     * This is an demo class file for classes that will register customizer sections, settings and controls.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class Customizer extends AbstractsCustomizer {
        /**
         * Customizer constructor
         *
         * @access public
         * @param array $parameters An array of configurations for sections, settings and controls that will be registered by the customizer.
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

            // return Wp_Error after adding validation errors
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