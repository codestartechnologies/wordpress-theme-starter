<?php
/**
 * This file contains functions for interacting with different post types.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

if ( ! function_exists( 'wts_get_the_excerpt' ) ) {
    /**
     * Gets a post excerpt
     *
     * @param \WP_Post|null $post   Post object or null
     * @param integer $num_words    Number of words that will be returned
     * @return string
     * @since 1.0.0
     */
    function wts_get_the_excerpt( \WP_Post $post = null, int $num_words = 55 ) : string
    {
        if ( is_null( $post ) ) {
            $excerpt = ( has_excerpt() ) ? get_the_excerpt() : strip_shortcodes( get_the_content() );
        } else {
            $excerpt = ( ! empty( $post->post_excerpt ) ) ? $post->post_excerpt : strip_shortcodes( $post->post_content );
        }

        return wp_trim_words( sanitize_textarea_field( $excerpt ), $num_words );
    }
}

if ( ! function_exists( 'wts_get_posts_by_meta_value' ) ) {
    /**
     * Gets posts by their meta value
     *
     * @param string $post_type     The post type
     * @param string $meta_key      The value for 'key' specified in meta_query arguement
     * @param mixed $meta_value     The value for 'value' specified in meta_query arguement
     * @param integer $numberposts  Optional. The number of posts to return. Default 10
     * @param string $orderby       Optional. Order By. Default rand
     * @return array
     * @since 1.0.0
     */
    function wts_get_posts_by_meta_value( string $post_type, string $meta_key, mixed $meta_value, int $numberposts = 10, string $orderby = 'rand' ) : array
    {
        return get_posts( array(
            'numberposts'   => $numberposts,
            'post_type'     => $post_type,
            'orderby'       => $orderby,
            'meta_query'    => array(
                array(
                    'key'   => $meta_key,
                    'value' => $meta_value,
                ),
            ),
        ) );
    }
}

if ( ! function_exists( 'wts_get_related_posts_by_taxonomy' ) ) {
    /**
     * Gets post that are related by a taxonomy
     *
     * @param integer $post_id      The post ID
     * @param string $post_type     The post type
     * @param string $taxonomy      Taxonomy name
     * @param integer $numberposts  Optional. Number of posts to return. Default 10
     * @param string $orderby       Optional. Order By. Default rand
     * @return array
     * @since 1.0.0
     */
    function wts_get_related_posts_by_taxonomy( int $post_id, string $post_type, string $taxonomy, int $numberposts = 10, string $orderby = 'rand' ) : array
    {
        $terms = wp_get_post_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
        $terms_arr = ( ! is_wp_error( $terms ) ) ? $terms : array();

        return get_posts( array(
            'numberposts'   => $numberposts,
            'post_type'     => $post_type,
            'post__not_in'  => array( $post_id ),
            'orderby'       => $orderby,
            'tax_query'     => array(
                array(
                    'taxonomy'  => $taxonomy,
                    'field'     => 'slug',
                    'terms'     => $terms_arr,
                ),
            ),
        ) );
    }
}

if ( ! function_exists( 'wts_get_post_terms' ) ) {
    /**
     * Gets terms for a post
     *
     * @param int $post_id              The post ID
     * @param string|array $taxonomy    The taxonomy name
     * @param string $markup            The markup used to display each term. %1$s is used to display the link to the term, %2$s is used to display the term's name.
     * @param string $separator         String used to separate the terms
     * @return string|null
     * @since 1.0.0
     */
    function wts_get_post_terms( int $post_id, string|array $taxonomy, string $markup = '', string $separator = ', ' ) : string|null
    {
        if ( is_string( $taxonomy ) && ! taxonomy_exists( $taxonomy ) ) {
            return null;
        }

        $terms = wp_get_post_terms( $post_id, $taxonomy, array(
            'fields'   => 'id=>name',
        ) );

        if ( is_wp_error( $terms ) || empty ( $terms ) ) {
            return null;
        }

        $terms_arr = array();

        if ( empty( $markup ) ) {
            $markup = '<a href="%1$s">2$s</a>';
        }

        foreach ( $terms as $term_id => $term_name ) {
            $terms_arr[] = sprintf( $markup, get_term_link( $term_id, $taxonomy ), $term_name );
        }

        return implode( $separator, $terms_arr );
    }
}

if ( ! function_exists( 'wts_get_taxonomy_terms' ) ) {
    /**
     * Gets terms for a taxonomy
     *
     * @param string|array $taxonomy    The taxonomy name
     * @param string $markup            The markup used to display each term. %1$s is used to display the term's slug, %2$s is used to display the term's name, %3$s is used to display the link to the term.
     * @param string $separator         String used to separate the terms
     * @param bool $hide_empty          Whether to hide terms that are not associated with any posts
     * @return string|null
     * @since 1.0.0
     */
    function wts_get_taxonomy_terms( string|array $taxonomy, string $markup = '', string $separator = ', ', bool $hide_empty = false ) : string|null
    {
        if ( is_string( $taxonomy ) && ! taxonomy_exists( $taxonomy ) ) {
            return null;
        }

        $terms = get_terms( array(
            'taxonomy'      => $taxonomy,
            'hide_empty'    => $hide_empty,
        ) );

        if ( is_wp_error( $terms ) || empty ( $terms ) ) {
            return null;
        }

        $terms_arr = array();

        if ( empty( $markup ) ) {
            $markup = '%1$s';
        }

        foreach ( $terms as $term ) {
            $terms_arr[] = sprintf( $markup, $term->slug, $term->name, get_term_link( $term->slug, $taxonomy ) );
        }

        return implode( $separator, $terms_arr );
    }
}
