<?php

$title = ( is_archive() ) ? get_the_archive_title() : ( ( is_tax() ) ? single_term_title( '', false ) : wp_title( '&raquo;', false ) );

?>

<h1 class="wts-title"> <?php echo $args['title'] ?? $title; ?> </h1>
<div class="wts-heading-divider"></div>