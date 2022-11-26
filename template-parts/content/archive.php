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