<?php
/**
 * Hooks class file.
 *
 * This file contains Hooks class which handles WordPress hooks in Your theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Helpers;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;
use Codestartechnologies\WordpressThemeStarter\Interfaces\FilterHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Hooks class
 *
 * This class contains methods for handling WordPress hooks in Your theme.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
class Hooks implements ActionHooks, FilterHooks
{
    /**
     * Register add_action() and remove_action().
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function register_actions() : void
    {
        /**
         * This hook is called during each page load, after the theme is initialized.
         * It is generally used to perform basic setup, registration, and init actions for a theme.
         *
         */
        add_action('after_setup_theme', array( $this, 'action_after_setup_theme' ) );

        /**
         * Fires after the theme is switched.
         */
        add_action( 'switch_theme', array( $this, 'action_switch_theme' ), 10, 3 );

        /**
         * Enqueue scripts for all admin pages.
         */
        add_action( 'admin_enqueue_scripts', array( $this, 'action_admin_enqueue_scripts' ) );

        /**
         * Fires when scripts and styles are enqueued.
         * Used when enqueuing scripts and styles that are meant to appear on the front end.
         */
        add_action( 'wp_enqueue_scripts', array( $this, 'action_wp_enqueue_scripts' ) );

        /**
         * Triggered after the opening body tag.
         */
        add_action( 'wp_body_open', array( $this, 'action_wp_body_open' ) );

        /**
         * Fires once the Customizer preview has initialized and JavaScript settings have been printed.
         *
         */
        add_action( 'customize_preview_init', array( $this, 'action_customize_preview_init' ) );

        /**
         * Fires at the top of the comment form, inside the form tag.
         */
        add_action( 'comment_form_top', array( $this, 'action_comment_form_top' ) );

        /**
         * Fires at the bottom of the comment form, inside the closing form tag.
         */
        add_action( 'comment_form', array( $this, 'action_comment_form' ) );

        /**
         * Fires after the comment form.
         */
        add_action( 'comment_form_after', array( $this, 'action_comment_form_after' ) );

        /**
         * Fires before the comment form.
         */
        add_action( 'comment_form_before', array( $this, 'action_comment_form_before' ) );
    }

    /**
     * Register add_filter() and remove_filter().
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function register_filters() : void
    {
        /**
         * Filters the arguments used to display a navigation menu.
         */
        add_filter( 'wp_nav_menu_args', array( $this, 'filter_wp_nav_menu_args' ) );

        /**
         * Filters the CSS classes applied to a menu item's list item element.
         */
        add_filter( 'nav_menu_css_class', array( $this, 'filter_nav_menu_css_class' ), 10, 4 );

        /**
         * Filters the CSS class(es) applied to a menu list element.
         */
        add_filter( 'nav_menu_submenu_css_class', array( $this, 'filter_nav_menu_submenu_css_class' ), 10, 3 );

        /**
         * Filters the arguments for a single nav menu item.
         */
        add_filter( 'nav_menu_item_args', array( $this, 'filter_nav_menu_item_args' ), 10, 3 );

        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         */
        add_filter( 'nav_menu_link_attributes', array( $this, 'filter_nav_menu_link_attributes' ), 10, 4 );

        /**
         * Filters the displayed post excerpt.
         */
        add_filter( 'the_excerpt', array( $this, 'filter_the_excerpt' ) );

        /**
         * Filters the retrieved post excerpt.
         */
        add_filter( 'get_the_excerpt', array( $this, 'filter_get_the_excerpt' ), 10, 2 );

        /**
         * Filters the comment form default arguments.
         */
        add_filter( 'comment_form_defaults', array( $this, 'filter_comment_form_defaults' ) );

        /**
         * Filters the cancel comment reply link HTML.
         */
        add_filter( 'cancel_comment_reply_link', array( $this, 'filter_cancel_comment_reply_link' ), 10, 3 );

        /**
         * Filters the comment form fields, including the textarea.
         */
        add_filter( 'comment_form_fields', array( $this, 'filter_comment_form_fields' ) );

        /**
         * Filters the submit field for the comment form to display.
         */
        add_filter( 'comment_form_submit_field', array( $this, 'filter_comment_form_submit_field' ), 10, 2 );

        /**
         * Filters the arguments used in retrieving the comment list.
         */
        add_filter( 'wp_list_comments_args', array( $this, 'filter_wp_list_comments_args' ) );
    }

    /**
     * "after_setup_theme" action hook callback
     *
     * Sets up theme defaults and registers support for various wordpress features.
     * Loads theme text domain and register nav menus.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function action_after_setup_theme() : void
    {
        do_action( 'wts_after_setup_theme' );
    }

    /**
     * "switch_theme" action hook callback
     *
     * Fires after the theme is switched.
     *
     * @access public
     * @param string    $new_name  Name of the new theme.
     * @param \WP_Theme $new_theme WP_Theme instance of the new theme.
     * @param \WP_Theme $old_theme WP_Theme instance of the old theme.
     * @return void
     * @since 1.0.0
     */
    public function action_switch_theme( string $new_name, \WP_Theme $new_theme, \WP_Theme $old_theme ) : void
    {
        do_action( 'wts_switch_theme', $new_name, $new_theme, $old_theme );
    }

    /**
     * "admin_enqueue_scripts" action hook callback
     *
     * Enqueue scripts in admin pages.
     *
     * @access public
     * @param string $hook_suffix The current admin page.
     * @return void
     * @since 1.0.0
     */
    public function action_admin_enqueue_scripts( string $hook_suffix ) : void
    {
        do_action( 'wts_admin_enqueue_scripts', $hook_suffix );
    }

    /**
     * "wp_enqueue_scripts" action hook callback
     *
     * Fires when scripts and styles are enqueued.
     * Used when enqueuing scripts and styles that are meant to appear on the front end.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function action_wp_enqueue_scripts() : void
    {
        do_action( 'wts_wp_enqueue_scripts' );
    }

    /**
     * "wp_body_open" action hook callback
     *
     * Triggered after the opening body tag.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function action_wp_body_open() : void
    {
        do_action( 'wts_wp_body_open' );
    }

    /**
     * "customize_preview_init" action hook callback
     *
     * Fires once the Customizer preview has initialized and JavaScript settings have been printed.
     *
     * @access public
     * @param \WP_Customize_Manager $manager
     * @return void
     * @since 1.0.0
     */
    public function action_customize_preview_init( \WP_Customize_Manager $manager ) : void
    {
        do_action( 'wts_customize_preview_init', $manager );
    }

    /**
     * "comment_form_top" action hook callback
     *
     * Fires at the top of the comment form, inside the form tag.
     *
     * @access public
     * @since 1.0.0
     */
    public function action_comment_form_top() : void
    {
        do_action( 'wts_comment_form_top' );
    }

    /**
     * "comment_form" action hook callback
     *
     * Fires at the bottom of the comment form, inside the closing form tag.
     *
     * @access public
     * @param int $post_id The post ID.
     * @since 1.0.0
     */
    public function action_comment_form( int $post_id ) : void
    {
        do_action( 'wts_comment_form', $post_id );
    }

    /**
     * "comment_form_after" action hook callback
     *
     * Fires after the comment form.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function action_comment_form_after() : void
    {
        do_action( 'wts_comment_form_after' );
    }

    /**
     * "comment_form_before" action hook callback
     *
     * Fires before the comment form.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function action_comment_form_before() : void
    {
        do_action( 'wts_comment_form_before' );
    }

    /**
     * "wp_nav_menu_args" filter hook callback
     *
     * Filters the arguments used to display a navigation menu.
     *
     * @access public
     * @param array $args
     * @return array
     * @since 1.0.0
     */
    public function filter_wp_nav_menu_args( array $args ) : array
    {
        return apply_filters( 'wts_wp_nav_menu_args', $args );
    }

    /**
     * "nav_menu_css_class" filter hook callback
     *
     * Filters the CSS classes applied to a menu item's list item element
     *
     * @access public
     * @param array $classes
     * @param \WP_Post $menu_item
     * @param object $args
     * @param integer $depth
     * @return array
     * @since 1.0.0
     */
    public function filter_nav_menu_css_class( array $classes, \WP_Post $menu_item, object $args, int $depth ) : array
    {
        return apply_filters( 'wts_nav_menu_css_class', $classes, $menu_item, $args, $depth );
    }

    /**
     * "nav_menu_submenu_css_class" filter hook callback
     *
     * Filters the CSS class(es) applied to a menu list element.
     *
     * @access public
     * @param string[]  $classes Array of the CSS classes that are applied to the menu <code>&lt;ul&gt;</code> element.
     * @param \stdClass $args    An object of <code>wp_nav_menu()</code> arguments.
     * @param int       $depth   Depth of menu item. Used for padding.
     * @return string[] Array of the CSS classes that are applied to the menu <code>&lt;ul&gt;</code> element.
     * @since 1.0.0
     */
    public function filter_nav_menu_submenu_css_class( array $classes, object $args, int $depth ) : array
    {
        return apply_filters( 'wts_nav_menu_submenu_css_class', $classes, $args, $depth );
    }

    /**
     * "nav_menu_item_args" filter hook callback
     *
     * Filters the arguments for a single nav menu item.
     *
     * @access public
     * @param \stdClass $args      An object of wp_nav_menu() arguments.
     * @param \WP_Post  $menu_item Menu item data object.
     * @param int       $depth     Depth of menu item. Used for padding.
     * @return \stdClass An object of wp_nav_menu() arguments.
     * @since 1.0.0
     */
    public function filter_nav_menu_item_args( object $args, \WP_Post $menu_item, int $depth ) : object
    {
        return apply_filters( 'wts_nav_menu_item_args', $args, $menu_item, $depth );
    }

    /**
     * "nav_menu_link_attributes" filter hook callback
     *
     * Filters the HTML attributes applied to a menu item's anchor element
     *
     * @access public
     * @param array $atts
     * @param \WP_Post $menu_item
     * @param object $args
     * @param integer $depth
     * @return array
     * @since 1.0.0
     */
    public function filter_nav_menu_link_attributes( array $atts, \WP_Post $menu_item, object $args, int $depth ) : array
    {
        return apply_filters( 'wts_nav_menu_link_attributes', $atts, $menu_item, $args, $depth );
    }

    /**
     * "the_excerpt" filter hook callback
     *
     * Filters the displayed post excerpt.
     *
     * @access public
     * @param string $post_excerpt
     * @return string
     * @since 1.0.0
     */
    public function filter_the_excerpt( string $post_excerpt ) : string
    {
        return apply_filters( 'wts_the_excerpt', $post_excerpt );
    }

    /**
     * "get_the_excerpt" filter hook callback
     *
     * Filters the retrieved post excerpt.
     *
     * @access public
     * @param string   $post_excerpt The post excerpt.
     * @param \WP_Post $post         Post object.
     * @return string The post excerpt.
     * @since 1.0.0
     */
    public function filter_get_the_excerpt( string $post_excerpt, \WP_Post $post ) : string
    {
        return apply_filters( 'wts_get_the_excerpt', $post_excerpt, $post );
    }

    /**
     * "comment_form_defaults" filter hook callback
     *
     * Filters the comment form default arguments.
     *
     * @access public
     * @param array $defaults The default comment form arguments.
     * @return array The default comment form arguments.
     * @since 1.0.0
     */
    public function filter_comment_form_defaults( array $defaults ) : array
    {
        return apply_filters( 'wts_comment_form_defaults', $defaults );
    }

    /**
     * "cancel_comment_reply_link" filter hook callback
     *
     * Filters the cancel comment reply link HTML.
     *
     * @access public
     * @param string $formatted_link The HTML-formatted cancel comment reply link.
     * @param string $link           Cancel comment reply link URL.
     * @param string $text           Cancel comment reply link text.
     * @return string The HTML-formatted cancel comment reply link.
     * @since 1.0.0
     */
    public function filter_cancel_comment_reply_link( string $formatted_link, string $link, string $text ) : string
    {
        return apply_filters( 'wts_cancel_comment_reply_link', $formatted_link, $link, $text );
    }

    /**
     * "comment_form_fields" filter hook callback
     *
     * Filters the comment form fields, including the textarea.
     *
     * @access public
     * @param array $comment_fields The comment fields.
     * @return array The comment fields.
     * @since 1.0.0
     */
    public function filter_comment_form_fields( array $comment_fields ) : array
    {
        return apply_filters( 'wts_comment_form_fields', $comment_fields );
    }

    /**
     * "comment_form_submit_field" filter hook callback
     *
     * Filters the submit field for the comment form to display.
     *
     * @access public
     * @param string $submit_field HTML markup for the submit field.
     * @param array  $args         Arguments passed to comment_form().
     * @return string HTML markup for the submit field.
     * @since 1.0.0
     */
    public function filter_comment_form_submit_field( string $submit_field, array $args ) : string
    {
        return apply_filters( 'wts_comment_form_submit_field', $submit_field, $args );
    }

    /**
     * "wp_list_comments_args" filter hook callback
     *
     * Filters the arguments used in retrieving the comment list.
     *
     * @access public
     * @param array $parsed_args An array of arguments for displaying comments.
     * @return array An array of arguments for displaying comments.
     * @since 1.0.0
     */
    public function filter_wp_list_comments_args( array $parsed_args ) : array
    {
        return apply_filters( 'wts_wp_list_comments_args', $parsed_args );
    }
}