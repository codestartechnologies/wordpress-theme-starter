<?php
/**
 * This file contains configuration settings for registering customizer sections, settings and controls.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

return array(

    // Config values for WTSCustomizer::class.

    'wts_customizer'  => array(

        'sections'  => array(

            array(

                'id'    => 'wts_section',

                'args'  => array(

                    'title'                 => esc_html__( 'WordPress Theme Starter', 'wts' ),

                    'description'           => esc_html__( 'Section for customizing "WordPress Theme Starter".', 'wts' ),

                    'active_callback'       => 'wts_section_callback',

                    'description_hidden'    => false,
                ),
            ),
        ),

        'settings'  => array(

            array(

                'id'    => 'wts_footer_text',

                'args'  => array(

                    'default'           => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus alias fuga quia laborum provident a odit cum neque sequi quibusdam praesentium ad reprehenderit rem amet laudantium iste, ut obcaecati impedit.',

                    'transport'         => 'refresh', // or postMessage

                    'validate_callback' => 'wts_footer_text_validate_callback',

                    'sanitize_callback' => 'sanitize_text_field',
                ),
            ),

            array(

                'id'    => 'wts_404_page_text',

                'args'  => array(

                    'default'           => esc_html__( 'This is an error page.', 'wts' ),

                    'transport'         => 'refresh', // or postMessage

                    'validate_callback' => 'wts_footer_text_validate_callback',

                    'sanitize_callback' => 'sanitize_text_field',
                ),
            ),
        ),

        'controls'  => array(

            array(

                'id'    => 'wts_footer_text_control',

                'args'  => array(

                    'settings'          => 'wts_footer_text',

                    'section'           => 'wts_section',

                    'label'             => esc_html__( 'Footer Text', 'wts' ),

                    'type'              => 'textarea',

                    'active_callback'   => 'wts_footer_text_control_active_callback',
                ),
            ),

            array(

                'id'    => 'wts_404_page_text_control',

                'args'  => array(

                    'settings'          => 'wts_404_page_text',

                    'section'           => 'wts_section',

                    'label'             => esc_html__( '404 Page Text', 'wts' ),

                    'type'              => 'textarea',

                    'active_callback'   => 'wts_404_page_text_control_active_callback',
                ),
            ),

        ),
    ),

    /**
     * To enable you create configurations for your customizer class more quickly, we've added a list of supported customizer control types
     * in Wordpress.
     *
     */

    /*

    1. Media control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'description'       => esc_html__( '', 'wts' ),
            'active_callback'   => '',
            'mime_type'         => '', // e.g image
        ),
        'control_customizer'    => 'media_control',
    ),

    2. Checkbox control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'type'              => 'checkbox',
            'active_callback'   => '',
        ),
    ),

    3. Number control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'description'       => esc_html__( '', 'wts' ),
            'type'              => 'number',
            'active_callback'   => '',
        ),
    ),

    4. Text control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'input_attrs'       => array(
                'placeholder'   => esc_html__( '', 'wts' ),
            ),
            'type'              => 'text',
            'active_callback'   => '',
        ),
    ),

    5. Textarea control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'type'              => 'textarea',
            'active_callback'   => '',
        ),
    ),

    6. URL control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'type'              => 'url',
            'input_attrs'       => array(
                'placeholder'   => esc_html__( 'https:// or http://', 'wts' ),
            ),
            'active_callback'   => '',
        ),
    ),

    7. Email control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'input_attrs'       => array(
                'placeholder'   => esc_html__( '', 'wts' ),
            ),
            'type'              => 'email',
            'active_callback'   => '',
        ),
    ),

    8. Select control

    array(
        'id'    => '',
        'args'  => array(
            'settings'          => '',
            'section'           => '',
            'label'             => esc_html__( '', 'wts' ),
            'description'       => esc_html__( '', 'wts' ),
            'choices'           => array(
                'choice_one' => esc_html__( 'Choice One', 'wts' ),
                'choice_two' => esc_html__( 'Choice Two', 'wts' ),
            ),
            'type'              => 'select',
        ),
    ),

    */

    /**
     * You can add your custom customizer configuration settings below
     */

);