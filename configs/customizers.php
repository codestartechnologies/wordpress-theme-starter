<?php
/**
 * This file contains configuration settings for registering customizer sections, settings and controls
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

return array(
    /**
     * Initial values to create "WordPress Theme Starter - Footer Menu Two" customizer section.
     */
    'wts_customizer'  => array(

        'sections'  => array(

            array(

                'id'    => 'wts_footer_menu_2_section',

                'args'  => array(

                    'title'                 => esc_html__( 'WordPress Theme Starter - Footer Menu Two', 'wts' ),

                    'description'           => esc_html__( 'Section for customizing "Footer Menu Two" on all pages.', 'wts' ),

                    'active_callback'       => 'wts_footer_menu_2_section_cb',

                    'description_hidden'    => false,
                ),
            ),
        ),

        'settings'  => array(

            array(

                'id'    => 'wts_footer_menu_2_active',

                'args'  => array(

                    'default'           => 'yes',

                    'transport'         => 'refresh', //postMessage

                    'validate_callback' => 'wts_footer_menu_2_active_validate_callback',

                    'sanitize_callback' => 'sanitize_text_field',
                ),
            ),
        ),

        'controls'  => array(

            array(

                'id'    => 'wts_footer_menu_2_active_control',

                'args'  => array(

                    'settings'          => 'wts_footer_menu_2_active',

                    'section'           => 'wts_footer_menu_2_section',

                    'label'             => esc_html__( 'Footer Menu Two Visibility', 'wts' ),

                    'description'       => esc_html__( 'Choose the visibility of "Footer Menu Two" nav menu on all pages".', 'wts' ),

                    'choices'           => array(

                        'yes'   => esc_html__( 'Yes (Make Visible)', 'wts' ),

                        'no'    => esc_html__( 'No (Hide on all pages)', 'wts' ),
                    ),

                    'type'              => 'select',

                    'active_callback'   => 'wts_footer_menu_2_active_control_active_cb',
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
);
