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

namespace WTS_Theme\App;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;
use Codestartechnologies\WordpressThemeStarter\Interfaces\FilterHooks;
use Codestartechnologies\WordpressThemeStarter\Traits\Hooks as TraitsHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Hooks
 *
 * This file contains Hooks class which handles WordPress hooks in Your theme.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
class Hooks implements ActionHooks, FilterHooks
{

    use TraitsHooks;

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
         * Below are custom action hooks that are added by default. You can chose to delete or comment out the lines below if your theme
         * will not need these features.
         */

        // Sets up theme defaults and registers support for various wordpress features.
        add_action( 'wts_after_setup_theme', array( $this, 'wts_after_setup_theme_cb' ) );
        // Fires when scripts and styles are enqueued on the front end.
        add_action( 'wts_wp_enqueue_scripts', array( $this, 'wts_wp_enqueue_scripts_cb' ) );
        // Fires at the top of the comment form, inside the form tag.
        add_action( 'wts_comment_form_top', array( $this, 'wts_comment_form_top_cb' ) );
        // Fires at the bottom of the comment form, inside the closing form tag.
        add_action( 'wts_comment_form', array( $this, 'wts_comment_form_cb' ) );
        // Fires after the comment form.
        add_action( 'wts_comment_form_after', array( $this, 'wts_comment_form_after_cb' ) );
        // Fires before the comment form.
        add_action( 'wts_comment_form_before', array( $this, 'wts_comment_form_before_cb' ) );

        /**
         * Add your custom action hook below
         */

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
         * Below are custom filter hooks that are added by default. You can chose to delete or comment out the lines below if your theme
         * will not need these features.
         */

        // Filters the arguments used to display a navigation menu.
        add_filter( 'wts_wp_nav_menu_args', array( $this, 'wts_wp_nav_menu_args_filter_cb' ) );
        // Filters the CSS classes applied to a menu item's list item element
        add_filter( 'wts_nav_menu_css_class', array( $this, 'wts_nav_menu_css_class_filter_cb' ), 10, 4 );
        // Filters the CSS class(es) applied to a menu list element.
        add_filter( 'wts_nav_menu_submenu_css_class', array( $this, 'wts_nav_menu_submenu_css_class_filter_cb' ), 10, 3 );
        // Filters the arguments for a single nav menu item.
        add_filter( 'wts_nav_menu_item_args', array( $this, 'wts_nav_menu_item_args_filter_cb' ), 10, 3 );
        // Filters the HTML attributes applied to a menu item's anchor element
        add_filter( 'wts_nav_menu_link_attributes', array( $this, 'wts_nav_menu_link_attributes_filter_cb' ), 10, 4 );
        // Filters the displayed post excerpt.
        add_filter( 'wts_the_excerpt', array( $this, 'wts_the_excerpt_filter_cb' ) );
        // Filters the retrieved post excerpt.
        add_filter( 'wts_get_the_excerpt', array( $this, 'wts_get_the_excerpt_filter_cb' ), 10, 2 );
        // Filters the comment form default arguments.
        add_filter( 'wts_comment_form_defaults', array( $this, 'wts_comment_form_defaults_filter_cb' ) );
        // Filters the cancel comment reply link HTML.
        add_filter( 'wts_cancel_comment_reply_link', array( $this, 'wts_cancel_comment_reply_link_filter_cb' ), 10, 3 );
        // Filters the comment form fields, including the textarea.
        add_filter( 'wts_comment_form_fields', array( $this, 'wts_comment_form_fields_filter_cb' ) );
        // Filters the submit field for the comment form to display.
        add_filter( 'wts_comment_form_submit_field', array( $this, 'wts_comment_form_submit_field_filter_cb' ), 10, 2 );
        // Filters the arguments used in retrieving the comment list.
        add_filter( 'wts_wp_list_comments_args', array( $this, 'wts_wp_list_comments_args_filter_cb' ) );

        /**
         * Add your custom filter hook below
         */

    }
}