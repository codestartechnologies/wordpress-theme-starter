<?php
/**
 * This file is used to display post listings.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */
?>

<!-- posts -->
<div class="wts-flex wts-posts wts-posts-three-columns">

    <?php while ( have_posts() ) : the_post(); ?>

    <div class="wts-single-post">

        <?php if ( has_post_thumbnail() ) : ?>

        <div class="wts-single-post-header">
            <img src="<?php echo the_post_thumbnail_url( 'medium' ); ?>" alt="" />
        </div>

        <?php endif; ?>

        <div class="wts-single-post-content">

            <a href="<?php the_permalink(); ?>" class="wts-single-post-title"> <?php the_title(); ?> </a>

            <div class="wts-flex wts-single-post-meta">
                <span class="wts-date"> <?php get_the_date( 'jS F, Y' ); ?> </span>
                <span class="wts-comments"> <?php echo get_comments_number_text(); ?> </span>
            </div>

            <p> <?php echo wts_get_the_excerpt(); ?> </p>

            <div class="wts-single-post-footer">
                <a href="<?php the_permalink(); ?>" class="wts-button wts-read-more"> <?php esc_html_e( 'Read More', 'wts' ); ?> </a>
            </div>

        </div>

    </div>

    <?php endwhile; ?>

</div>
<!-- /posts -->