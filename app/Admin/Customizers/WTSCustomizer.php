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
         * @return bool
         * @since 1.0.0
         */
        public function wts_footer_menu_2_section_cb() : bool
        {
            return true;
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
        public function wts_footer_menu_2_active_validate_callback( \WP_Error $validity, string $value ) : \WP_Error
        {
            if ( ! in_array( $value, array( 'yes', 'no' ), true ) ) {
                $validity->add( 'wts_customize', esc_html__( 'Value for "Footer Menu Two Visibility" must either be "Yes" or "No"!', 'wts' ) );
            }

            return $validity;
        }

        /**
         * Handle active_callback arguement for WP_Customize_Manager::add_control()
         *
         * @access public
         * @return bool
         * @since 1.0.0
         */
        public function wts_footer_menu_2_active_control_active_cb() : bool
        {
            return is_page();
        }
    }
}