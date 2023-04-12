<?php
/**
 * Hooks trait file.
 *
 * This file contains Hooks trait which contains callback methods that are added to wordpress hooks.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Traits;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Trait Hooks
 *
 * This trait contains callback methods that are added to wordpress hooks.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
trait Hooks
{
    /**
     * Callback method for "wts_after_setup_theme" action hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function wts_after_setup_theme_cb() : void
    {
        // Load the theme’s translated strings.
        load_theme_textdomain( 'wts', WTS_LANGUAGES_DIR );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', array( 'height' => '46', 'width' => '150', ) );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        /**
         * Switch default core markup for search form, comment form, widgets, comments, gallery, captions, style and script to output
         * valid HTML5
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

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add post-formats support.
        add_theme_support( 'post-formats', array( 'image', 'video' ) );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        /*
        * Let WordPress manage the document title.
        * This theme does not use a hard-coded <title> tag in the document head, WordPress will provide it for us.
        */
        add_theme_support( 'title-tag' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Add support for experimental cover block spacing.
        add_theme_support( 'custom-spacing' );

        // Remove support for widgets block editor.
        remove_theme_support( 'widgets-block-editor' );

        // Register menu locations
        register_nav_menus( array(
            'wts_pc_menu'           => esc_html__( 'Desktop Menu: visible on desktops and laptops screens', 'wts' ),
            'wts_mobile_menu'       => esc_html__( 'Mobile Menu: visible on mobile screens', 'wts' ),
            'wts_footer_menu_1'     => esc_html__( 'Footer Menu One: visible in the footer section of the website', 'wts' ),
            'wts_footer_menu_2'     => esc_html__( 'Footer Menu Two: visible in the footer section of the website', 'wts' ),
        ) );

        // Add image custom sizes for this theme
        add_image_size( 'wts-small', 74, 74, array( 'center', 'top' ) );
    }

    /**
     * Callback method for "wts_wp_enqueue_scripts" action hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function wts_wp_enqueue_scripts_cb() : void
    {
        // Enqueue wts-template CSS files
        wp_enqueue_style( 'wts-template', WTS_TEMPLATE_CSS, array(), WTS_THEME_VERSION );
        wp_enqueue_style( 'wts-template-responsive', WTS_TEMPLATE_RESPONSIVE_CSS, array(), WTS_THEME_VERSION );

        // Enqueue wts-template JS files
        wp_enqueue_script( 'wts-template', WTS_TEMPLATE_JS, array(), WTS_THEME_VERSION, true );
    }

    /**
     * Callback method for "wts_comment_form_top" action hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function wts_comment_form_top_cb() : void
    {
        $markup = wts_config( 'comments.after_open_form_tag' );
        $markup = ( $markup ) ?: '';
        echo $markup;
    }

    /**
     * Callback method for "wts_comment_form" action hook.
     *
     * @param integer $post_id
     * @return void
     * @since 1.0.0
     */
    public function wts_comment_form_cb( int $post_id ) : void
    {
        $markup = wts_config( 'comments.before_close_form_tag' );
        $markup = ( $markup ) ?: '';
        echo $markup;
    }

    /**
     * Callback method for "wts_comment_form_after" action hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function wts_comment_form_after_cb() : void
    {
        $markup = wts_config( 'comments.after_form' );
        $markup = ( $markup ) ?: '<!-- / comment form --><div class="wts-section-divider"></div>';
        echo $markup;
    }

    /**
     * Callback method for "wts_comment_form_before" action hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function wts_comment_form_before_cb() : void
    {
        $markup = wts_config( 'comments.before_form' );
        $markup = ( $markup ) ?: __( '<!-- comment form --><h4 class="wts-centered-title">Leave your comment</h4><div class="wts-heading-divider"></div>', 'wts' );
        echo $markup;
    }

    /**
     * Callback method for "wts_wp_nav_menu_args" filter hook.
     *
     * @param array $args
     * @return array
     * @since 1.0.0
     */
    public function wts_wp_nav_menu_args_filter_cb( array $args ) : array
    {
        if ( in_array( $args['theme_location'], array( 'wts_footer_menu_1', 'wts_footer_menu_2', ), true ) ) {
            $args['menu_class'] = 'wts-footer-menu';
            // Using raw html entity e.g &raquo; will cause error (excessive refreshing) in the customizer preview. Decode the html entity.
            $args['before'] = sprintf( '<i>%s</i>', html_entity_decode( '&raquo;' ) );
        }

        if ( 'wts_pc_menu' === $args['theme_location'] ) {
            $args['menu_class'] = 'wts-pc-menu wts-fix-float';
            $args['menu_id'] = 'WTSPCMenu';
        }

        if ( 'wts_mobile_menu' === $args['theme_location'] ) {
            $args['menu_class'] = 'wts-mobile-menu';
            $args['menu_id'] = 'WTSMobileMenu';
        }

        return $args;
    }

    /**
     * Callback method for "wts_nav_menu_css_class" filter hook.
     *
     * @param array $classes
     * @param \WP_Post $menu_item
     * @param object $args
     * @param integer $depth
     * @return array
     * @since 1.0.0
     */
    public function wts_nav_menu_css_class_filter_cb( array $classes, \WP_Post $menu_item, object $args, int $depth ) : array
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
                    break;
                case 1:
                    $classes = ( in_array( 'menu-item-has-children', $classes ) )
                        ? array( 'wts-mobile-menu-item', 'wts-mobile-menu-dropdown-item-lv1', )
                        : array( 'wts-mobile-menu-item', );
                    break;
                default:
                    $classes = array( 'wts-mobile-menu-item', );
            }

            $classes[] = ( $menu_item->current ) ? 'active' : '';
        }

        return $classes;
    }

    /**
     * Callback method for "wts_nav_menu_submenu_css_class" filter hook.
     *
     * @param array $classes
     * @param object $args
     * @param integer $depth
     * @return array
     * @since 1.0.0
     */
    public function wts_nav_menu_submenu_css_class_filter_cb( array $classes, object $args, int $depth ) : array
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
     * Callback method for "wts_nav_menu_item_args" filter hook.
     *
     * @param object $args
     * @param \WP_Post $menu_item
     * @param integer $depth
     * @return object
     * @since 1.0.0
     */
    public function wts_nav_menu_item_args_filter_cb( object $args, \WP_Post $menu_item, int $depth ) : object
    {
        if ( 'wts_pc_menu' === $args->theme_location ) {
            switch ( $depth ) {
                case 0:
                    $args->link_before = '';
                    $args->link_after = '';
                    break;
                default:
                    $args->link_before = '&blacktriangleright; ';
                    $args->link_after = '&nbsp;';
            }
        }

        if ( 'wts_mobile_menu' === $args->theme_location && in_array( 'menu-item-has-children', $menu_item->classes ) ) {
            $menu_item->url = '#';
        }

        return $args;
    }

    /**
     * Callback method for "wts_nav_menu_link_attributes" filter hook.
     *
     * @param array $atts
     * @param \WP_Post $menu_item
     * @param object $args
     * @param integer $depth
     * @return array
     * @since 1.0.0
     */
    public function wts_nav_menu_link_attributes_filter_cb( array $atts, \WP_Post $menu_item, object $args, int $depth ) : array
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
                    $atts['class'] = 'wts-mobile-menu-link';
                    break;
                default:
                    $atts['class'] = 'wts-mobile-menu-link wts-mobile-menu-dropdown-link';
            }

            $atts['class'] .= ( in_array( 'menu-item-has-children', $menu_item->classes ) ) ? ' wts-mobile-menu-link-has-dropdown' : null;
        }

        return $atts;
    }

    /**
     * Callback method for "wts_the_excerpt" filter hook.
     *
     * @param string $post_excerpt
     * @return string
     * @since 1.0.0
     */
    public function wts_the_excerpt_filter_cb( string $post_excerpt ) : string
    {
        $post_excerpt = sanitize_textarea_field( $post_excerpt );
        return $post_excerpt;
    }

    /**
     * Callback method for "wts_get_the_excerpt" filter hook.
     *
     * @param string $post_excerpt
     * @param \WP_Post $post
     * @return string
     * @since 1.0.0
     */
    public function wts_get_the_excerpt_filter_cb( string $post_excerpt, \WP_Post $post ) : string
    {
        $post_excerpt = sanitize_textarea_field( $post_excerpt );
        return $post_excerpt;
    }

    /**
     * Callback method for "wts_comment_form_defaults" filter hook.
     *
     * @param array $defaults
     * @return array
     * @since 1.0.0
     */
    public function wts_comment_form_defaults_filter_cb( array $defaults ) : array
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
     * Callback method for "wts_cancel_comment_reply_link" filter hook.
     *
     * @param string $formatted_link
     * @param string $link
     * @param string $text
     * @return string
     * @since 1.0.0
     */
    public function wts_cancel_comment_reply_link_filter_cb( string $formatted_link, string $link, string $text ) : string
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
     * Callback method for "wts_comment_form_fields" filter hook.
     *
     * @param array $comment_fields
     * @return array
     * @since 1.0.0
     */
    public function wts_comment_form_fields_filter_cb( array $comment_fields ) : array
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
            'author'    => __( '<div class="wts-flex"><div><label for="wts_comment_form_author">Full Name *</label><input type="text" name="%1$s" id="wts_comment_form_author" value="%2$s" /></div>', 'wts' ),
            'email'     => __( '<div><label for="wts_comment_form_email">Email Address *</label><input type="email" name="%1$s" id="wts_comment_form_email" value="%2$s" /></div>', 'wts' ),
            'url'       => __( '<div><label for="wts_comment_form_url">Website</label><input type="text" name="%1$s" id="wts_comment_form_url" value="%2$s" /></div></div>', 'wts' ),
            'comment'   => __( '<div><label for="wts_comment_form_text">Comment *</label><textarea name="%s" id="wts_comment_form_text" cols="30" rows="10"></textarea></div>', 'wts' ),
            'cookies'   => __( '<div><div class="wts-flex wts-inline-form-field"><input type="checkbox" name="%1$s" id="wts_comment_form_cookie" value="yes" %2$s /><label for="wts_comment_form_cookie">%3$s</label></div></div>', 'wts' ),
        ) );

        $comment_fields['author'] = sprintf( $markup['author'], 'author', esc_attr( $commenter['comment_author'] ) );

        $comment_fields['email'] = sprintf( $markup['email'], 'email', esc_attr( $commenter['comment_author_email'] ) );

        $comment_fields['url'] = sprintf( $markup['url'], 'url', esc_attr( $commenter['comment_author_url'] ) );

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
     * Callback method for "wts_comment_form_submit_field" filter hook.
     *
     * @param string $submit_field
     * @param array $args
     * @return string
     * @since 1.0.0
     */
    public function wts_comment_form_submit_field_filter_cb( string $submit_field, array $args ) : string
    {
        $markup = array_filter( ( array ) wts_config( 'comments.submit_field_markup' ) );
        $markup = wp_parse_args( ( array ) $markup, array(
            'container' => '%1$s %2$s',
            'button'    => __( '<button type="submit" name="%1$s" id="%2$s">Add Comment</button>', 'wts' ),
        ) );

        $submit_button = sprintf( $markup['button'], esc_attr( $args['name_submit'] ), esc_attr( $args['id_submit'] ) );
        $submit_field = sprintf( $markup['container'], $submit_button, get_comment_id_fields() );
        return $submit_field;
    }

    /**
     * Callback method for "wts_wp_list_comments_args" filter hook.
     *
     * @param array $parsed_args
     * @return array
     * @since 1.0.0
     */
    public function wts_wp_list_comments_args_filter_cb( array $parsed_args ) : array
    {
        $parsed_args['type'] = 'comment';
        $parsed_args['callback'] = 'wts_wp_list_comments_cb';
        return $parsed_args;
    }
}