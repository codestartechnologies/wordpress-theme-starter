<?php
/**
 * WTSSettings class file
 *
 * This is an example class file for creating settings, settings sections, and setting fields.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace App\Admin\Settings;

use Codestartechnologies\WordpressThemeStarter\Abstracts\Settings as AbstractsSettings;
use Codestartechnologies\WordpressThemeStarter\Traits\PageViewLoader;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WTSSettings' ) ) {
    /**
     * WTSSettings Class
     *
     * This is an example class file for classes that need to register settings, settings sections, and setting fields. This class must define
     * section_cb(), along with callback methods that will be passed to add_settings_field() and register_settings(). It can also define a callback
     * methods that will run when settings are updated.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class WTSSettings extends AbstractsSettings {
        use PageViewLoader;

        /**
         * WTSSettings Constructor
         *
         * @access public
         * @param array $parameters     An array of parameters for register_setting(), add_settings_section(), and add_settings_field().
         * @since 1.0.0
         */
        public function __construct( array $parameters )
        {
            parent::__construct( $parameters );
        }

        /**
         * Callback method for add_settings_section()
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function section_cb(): void
        {
            //
        }

        /**
         * Callback method for add_settings_field()
         *
         * @access public
         * @param array $args   An array of arguements passed to add_settings_field()
         * @return void
         */
        public function show_sidebar_field_cb( array $args ) : void
        {
            $this->load_view( 'setting-fields.sidebar-active', $args );
        }

        /**
         * Callback method for add_settings_field()
         *
         * @access public
         * @param array $args   An array of arguements passed to add_settings_field()
         * @return void
         */
        public function display_page_field_cb( array $args ) : void
        {
            $this->load_view( 'setting-fields.sidebar-page', $args );
        }

        /**
         * Callback method for updating a setting
         *
         * Fires after the value of a specific option has been successfully updated.
         *
         * @access public
         * @param mixed  $old_value The old option value.
         * @param mixed  $value     The new option value.
         * @param string $option    Option name.
         * @return void
         * @since 1.0.0
         */
        public function update_sidebar_page_setting_cb( $old_value, $value, string $option ) : void
        {
            //
        }
    }
}