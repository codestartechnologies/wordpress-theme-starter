<footer>
    <div class="wts-container">
        <div class="wts-flex">

            <!-- footer text -->
            <div class="wts-footer-text">
                <p>
                    <?php echo get_theme_mod( 'wts_footer_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus alias fuga quia laborum provident a odit cum neque sequi quibusdam praesentium ad reprehenderit rem amet laudantium iste, ut obcaecati impedit.' ); ?>
                </p>
            </div>
            <!-- / footer text -->

            <?php if ( has_nav_menu( 'wts_footer_menu_1' ) ) : ?>

            <!-- footer nav menu -->
            <div class="wts-footer-menu-container">
                <h2 class="wts-footer-menu-title"> <?php echo wp_get_nav_menu_name( 'wts_footer_menu_1' ); ?> </h2>
                <?php wp_nav_menu( array( 'theme_location'  => 'wts_footer_menu_1', ) ); ?>
            </div>
            <!-- / footer nav menu -->

            <?php endif; ?>

            <?php if ( has_nav_menu( 'wts_footer_menu_2' ) ) : ?>

            <!-- footer nav menu -->
            <div class="wts-footer-menu-container">
                <h2 class="wts-footer-menu-title"> <?php echo wp_get_nav_menu_name( 'wts_footer_menu_2' ); ?> </h2>
                <?php wp_nav_menu( array( 'theme_location'  => 'wts_footer_menu_2', ) ); ?>
            </div>
            <!-- / footer nav menu -->

            <?php endif; ?>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>