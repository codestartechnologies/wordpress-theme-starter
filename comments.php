<?php
/**
 * The comments template file in WordPress theme
 *
 */

$comments_title = sprintf(
    _nx( 'One thought on this post', '%s thoughts on this post', get_comments_number(), 'comments title', 'wts' ),
    number_format_i18n( get_comments_number() )
);

?>

<!-- comments list -->
<h4 class="wts-centered-title"> <?php echo $comments_title; ?> </h4>
<div class="wts-heading-divider"></div>

<?php if ( comments_open() || get_comments_number() ) : ?>

<ul class="wts-comments">
    <?php wp_list_comments(); ?>
</ul>
<!-- / comments list -->

<div class="wts-section-divider"></div>

<?php endif; ?>