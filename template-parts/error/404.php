<?php
/**
 * This file is used to display a 404 error message.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */
?>

<main>

    <div class="wts-section-divider"></div>

    <div class="wts-container">

        <section>
            <div class="wts-flex wts-invalid-page-wrap">
                <div class="wts-invalid-page-code">404</div>
                <div class="wts-invalid-page-code-slug"> <?php esc_html_e( 'page not found', 'wts' ); ?> </div>
                <div class="wts-invalid-page-description"> <?php echo get_theme_mod( 'wts_404_page_text' ); ?> </div>
            </div>
        </section>

    </div>

    <div class="wts-section-divider"></div>

</main>