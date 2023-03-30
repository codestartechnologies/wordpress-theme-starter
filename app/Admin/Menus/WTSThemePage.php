<?php
/**
 * WTSThemePage class file.
 *
 * This is an example class file for creating admin menu pages with add_theme_page().
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
 * Class WTSThemePage
 *
 * This class registers admin menus using add_theme_page(). This class must implement view_args() and load_page_hook() methods.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
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
     * Get arguments that will be passed to the page.
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