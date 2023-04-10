<?php
/**
 * WTSCustomizer class file
 *
 * This file contains WTSCustomizer class. This class will be used to create a customizer section - "WordPress Theme Starter".
 * It will also create settings and controls for this section.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace WTS_Theme\App\Admin\Customizers;

use Codestartechnologies\WordpressThemeStarter\Abstracts\Customizer as AbstractsCustomizer;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WTSCustomizer Class
 *
 * This class will create a customizer section - "WordPress Theme Starter". It will also create settings and controls for this section.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class WTSCustomizer extends AbstractsCustomizer
{
    /**
     * WTSCustomizer constructor
     *
     * @access public
     * @param array $parameters     Initial arguements for WP_Customize_Manager::add_section(), WP_Customize_Manager::add_setting(), and WP_Customize_Manager::add_control()
     * @return void
     * @since 1.0.0
     */
    public function __construct( array $parameters )
    {
        parent::__construct( $parameters );
    }

    /**
     * Handle active_callback arguement for WP_Customize_Manager::add_section()
     *
     * @access public
     * @return bool
     * @since 1.0.0
     */
    public function wts_section_callback() : bool
    {
        return true;
    }

    /**
     * Handle validate_callback arguement for WP_Customize_Manager::add_setting()
     *
     * Adds and returns validation errors for a customizer setting.
     *
     * @access public
     * @param \WP_Error $validity
     * @param string $value
     * @return \WP_Error
     * @since 1.0.0
     */
    public function wts_footer_text_validate_callback( \WP_Error $validity, string $value ) : \WP_Error
    {
        if ( ! is_string( $value ) || strlen( $value ) > 215 ) {
            $validity->add( 'wts_customize', esc_html__( 'Value must be a string, and must not exceed 215 characters', 'wts' ) );
        }

        return $validity;
    }

    /**
     * Handle active_callback arguement for WP_Customize_Manager::add_control()
     *
     * @access public
     * @return bool
     * @since 1.0.0
     */
    public function wts_footer_text_control_active_callback() : bool
    {
        return true;
    }

    /**
     * Handle active_callback arguement for WP_Customize_Manager::add_control()
     *
     * @access public
     * @return bool
     * @since 1.0.0
     */
    public function wts_404_page_text_control_active_callback() : bool
    {
        return is_404();
    }
}