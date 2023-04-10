<?php
/**
 * View returned by WTSMenuPage::class.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */
?>

<div class="wrap">

    <h1> <?php echo get_admin_page_title(); ?> </h1>

    <p>
        <b>Here is a random string passed to this menu page:</b>
        <?php echo $random_string; ?>
    </p>

</div>