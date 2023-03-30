<?php
/**
 * This file is used to display a setting field.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

/**
 * @var $option_name - The option name - Passed to the view by default
 */

$option_name = esc_attr( $option_name );

/**
 * @var $label_for - The field id - Passed to the view by default
 */
$label_for = esc_attr( $label_for );

// Get option from database
$option = get_option( $option_name );

$value = $option[ $label_for ] ?? null;

?>

<select name="<?php echo $option_name . '[' . $label_for . ']'; ?>" id="<?php echo $label_for; ?>" class="regular-text">

    <option value <?php selected( null, $value ); ?>></option>

    <?php foreach( get_pages() as $page ) : ?>

        <option value="<?php echo $page->ID; ?>" <?php selected( $page->ID, $value ); ?>> <?php echo $page->post_title; ?> </option>

    <?php endforeach; ?>

</select>