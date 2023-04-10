<?php
/**
 * WTSThemePage class file.
 *
 * This is file contains WTSThemePage class. This class will create an admin page under `Appearance`.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace WTS_Theme\App\Admin\Menus;

use Codestartechnologies\WordpressThemeStarter\Abstracts\ThemePage as AbstractsThemePage;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WTSThemePage class
 *
 * This class will create an admin page under `Appearance`.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class WTSThemePage extends AbstractsThemePage
{
    /**
     * WTSThemePage constructor
     *
     * @access public
     * @param array $parameters   Initial parameters passed to add_theme_page()
     * @return void
     * @since 1.0.0
     */
    public function __construct( array $parameters )
    {
        parent::__construct( $parameters );
    }

    /**
     * Arguments that will be passed to the page view.
     *
     * @access public
     * @return array
     * @since 1.0.0
     */
    public function view_args(): array
    {
        return array();
    }

    /**
     * Add functionalties that will run before the menu page is fully loaded.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function load_page_hook(): void
    {
        //
    }
}