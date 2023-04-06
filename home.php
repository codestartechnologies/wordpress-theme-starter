<?php
/**
 * The home page template. It is the front page by default.
 * If you do not set WordPress to use a static front page, this template is used to show latest posts.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

get_header();

get_template_part( 'template-parts/content/page' );

get_footer();