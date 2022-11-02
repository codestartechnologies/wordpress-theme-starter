<div class="wrap">

    <h1> <?php echo get_admin_page_title(); ?> </h1>

    <form action="<?php echo esc_attr( admin_url( 'options.php') ); ?>" method="post">

    <?php

    /**
     * @var $page  - The group name for the settings page. Passed to the view by default
     *
     */
    settings_fields( $page );

    do_settings_sections( $page );

    submit_button();

    ?>

    </form>

</div>
