<!-- post navigation -->
<div class="wts-post-navigation">

    <?php if ( ! empty( $previous_post = get_previous_post() ) ) : ?>
    <!-- previous post -->
    <div class="wts-flex wts-previous-post">
        <?php if ( $thumbnail_id = get_post_thumbnail_id( $previous_post->ID ) ) : ?>
            <img src="<?php echo get_the_post_thumbnail_url( $previous_post->ID, 'medium' ); ?>" alt="" />
        <?php endif; ?>
        <div>
            <span class="wts-post-nav-title"> <?php esc_html_e( 'previous post', 'wts' ); ?> </span>
            <a href="<?php echo get_the_permalink( $previous_post->ID ); ?>" class="wts-post-title"> <?php echo $previous_post->post_title; ?> </a>
            <p class="wts-post-excerpt"> <?php echo wts_get_the_excerpt( $previous_post ); ?> </p>
        </div>
    </div>
    <!-- / previous post -->
    <?php endif; ?>

    <?php if ( ! empty( $next_post = get_next_post() ) ) : ?>
    <!-- next post -->
    <div class="wts-flex wts-next-post">
        <div>
            <span class="wts-post-nav-title"> <?php esc_html_e( 'next post', 'wts' ); ?> </span>
            <a href="<?php echo get_the_permalink( $next_post->ID ); ?>" class="wts-post-title"> <?php echo $next_post->post_title; ?> </a>
            <p class="wts-post-excerpt"> <?php echo wts_get_the_excerpt( $next_post ); ?> </p>
        </div>
        <?php if ( $thumbnail_id = get_post_thumbnail_id( $next_post->ID ) ) : ?>
            <img src="<?php echo get_the_post_thumbnail_url( $next_post->ID, 'medium' ); ?>" alt="" />
        <?php endif; ?>
    </div>
    <!-- / next post -->
    <?php endif; ?>

</div>
<!-- / post navigation -->