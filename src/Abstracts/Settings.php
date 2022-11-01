<?php
/**
 * Settings abstract class file.
 *
 * This file contains Settings abstract class which contains contracts for classes that will register settings, setting sections and
 * setting fields.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link        https://codestar.com.ng
 * @since       1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Settings' ) ) {
    /**
     * Class Settings
     *
     * This class contains contracts for classes that will register settings, setting sections and setting fields.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    abstract class Settings implements ActionHooks {
        /**
         * parameters for add_settings_section()
         *
         * @access protected
         * @var array
         * @since 1.0.0
         */
        protected array $section;

        /**
         * An array of multiple register_setting() parameters
         *
         * @access protected
         * @var array
         * @since 1.0.0
         */
        protected array $settings;

        /**
         * An array of multiple add_settings_field() parameters
         *
         * @access protected
         * @var array
         * @since 1.0.0
         */
        protected array $fields;

        /**
         * Settings constructor
         *
         * @access public
         * @param array $parameters     An array of parameters for register_setting(), add_settings_section(), and add_settings_field().
         * @since 1.0.0
         */
        public function __construct( array $parameters )
        {
            $this->section = $parameters['section'];
            $this->settings = $parameters['settings'];
            $this->fields = $parameters['fields'];
        }

        /**
         * Register add_action() and remove_action().
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function register_actions(): void
        {
            add_action( 'admin_init', array( $this, 'settings_page' ) );
            add_action( 'rest_api_init', array( $this, 'settings_page' ) );
            $this->action_update_settings();
        }

        /**
         * "admin_init" action hook callback
         *
         * Fires as an admin screen or script is being initialized.
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function settings_page() : void
        {
            $this->init_section();
            $this->init_settings();
            $this->init_fields();
        }

        /**
         * Adds callback methods that will run when settings are updated
         *
         * @access private
         * @return void
         * @since 1.0.0
         */
        private function action_update_settings() : void
        {
            if ( ! empty( $this->settings ) ) {
                foreach ( $this->settings as $setting_key => $setting ) {
                    if ( isset( $setting['update_cb'] ) && method_exists( $this, $setting['update_cb'] ) ) {
                        add_action( "update_option_{$setting['option_name']}", array( $this, $setting['update_cb'] ), 10, 3 );
                    }
                }
            }
        }

        /**
         * Registers a setting section
         *
         * @access private
         * @return void
         * @since 1.0.0
         */
        private function init_section() : void
        {
            add_settings_section(
                $this->section['id'],
                $this->section['title'],
                array( $this, 'section_cb' ),
                $this->section['page']
            );
        }

        /**
         * Registers multiple settings
         *
         * @access private
         * @return void
         * @since 1.0.0
         */
        private function init_settings() : void
        {
            if ( ! empty( $this->settings ) ) {
                foreach ( $this->settings as $setting_key => $setting ) {
                    $args = wp_parse_args( $setting['args'], $this->default_args_for_register_setting() );
                    register_setting(
                        $this->section['page'],
                        $setting['option_name'],
                        $args
                    );
                }
            }
        }

        /**
         * Registers multiple setting fields
         *
         * @access private
         * @return void
         * @since 1.0.0
         */
        private function init_fields() : void
        {
            if ( ! empty( $this->fields ) ) {
                foreach ( $this->fields as $field ) {
                    $args = array(
                        'label_for'     => $field['id'],
                        'option_name'   => $this->settings[ $field['setting_key'] ]['option_name'],
                    );
                    add_settings_field(
                        $field['id'],
                        $field['title'],
                        array( $this, $field['callback'] ),
                        $this->section['page'],
                        $this->section['id'],
                        $args
                    );
                }
            }
        }

        /**
         * Default arguements passed to register_setting()
         *
         * @access private
         * @return array
         * @since 1.0.0
         */
        private function default_args_for_register_setting() : array
        {
            return array(
                'type'                  => 'string',
                'description'           => '',
                'sanitize_callback'     => null,
                'show_in_rest'          => true,
                'default'               => null,
            );
        }
    }
}