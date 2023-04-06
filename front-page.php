<?php
/**
 * The front page template. Used as the site front page if it exists, regardless of what settings on Admin > Settings > Reading.
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