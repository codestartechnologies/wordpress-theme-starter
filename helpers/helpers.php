<?php
/**
 * This file contains general helper functions used in creating your theme
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

if ( ! function_exists( 'wts_config' ) ) {
    /**
     * Gets a configuration setting
     *
     * @param string $name  The name of the config file concatenated by the config key
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
            'awaiting_approval' => '<p><em class="comment-awaiting-moderation">%s</em></p>',
            'login_to_comment'  => '<a href="%1$s">%2$s</a>',
            'reply_to_comment'  => __( '<a href="%s">Reply</a>' ),
            'comment_meta'      => '<div> <div><span>%1$s</span> - %3$s</div> <div><span>%2$s</span></div> </div>',
            'edit_comment'      => __( '<p><a href="%s">Edit comment</a></p>' ),
            'comment'           => '<p> %1$s %2$s </p>',
        ) );

        ob_start();

        printf( $markup['list_open'], comment_class( '', $comment->comment_ID, null, false ), $comment->comment_ID );

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
            $replylink_html = sprintf( $markup['reply_to_comment'], $replylink );
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

if ( ! function_exists( 'wts_include_file') ) {
    /**
     * Includes a file, and passes arguements to the file
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

if ( ! function_exists( 'wts_get_social_link' ) ) {
    /**
     * Generates a url link to a social handle page or user account
     *
     * @param string $handle    The social handle username. example @page. Can also be a full url to the social handle when $type is set to null
     * @param string $type      Supported type: twitter, facebook, instagram, youtube, and whatsapp.
     * @return string
     * @since 1.0.0
     */
    function wts_get_social_link( string $handle, string $type = null  ) : string
    {
        $clean_handle = str_replace( array( '@', 'http://', 'https://', 'www.' ), '', $handle );

        switch ( $type ) {
            case 'facebook':
                $url = "https://www.facebook.com/{$clean_handle}";
                break;
            case 'twitter':
                $url = "https://twitter.com/{$clean_handle}";
                break;
            case 'instagram':
                $url = "https://instagram.com/{$clean_handle}";
                break;
            case 'youtube':
                $url = "https://www.youtube.com/c/{$clean_handle}";
                break;
            case 'whatsapp':
                $url = "https://api.whatsapp.com/send?phone={$clean_handle}";
                break;
            default :
                $url = esc_url( $handle );
        }

        return $url;
    }
}

if ( ! function_exists( 'wts_get_date' ) ) {
    /**
     * Returns a date in custom format
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
     * Checks if a plugin is installed and activated
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