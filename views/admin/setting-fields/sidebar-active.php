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

<input type="checkbox" name="<?php echo $option_name . '[' . $label_for . ']'; ?>" id="<?php echo $label_for; ?>" value="yes"
    class="regular-text" <?php checked( $value, 'yes' ); ?> />