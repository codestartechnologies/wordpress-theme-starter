<?php
/**
 * Customizer abstract class file.
 *
 * This file contains Customizer abstract class which contains contracts for creating customizer sections, settings and controls.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;
use WP_Customize_Media_Control;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Customizer
 *
 * This class contains contracts that will be used to create customizer sections, settings, and controls.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
abstract class Customizer implements ActionHooks
{
    /**
     * An array of multiple WP_Customize_Manager::add_section() parameters
     *
     * @access protected
     * @var array
     * @since 1.0.0
     */
    protected array $sections;

    /**
     * An array of multiple WP_Customize_Manager::add_setting() parameters
     *
     * @access protected
     * @var array
     * @since 1.0.0
     */
    protected array $settings;

    /**
     * An array of multiple WP_Customize_Manager::add_control() parameters
     *
     * @access protected
     * @var array
     * @since 1.0.0
     */
    protected array $controls;

    /**
     * Customizer constructor
     *
     * @access public
     * @param array $parameters     Initial arguements for WP_Customize_Manager::add_section(), WP_Customize_Manager::add_setting(), and WP_Customize_Manager::add_control()
     * @return void
     * @since 1.0.0
     */
    public function __construct( array $parameters )
    {
        $this->sections = $parameters['sections'];
        $this->settings = $parameters['settings'];
        $this->controls = $parameters['controls'];
    }

    /**
     * Register add_action() and remove_action().
     *
     * @access public
     * @final
     * @return void
     * @since 1.0.0
     */
    final public function register_actions() : void
    {
        add_action( 'customize_register', array( $this, 'register_customizer' ) );
    }

    /**
     * "customize_register" action hook callback
     *
     * @access public
     * @final
     * @param \WP_Customize_Manager $manager
     * @return void
     * @since 1.0.0
     */
    final public function register_customizer( \WP_Customize_Manager $manager ) : void
    {
        $this->add_sections( $manager );
        $this->add_settings( $manager );
        $this->add_controls( $manager );
    }

    /**
     * Registers Customizer sections
     *
     * @access private
     * @param \WP_Customize_Manager $manager
     * @return void
     * @since 1.0.0
     */
    private function add_sections( \WP_Customize_Manager $manager ) : void
    {
        if ( ! empty( $this->sections ) ) {
            foreach ( $this->sections as $section ) {
                $section_args = $this->get_args_with_cb( $section, 'active_callback' );
                $args = wp_parse_args( $section_args, $this->get_default_section_args() );
                if ( empty( $args['theme_supports'] ) ) unset( $args['theme_supports'] );
                $manager->add_section( $section['id'], $args );
            }
        }
    }

    /**
     * Registers Customizer settings
     *
     * @access private
     * @param \WP_Customize_Manager $manager
     * @return void
     * @since 1.0.0
     */
    private function add_settings( \WP_Customize_Manager $manager ) : void
    {
        if ( ! empty( $this->settings ) ) {
            foreach ( $this->settings as $setting ) {
                $setting_args = $this->get_args_with_cb( $setting, 'validate_callback' );
                $args = wp_parse_args( $setting_args, $this->get_default_setting_arg() );
                if ( empty( $args['validate_callback'] ) ) unset( $args['validate_callback'] );
                if ( empty( $args['sanitize_callback'] ) ) unset( $args['sanitize_callback'] );
                if ( empty( $args['theme_supports'] ) ) unset( $args['theme_supports'] );
                $manager->add_setting( $setting['id'], $args );
            }
        }
    }

    /**
     * Registers Customizer controls
     *
     * @access private
     * @param \WP_Customize_Manager $manager
     * @return void
     * @since 1.0.0
     */
    private function add_controls( \WP_Customize_Manager $manager ) : void
    {
        if ( ! empty( $this->controls ) ) {
            foreach ( $this->controls as $control ) {
                $control_args = $this->get_args_with_cb( $control, 'active_callback' );
                $customizer_control = isset( $control['control_customizer'] ) ?: '';

                switch ( $customizer_control ) {
                    case 'media_control':
                        $args = wp_parse_args( $control_args, $this->get_default_media_control_arg() );
                        $manager->add_control( new WP_Customize_Media_Control( $manager, $control['id'], $args ) );
                        break;
                    default:
                        $args = wp_parse_args( $control_args, $this->get_default_control_arg() );
                        $manager->add_control( $control['id'], $args );
                }
            }
        }
    }

    /**
     * Handle callback arguements for sections, settings, and controls
     *
     * @access private
     * @param array $setting
     * @param string $callback
     * @return array
     * @since 1.0.0
     */
    private function get_args_with_cb( array $setting, string $callback ) : array
    {
        if ( isset( $setting['args'][ $callback ] ) && ! empty( $setting['args'][ $callback ] ) ) {
            $setting['args'][ $callback ] = ( is_callable( $setting['args'][ $callback ] ) )
                ? $setting['args'][ $callback ]
                : array( $this, $setting['args'][ $callback ] );
        }

        return $setting['args'];
    }

    /**
     * Default arguements for WP_Customize_Manager::add_section()
     *
     * @access private
     * @return array
     * @since 1.0.0
     */
    private function get_default_section_args() : array
    {
        return array(
            'priority'              => 160,
            'panel'                 => '',
            'capability'            => 'edit_theme_options',
            'theme_supports'        => array(),
            'title'                 => '',
            'description'           => '',
            'type'                  => '',
            'active_callback'       => '',
            'description_hidden'    => false,
        );
    }

    /**
     * Default arguements for WP_Customize_Manager::add_setting()
     *
     * @access private
     * @return array
     * @since 1.0.0
     */
    private function get_default_setting_arg() : array
    {
        return array(
            'type'                  => 'theme_mod',
            'capability'            => 'edit_theme_options',
            'theme_supports'        => array(),
            'default'               => '',
            'transport'             => 'refresh',
            'validate_callback'     => '',
            'sanitize_callback'     => '',
        );
    }

    /**
     * Default arguements for WP_Customize_Manager::add_control()
     *
     * @access private
     * @return array
     * @since 1.0.0
     */
    private function get_default_control_arg() : array
    {
        return array(
            'instance_number'   => 1,
            'manager'           => \WP_Customize_Manager::class,
            'id'                => '',
            'settings'          => '',
            'capability'        => '',
            'priority'          => 10,
            'section'           => '',
            'label'             => '',
            'description'       => '',
            'choices'           => array(),
            'input_attrs'       => array(),
            'allow_addition'    => false,
            'type'              => 'text',
            'active_callback'   => '',
        );
    }

    /**
     * Default arguements for WP_Customize_Manager::add_control() that uses WP_Customize_Media_Control class
     *
     * @access private
     * @return array
     * @since 1.0.0
     */
    private function get_default_media_control_arg() : array
    {
        return array(
            'settings'          => '',
            'capability'        => '',
            'section'           => '',
            'label'             => '',
            'description'       => '',
            'active_callback'   => '',
        );
    }
}