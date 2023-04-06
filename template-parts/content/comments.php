<?php
/**
 * This file is used to display comments list.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

$comments_title = sprintf(
    _nx( 'One thought on this post', '%s thoughts on this post', get_comments_number(), 'comments title', 'wts' ),
    number_format_i18n( get_comments_number() )
);

?>

<h4 class="wts-centered-title"> <?php echo $comments_title; ?> </h4>

<div class="wts-heading-divider"></div>

<?php if ( comments_open() || get_comments_number() ) : ?>

<!-- comments list -->
<ul class="wts-comments">
    <?php wp_list_comments(); ?>
</ul>
<!-- / comments list -->

<div class="wts-section-divider"></div>

<?php endif; ?>