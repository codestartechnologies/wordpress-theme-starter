<?php
/**
 * This file is used to display a title.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

$title = ( is_archive() ) ? get_the_archive_title() : ( ( is_tax() ) ? single_term_title( '', false ) : wp_title( '&raquo;', false ) );

?>

<h1 class="wts-title"> <?php echo $args['title'] ?? $title; ?> </h1>

<div class="wts-heading-divider"></div>