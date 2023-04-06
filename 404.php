<?php
/**
 * The 404 template. Used when WordPress cannot find a post, page, or other content that matches the visitor’s request.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

get_header();

get_template_part( 'template-parts/error/404' );

get_footer();