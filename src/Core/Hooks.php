<?php
/**
 * Hooks class file.
 *
 * This file contains Hooks class which handles WordPress hooks in Your theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Core;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;
use Codestartechnologies\WordpressThemeStarter\Interfaces\FilterHooks;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Hooks' ) ) {
    /**
     * Class Hooks
     *
     * This file contains Hooks class which handles WordPress hooks in Your theme.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    class Hooks implements ActionHooks, FilterHooks {
        /**
         * Register add_action() and remove_action().
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function register_actions(): void
        {
            /**
             * This hook is called during each page load, after the theme is initialized.
             * It is generally used to perform basic setup, registration, and init actions for a theme.
             *
             */
            add_action('after_setup_theme', array( $this, 'setup_theme' ) );

            /**
             * Fires after the theme is switched.
             */
            add_action( 'switch_theme', array( $this, 'switch_theme' ), 10, 3 );

            /**
             * Fires when scripts and styles are enqueued.
             * Used when enqueuing scripts and styles that are meant to appear on the front end.
             */
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            /**
             * Enqueue scripts for all admin pages.
             */
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

            /**
             * Triggered after the opening body tag.
             */
            add_action( 'wp_body_open', array( $this, 'body_open' ) );

            /**
             * Fires once the Customizer preview has initialized and JavaScript settings have been printed.
             *
             */
            add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );

            /**
             * Fires at the top of the comment form, inside the form tag.
             */
            add_action( 'comment_form_top', array( $this, 'action_comment_form_top' ) );

            /**
             * Fires at the bottom of the comment form, inside the closing form tag.
             */
            add_action( 'comment_form', array( $this, 'action_comment_form' ) );

        }

        /**
         * Register add_filter() and remove_filter().
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function register_filters(): void
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
        public function setup_theme() : void
        {
            /**
             * Load the theme’s translated strings.
             */
            load_theme_textdomain( 'wts', WTS_LANGUAGES_DIR );

            /**
             * Add support for core custom logo.
             */
            add_theme_support( 'custom-logo', array( 'height' => '46', 'width' => '150', ) );

            /**
             * Enable support for Post Thumbnails on posts and pages.
             */
            add_theme_support( 'post-thumbnails' );

            /**
             * Switch default core markup for search form, comment form, widgets, comments, gallery,
             * captions, style and script to output valid HTML5
             */
            add_theme_support( 'html5', array(
                'comment-list',
                'comment-form',
                'search-form',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            ) );

            /**
             * Add theme support for selective refresh for widgets.
             */
            add_theme_support( 'customize-selective-refresh-widgets' );

            /**
             * Add post-formats support.
             */
            add_theme_support( 'post-formats', array( 'image', 'video' ) );

            /**
             * Add support for responsive embedded content.
             */
            add_theme_support( 'responsive-embeds' );

            /*
            * Let WordPress manage the document title.
            * This theme does not use a hard-coded <title> tag in the document head,
            * WordPress will provide it for us.
            */
            add_theme_support( 'title-tag' );

            /**
             * Add support for full and wide align images.
             */
		    add_theme_support( 'align-wide' );

            /**
             * Add support for Block Styles.
             */
            add_theme_support( 'wp-block-styles' );

            /**
             * Add support for editor styles.
             */
            add_theme_support( 'editor-styles' );

            /**
             * Add support for experimental cover block spacing.
             */
            add_theme_support( 'custom-spacing' );

            /**
             * Remove support for widgets block editor.
             */
            remove_theme_support( 'widgets-block-editor' );

            /**
             * Register menu locations
             */
            register_nav_menus( array(
                'wts_pc_menu'           => esc_html__( 'Desktop Menu: visible on desktops and laptops screens', 'wts' ),
                'wts_mobile_menu'       => esc_html__( 'Mobile Menu: visible on mobile screens', 'wts' ),
                'wts_footer_menu_1'     => esc_html__( 'Footer Menu One: visible in the footer section of the website', 'wts' ),
                'wts_footer_menu_2'     => esc_html__( 'Footer Menu Two: visible in the footer section of the website', 'wts' ),
            ) );

            /**
             * Add image custom sizes for this theme
             */
            add_image_size( 'wts-small', 74, 74, array( 'center', 'top' ) );
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
         * @since 1.0.0
         */
        public function switch_theme( string $new_name, \WP_Theme $new_theme, \WP_Theme $old_theme )
        {
            //
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
        public function enqueue_admin_scripts( string $hook_suffix ) : void
        {
            //
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
        public function enqueue_scripts() : void
        {
            //
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
        public function body_open() : void
        {
            //
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
        public function customize_preview_init( \WP_Customize_Manager $manager ) : void
        {
            //
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
            echo '<div id="wts-form-inner">';
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
        public function action_comment_form(int $post_id) : void
        {
            echo '</div>';
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
            if ( in_array( $args['theme_location'], array( 'wts_footer_menu_1', 'wts_footer_menu_2', ) ) ) {
                $args['menu_class'] = 'wts-footer-menu';
                $args['before'] = '<i>&raquo;</i>';
            }

            if ( 'wts_pc_menu' === $args['theme_location'] ) {
                $args['menu_class'] = 'wts-pc-menu';
                $args['menu_id'] = 'WTSPCMenu';
            }

            if ( 'wts_mobile_menu' === $args['theme_location'] ) {
                $args['menu_class'] = 'wts-mobile-menu';
                $args['menu_id'] = 'WTSMobileMenu';
            }

            return $args;
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
            if ( in_array( $args->theme_location, array( 'wts_footer_menu_1', 'wts_footer_menu_2' ) ) ) {
                $classes = array( 'wts-footer-menu-item', );
            }

            if ( 'wts_pc_menu' === $args->theme_location ) {
                switch ( $depth ) {
                    case 0:
                        $classes = ( in_array( 'menu-item-has-children', $classes ) )
                            ? array( 'wts-pc-menu-item', 'wts-pc-menu-dropdown-item', )
                            : array( 'wts-pc-menu-item', );
                        $classes[] = ( $menu_item->current ) ? 'active' : '';
                        break;
                    case 1:
                        $classes = ( in_array( 'menu-item-has-children', $classes ) )
                            ? array( 'wts-pc-menu-item', 'wts-pc-menu-dropdown-item-lv1', )
                            : array( 'wts-pc-menu-item', );
                        break;
                    default:
                        $classes = array( 'wts-pc-menu-item', );
                }
            }

            if ( 'wts_mobile_menu' === $args->theme_location ) {
                switch ( $depth ) {
                    case 0:
                        $classes = ( in_array( 'menu-item-has-children', $classes ) )
                            ? array( 'wts-mobile-menu-item', 'wts-mobile-menu-dropdown-item', )
                            : array( 'wts-mobile-menu-item', );
                        $classes[] = ( $menu_item->current ) ? 'active' : '';
                        break;
                    case 1:
                        $classes = ( in_array( 'menu-item-has-children', $classes ) )
                            ? array( 'wts-mobile-menu-item', 'wts-mobile-menu-dropdown-item-lv1', )
                            : array( 'wts-mobile-menu-item', );
                        break;
                    default:
                        $classes = array( 'wts-mobile-menu-item', );
                }
            }

            return $classes;
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
            if ( 'wts_pc_menu' === $args->theme_location ) {
                switch ( $depth ) {
                    case 0:
                        $classes = array( 'wts-pc-submenu', );
                        break;
                    case 1:
                        $classes = array( 'wts-pc-submenu', 'wts-pc-submenu-lv1', );
                        break;
                }
            }

            if ( 'wts_mobile_menu' === $args->theme_location ) {
                switch ( $depth ) {
                    case 0:
                        $classes = array( 'wts-mobile-submenu', );
                        break;
                    case 1:
                        $classes = array( 'wts-mobile-submenu', 'wts-mobile-submenu-lv1', );
                        break;
                }
            }

        	return $classes;
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
            if ( 'wts_pc_menu' === $args->theme_location ) {
                switch ( $depth ) {
                    case 0:
                        $args->link_after = ( in_array( 'menu-item-has-children', $menu_item->classes ) )
                            ? '&nbsp;$nbsp;<i>&downarrow;</i>'
                            : '';
                        break;
                    case 1:
                        $args->link_after = ( in_array( 'menu-item-has-children', $menu_item->classes ) )
                            ? '&nbsp;$nbsp;<i>&downarrow;</i>'
                            : '';
                        break;
                    case 2:
                        $args->link_after = '';
                        break;
                }
            }

            if ( 'wts_mobile_menu' === $args->theme_location && in_array( 'menu-item-has-children', $menu_item->classes ) ) {
                $menu_item->url = '#';
            }

        	return $args;
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
            if ( in_array( $args->theme_location, array( 'wts_footer_menu_1', 'wts_footer_menu_2', ) ) ) {
                $atts['class'] = 'wts-footer-menu-link';
            }

            if ( 'wts_pc_menu' === $args->theme_location ) {
                switch ( $depth ) {
                    case 0:
                        $atts['class'] = 'wts-pc-menu-link';
                        break;
                    default:
                        $atts['class'] = 'wts-pc-menu-link wts-pc-menu-dropdown-link';
                }
            }

            if ( 'wts_mobile_menu' === $args->theme_location ) {
                switch ( $depth ) {
                    case 0:
                        $atts['class'] = ( in_array( 'menu-item-has-children', $menu_item->classes ) )
                            ? 'wts-mobile-menu-link wts-mobile-menu-link-has-dropdown'
                            : 'wts-mobile-menu-link';
                        break;
                    default:
                        $atts['class'] = 'wts-mobile-menu-link wts-mobile-menu-dropdown-link';
                }
            }

            return $atts;
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
            $post_excerpt = sanitize_textarea_field( $post_excerpt );

            return $post_excerpt;
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
            $post_excerpt = sanitize_textarea_field( $post_excerpt );

        	return $post_excerpt;
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
            $markup = array_filter( ( array ) wts_config( 'comments.form_defaults_markup' ) );
            $markup = wp_parse_args( (array) $markup, array(
                'title_reply_before'    => '<h3>',
                'title_reply_after'     => '</h3>',
                'must_log_in'           => '<p> %1$s <a href="%2$s">%3$s</a> </p>',
                'logged_in_as'          => '<p> %1$s <a href="%2$s">%3$s</a> </p>',
                'comment_notes_before'  => '<p>%s</p>',
                'title_reply_to'        => '%1$s <a href="%2$s">%3$s</a>',
            ) );

            $reply_to_id = isset( $_GET['replytocom'] ) ? (int) $_GET['replytocom'] : 0;
            $comment = get_comment( $reply_to_id );

            $defaults['title_reply'] = esc_html__( 'Comment on this post', 'wts' );
            $defaults['title_reply_before'] = $markup['title_reply_before'];
            $defaults['title_reply_after'] = $markup['title_reply_after'];
            $defaults['must_log_in'] = sprintf( $markup['must_log_in'], esc_html__( 'You must be logged in to comment', 'wts' ), wp_login_url(), esc_html__( 'Log In', 'wts' ) );
            $defaults['logged_in_as'] = sprintf( $markup['logged_in_as'], esc_html__( 'Logged in as an admin', 'wts' ), wp_logout_url(), esc_html__( 'Log Out', 'wts' ) );
            $defaults['comment_notes_before'] = sprintf( $markup['comment_notes_before'], $defaults['comment_notes_before'] );

            if ( ! is_null( $comment ) ) {
                $defaults['title_reply_to'] = sprintf( $markup['title_reply_to'], esc_html__( 'Leave A Reply To ', 'wts' ), '#comment-' . $comment->comment_ID, $comment->comment_author );
            }

        	return $defaults;
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
            $style = isset( $_GET['replytocom'] ) ? '' : ' style="display:none;"';

            $markup = array_filter( ( array ) wts_config( 'comments.cancel_reply_markup' ) );
            $markup = wp_parse_args( ( array ) $markup, array(
                'container'  => '<a href="%1$s" %3$s>%2$s</a>',
            ) );

            $formatted_link = sprintf( $markup['container'], $link, $text, $style );
        	return $formatted_link;
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
            $commenter = wp_get_current_commenter();
            $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
            $url_field = $comment_fields['url'];

            unset( $comment_fields['comment'] );
            unset( $comment_fields['author'] );
            unset( $comment_fields['email'] );
            unset( $comment_fields['url'] );
            unset( $comment_fields['cookies'] );

            $markup = array_filter( ( array ) wts_config( 'comments.fields_markup' ) );
            $markup = wp_parse_args( ( array ) $markup, array(
                'author'    => __( '<p><label>Fullname</label><input type="text" name="%1$s" value="%2$s" /></p><br />', 'wts' ),
                'email'     => __( '<p><label>Email Address</label><input type="email" name="%1$s" value="%2$s" /></p><br />', 'wts' ),
                'comment'   => __( '<p><label>Your Comment</label><textarea name="%s"></textarea></p><br />', 'wts' ),
                'cookies'   => __( '<p><input type="checkbox" name="%1$s" value="yes" %2$s /><label>%3$s</label></p><br />', 'wts' ),
            ) );

            $comment_fields['author'] = sprintf( $markup['author'], 'author', esc_attr( $commenter['comment_author'] ) );

            $comment_fields['email'] = sprintf( $markup['email'], 'email', esc_attr( $commenter['comment_author_email'] ) );

            $comment_fields['comment'] = sprintf( $markup['comment'], 'comment' );

            $comment_fields['cookies'] = sprintf(
                $markup['cookies'],
                'wp-comment-cookies-consent',
                $consent,
                esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'wts' )
            );

        	return $comment_fields;
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
            $markup = array_filter( ( array ) wts_config( 'comments.submit_field_markup' ) );
            $markup = wp_parse_args( ( array ) $markup, array(
                'container' => '<p> %1$s %2$s </p>',
                'button'    => __( '<button type="submit" name="%1$s" id="%2$s">Add Comment</button>', 'wts' ),
            ) );

            $submit_button = sprintf( $markup['button'], esc_attr( $args['name_submit'] ), esc_attr( $args['id_submit'] ) );
            $submit_field = sprintf( $markup['container'], $submit_button, get_comment_id_fields() );
        	return $submit_field;
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
            $parsed_args['type'] = 'comment';
            $parsed_args['callback'] = 'wts_wp_list_comments_cb';
        	return $parsed_args;
        }
    }
}