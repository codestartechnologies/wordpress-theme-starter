<?php
/**
 * The archive template. Used when visitors request posts by category, author, or date.
 * Note: this template will be overridden if more specific templates are present like category.php, author.php, and date.php.
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