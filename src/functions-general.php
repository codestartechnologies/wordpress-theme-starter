<?php
/**
 * This file contains general helper functions for the project.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

if ( ! function_exists( 'wts_config' ) ) {
    /**
     * Gets a configuration setting from a config file.
     *
     * @param string $name  The name of the config file concatenated by the config key. Example `views.error_messages`
     * @return mixed
     * @since 1.0.0
     */
    function wts_config( string $name ) : mixed
    {
        $name_arr = explode( '.', $name );
        $file_name = $name_arr[0] ?? null;
        $file_path = WTS_CONFIGS_DIR . $file_name . '.php';

        if ( is_file( $file_path ) ) {
            $config_arr = require $file_path;
            $config_key = $name_arr[1] ?? null;

            if ( array_key_exists( $config_key, $config_arr ) ) {
                return $config_arr[ $config_key ];
            }
        }

        return null;
    }
}

if ( ! function_exists( 'wts_include_file') ) {
    /**
     * Includes a file.
     *
     * @param string $file_path     The relative path to the file without an extension name. Paths can be separated with dots.
     * @param array $args           An array of arguements that will be passed to the file
     * @return void
     * @since 1.0.0
     */
    function wts_include_file( string $file_path, array $args = array() ) : void
    {
        $file_path = str_replace( '.', '/', $file_path );
        $path_to_file = $file_path . '.php';

        if ( is_file( $path_to_file ) ) {

            if ( ! empty( $args ) ) {
                extract( $args );
            }

            require_once $path_to_file;
        }
    }
}

if ( ! function_exists( 'wts_get_date' ) ) {
    /**
     * Returns a date in a custom format.
     *
     * @param string $format
     * @param string $date
     * @return string|null
     * @since 1.0.0
     */
    function wts_get_date( string $format = 'd m Y', string $date = 'now' ) : string|null
    {
        return date( $format, strtotime( $date ) );
    }
}

if ( ! function_exists( 'wts_is_plugin_active' ) ) {
    /**
     * Checks if a plugin is installed and activated.
     *
     * @param string $dir_name      The plugin directory name
     * @param string $file_name     The plugin file name
     * @return boolean
     * @since 1.0.0
     */
    function wts_is_plugin_active( string $dir_name, string $file_name ) : bool
    {
        $dir = trailingslashit( $dir_name );
        return in_array( $dir . $file_name, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
    }
}

if ( ! function_exists( 'wts_log' ) ) {
    /**
     * Function for logging message to a file.
     *
     * @param string $log_message   Log Message.
     * @param string $path          Path to the log file.
     * @return void
     * @since 1.0.0
     */
    function wts_log( string $log_message, string $path ) : void
    {
        if ( ! error_log( $log_message . PHP_EOL, 3, $path ) ) {
            $resource = fopen( $path, 'a' );
            fwrite( $resource, $log_message . PHP_EOL );
            fclose( $resource );
        }
    }
}

if ( ! function_exists( 'wts_view_not_found_message' ) ) {
    /**
     * Prints error message for non existing views.
     *
     * @param string $type  The invalid path specified.
     * @return void
     * @since 1.0.0
     */
    function wts_view_not_found_message( $file_path ) : void
    {
        $markup = array_filter( ( array ) wts_config( 'views.error_messages' ) );
        $markup = wp_parse_args( ( array ) $markup, array(
            'not_found'  => __(
                '<h3 style="color: red;">View could not be loaded!</h3><p>There was an error loading <b>%s</b>. Please check file exist and is readable. </p>',
                'wps'
            ),
        ) );

        printf( $markup['not_found'], $file_path );
    }
}

if ( ! function_exists( 'wts_load_view' ) ) {
    /**
     * loads a file from views/
     *
     * @param string $view          The relative path to the view file. Paths are separated using dots (`.`)
     * @param array $params         Parameters passed to the view. Default is an empty array
     * @param string $type          The directory to search for the view. Can be either `admin` or `public`. Default is `admin`
     * @param bool $once            Whether to include the view only once. Default true
     * @return void
     * @since 1.0.0
     */
    function wts_load_view( string $view, array $params = array(), string $type = 'admin', bool $once = true ) : void
    {
        $view = str_replace( '.', '/', $view );
        $base_path = ( 'admin' === $type ) ? WTS_ADMIN_VIEWS_DIR : WTS_PUBLIC_VIEWS_DIR;
        $full_path = $base_path . $view . '.php';

        if ( is_readable( $full_path ) ) {

            if ( ! empty( $params ) ) {
                extract( $params );
            }

            if ( $once ) {
                require_once $full_path;
            } else {
                require $full_path;
            }
        } else {
            wts_view_not_found_message( $full_path );
        }
    }
}

if ( ! function_exists( 'wts_wp_list_comments_cb' ) ) {
    /**
     * Filters the arguments used in retrieving the comment list.
     *
     * @param WP_Comment $comment
     * @param array $args
     * @param integer $depth
     * @return void
     * @since 1.0.0
     */
    function wts_wp_list_comments_cb( WP_Comment $comment, array $args, int $depth ) : void
    {
        $markup = array_filter( ( array ) wts_config( 'comments.comments_lists_markup' ) );
        $markup = wp_parse_args( ( array ) $markup, array(
            'list_open'         => '<li %1$s id="comment-%2$s">',
            'comment_class'     => 'wts-single-comment',
            'awaiting_approval' => '<p><em class="comment-awaiting-moderation">%s</em></p>',
            'login_to_comment'  => '<a href="%1$s">%2$s</a>',
            'reply_to_comment'  => __( '<a href="%s">Reply</a>', 'wts' ),
            'comment_meta'      => __( '<div class="wts-comment-meta"><span class="wts-comment-meta-name">%1$s</span> added a comment - %3$s <br><span class="wts-comment-meta-date"><i>%2$s</i></span></div>', 'wts' ),
            'edit_comment'      => __( '<p><a href="%s">Edit comment</a></p>', 'wts' ),
            'comment'           => '<div class="wts-comment"> %1$s %2$s </div>',
        ) );

        ob_start();

        printf( $markup['list_open'], comment_class( $markup['comment_class'], $comment->comment_ID, null, false ), $comment->comment_ID );

        if ( $comment->comment_approved === '0' ) {
            printf( $markup['awaiting_approval'], esc_html__( 'Your comment is awaiting moderation.' ) );
        }

        if ( get_option( 'page_comments' ) ) {
            $permalink = str_replace( '#comment-' . $comment->comment_ID, '', get_comment_link( $comment ) );
        } else {
            $permalink = get_permalink();
        }

        if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
            $replylink = wp_login_url();
            $replylink_html = sprintf( $markup['login_to_comment'], $replylink, esc_html__( 'Log in to reply' ) );
        } else {
            $replylink = esc_url( add_query_arg( array(
                'replytocom'        => $comment->comment_ID,
                'unapproved'        => false,
                'moderation-hash'   => false,
            ), $permalink ) );
            $replylink_html = sprintf( $markup['reply_to_comment'], $replylink . '#respond' );
        }

        printf( $markup['comment_meta'], $comment->comment_author, wts_get_date( 'j M, Y', $comment->comment_date), $replylink_html );

        $edit_link = '';

        if ( is_user_logged_in() && current_user_can( 'edit_comment', $comment->comment_ID ) ) {
            $edit_link = sprintf( $markup['edit_comment'], get_edit_comment_link( $comment->comment_ID ) );
        }

        printf( $markup['comment'], wp_kses_post( $comment->comment_content ), $edit_link );

        echo ob_get_clean();
    }
}
