<?php

/**
 * @var $option_name - The option name - Passed to the view by default
 */
$option_name = esc_attr( $option_name );

/**
 * @var $label_for - The field id - Passed to the view by default
 */
$label_for = esc_attr( $label_for );

/**
 * Get option form database
 */
$option = get_option( $option_name );

$value = $option[ $label_for ] ?? null;

?>

<input type="checkbox" name="<?php echo $option_name . '[' . $label_for . ']'; ?>" id="<?php echo $label_for; ?>" value="yes"
    class="regular-text" <?php checked( $value ); ?> />
