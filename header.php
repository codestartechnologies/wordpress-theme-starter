<?php
/**
 * The header template file in WordPress theme
 *
 */
?>

<!DOCTYPE html>

<html <?php language_attributes() ?> class="no-js">
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php if ( has_excerpt() ) : ?>

        <meta name="description" content="<?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?>" />

        <?php else : ?>

        <meta name="description" content="<?php echo wp_get_document_title(); ?>" />

        <?php endif; ?>

        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class() ?>>

        <?php wp_body_open(); ?>
