<?php
/**
 * Sidebar abstract class file.
 *
 * This file contains Sidebar abstract class which contains contracts for classes that will create theme sidebar areas.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Sidebar' ) ) {
    /**
     * Class Sidebar
     *
     * This class contains contracts that will be used to create theme sidebars.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    abstract class Sidebar implements ActionHooks {
        /**
         * The name or title of the sidebar displayed in the Widgets interface.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $name;

        /**
         * The unique identifier by which the sidebar will be called.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $id;

        /**
         * Description of the sidebar, displayed in the Widgets interface.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $description;

        /**
         * Extra CSS class to assign to the sidebar in the Widgets interface.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $class;

        /**
         * HTML content to prepend to each widget's HTML output when assigned to this sidebar.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $before_widget;

        /**
         * HTML content to append to each widget's HTML output when assigned to this sidebar.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $after_widget;

        /**
         * HTML content to prepend to the sidebar title when displayed.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $before_title;

        /**
         * HTML content to append to the sidebar title when displayed.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $after_title;

        /**
         * HTML content to prepend to the sidebar when displayed.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $before_sidebar;

        /**
         * HTML content to append to the sidebar when displayed.
         *
         * @access protected
         * @var string
         * @since 1.0.0
         */
        protected string $after_sidebar;

        /**
         * Sidebar constructor
         *
         * @access public
         * @param array $parameters
         * @return void
         * @since 1.0.0
         */
        public function __construct( array $parameters )
        {
            $this->name             = $parameters['name'];
            $this->id               = $parameters['id'];
            $this->description      = $parameters['description'];
            $this->class            = $parameters['class'];
            $this->before_widget    = $parameters['before_widget'];
            $this->after_widget     = $parameters['after_widget'];
            $this->before_title     = $parameters['before_title'];
            $this->after_title      = $parameters['after_title'];
            $this->before_sidebar   = $parameters['before_sidebar'];
            $this->after_sidebar    = $parameters['after_sidebar'];
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
            add_action( 'widgets_init', array( $this, 'sidebar' ) );
        }

        /**
         * "widgets_init" action callback
         *
         * @access public
         * @final
         * @return void
         * @since 1.0.0
         */
        final public function sidebar() : void
        {
            register_sidebar( array(
                'name'              => $this->name,
                'id'                => $this->id,
                'description'       => $this->description,
                'before_widget'     => $this->before_widget,
                'after_widget'      => $this->after_widget,
                'before_title'      => $this->before_title,
                'after_title'       => $this->after_title,
                'before_sidebar'    => $this->before_sidebar,
                'after_sidebar'     => $this->after_sidebar,
            ) );
        }
    }
}
