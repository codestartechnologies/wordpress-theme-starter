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

    /**
     * Initial values to create "WordPress Theme Starter" customizer section.
     */

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

                    'transport'         => 'refresh', //postMessage

                    'validate_callback' => 'wts_footer_text_validate_callback',

                    'sanitize_callback' => 'sanitize_text_field',
                ),
            ),

            array(

                'id'    => 'wts_404_page_text',

                'args'  => array(

                    'default'           => esc_html__( 'This is an error page.', 'wts' ),

                    'transport'         => 'refresh', //postMessage

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

            /**
             * Other control configuration setttings are listed below
             *
             */

            /**
             * Media control
            */
            array(

                'id'    => '',

                'args'  => array(

                    'settings'          => '',

                    'section'           => '',

                    'label'             => '',

                    'description'       => '',

                    'active_callback'   => '',

                    'mime_type'         => 'image',
                ),

                'control_customizer'    => 'media_control',
            ),

            /**
             * Checkbox control
             */
            array(

                'id'    => '',

                'args'  => array(

                    'settings'          => '',

                    'section'           => '',

                    'label'             => '',

                    'type'              => 'checkbox',

                    'active_callback'   => '',
                ),
            ),

            /**
             * Number control
             */
            array(

                'id'    => '',

                'args'  => array(

                    'settings'          => '',

                    'section'           => '',

                    'label'             => '',

                    'description'       => '',

                    'type'              => 'number',

                    'active_callback'   => '',
                ),
            ),

            /**
             * Text control
             */
            array(

                'id'    => '',

                'args'  => array(

                    'settings'          => '',

                    'section'           => '',

                    'label'             => '',

                    'input_attrs'       => array(

                        'placeholder'   => '',
                    ),

                    'type'              => 'text',

                    'active_callback'   => '',
                ),
            ),

            /**
             * Textarea control
             */
            array(

                'id'    => '',

                'args'  => array(

                    'settings'          => '',

                    'section'           => '',

                    'label'             => '',

                    'type'              => 'textarea',

                    'active_callback'   => '',
                ),
            ),

            /**
             * URL control
             */
            array(

                'id'    => '',

                'args'  => array(

                    'settings'          => '',

                    'section'           => '',

                    'label'             => '',

                    'type'              => 'url',

                    'input_attrs'       => array(

                        'placeholder'   => 'https://',
                    ),

                    'active_callback'   => '',
                ),
            ),

            /**
             * Email control
             */
            array(

                'id'    => '',

                'args'  => array(

                    'settings'          => '',

                    'section'           => '',

                    'label'             => '',

                    'input_attrs'       => array(

                        'placeholder'   => '',
                    ),

                    'type'              => 'email',

                    'active_callback'   => '',
                ),
            ),
        ),
    ),

    /**
     * Add your custom customizer configuration settings below
     */

);