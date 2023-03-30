<?php
/**
 * This file is used to display contents for a single post/page.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */
?>

<h1 class="wts-bordered-title"> <?php the_title(); ?> </h1>

<div class="wts-post-meta">

    <?php
        printf( 'Posted on the <i>%1$s</i> by <b>%2$s</b> <br />', get_the_date( 'jS F, Y' ), get_the_author() );
        esc_html_e( 'Category: ', 'wts' );
        echo wts_get_post_terms( get_the_ID(), 'category', '<a href="%1$s">%2$s</a>' );
    ?>

</div>

<article>

    <?php the_content(); ?>

</article>

<div class="wts-section-divider"></div>