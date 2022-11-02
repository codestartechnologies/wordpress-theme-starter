<?php
/**
 * WTSWidget class file.
 *
 * This is an example class file for registering theme widgets.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace App\Public\Widgets;

use WP_Widget;

if ( ! class_exists( 'WTSWidget' ) ) {
    /**
     * WTSWidget Class
     *
     * @package     WordpressThemeStarter
     * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class WTSWidget extends WP_Widget
    {

        /**
         * Widget ID
         * @since 1.0.0
         */
        public const ID_BASE = 'wts_widget';

        /**
         * Widget Name
         * @since 1.0.0
         */
        public const NAME = 'WordPress Theme Starter Widget';

        /**
         * Support for wordpress versions less than 5.8
         *
         * @var boolean
         * @since 1.0.0
         */
        public $show_instance_in_rest = true;

        /**
         * Widget constructor
         *
         * Register widget with WordPress.
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function __construct()
        {
            parent::__construct(
                self::ID_BASE,
                sprintf( __( '%s' ), self::NAME ),
                array(
                    'description'                   => __( 'A demo widget' ),
                    'customize_selective_refresh'   => true,
                    'show_instance_in_rest'         => true,
                )
            );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         * @access public
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         * @return void
         * @since 1.0.0
         */
        public function widget( $args, $instance )
        {
            $instance = wp_parse_args( (array) $instance, array(
                'title' => null,
            ) );

            ob_start();

            echo $args['before_widget'];

            if ( $instance['title'] ) {
                echo $args['before_title'] . $instance['title'] . $args['after_title'];
            }

            // load widget view
            get_template_part( 'template-parts/widgets/wts-widget', null, array() );

            echo $args['after_widget'];

            echo ob_get_clean();
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         * @access public
         * @param array $instance Previously saved values from database.
         * @return void
         * @since 1.0.0
         */
        public function form( $instance )
        {
            $instance = wp_parse_args( (array) $instance, array(
                'title' => sprintf( __( '%s' ), self::NAME ),
            ) );

            ob_start();

            printf(
                '
                    <p>
                        <label for="%1$s"> %4$s </label>
                        <input type="text" class="widefat" id="%1$s" name="%2$s" value="%3$s" />
                    </p>
                ',
                $this->get_field_id( 'title' ),
                $this->get_field_name( 'title' ),
                esc_attr( $instance['title'] ),
                esc_html__( 'Title:' ),
            );

            echo ob_get_clean();
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         * @access public
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         * @return void
         * @since 1.0.0
         */
        public function update( $new_instance, $old_instance )
        {
            $instance = $old_instance;
            $new_instance = wp_parse_args( (array) $new_instance, array(
                'title' => sprintf( __( '%s' ), self::NAME ),
            ) );

            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            return $instance;
        }
    }
}
