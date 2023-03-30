<?php
/**
 * This file is used to display a list of posts.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */
?>

<!-- archive posts -->
<div class="wts-archive-posts">

    <?php while ( have_posts() ) : the_post(); ?>

    <div class="wts-flex wts-single-post">

        <?php if ( has_post_thumbnail() ) : ?>

        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="">
        </a>

        <?php endif; ?>

        <div>
            <h3 class="wts-single-post-title"> <?php the_title(); ?> </h3>
            <p> <?php echo wts_get_the_excerpt(); ?> </p>
            <a href="<?php the_permalink(); ?>" class="wts-button"> <?php esc_html_e( 'Read More', 'wts' ); ?> </a>
        </div>

    </div>

    <?php endwhile; ?>

</div>
<!-- / archive posts -->