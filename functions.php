<?php
/**
 * This file is where unique features are added to your WordPress theme.
 *
 * This file behaves like a WordPress plugin, adding features and functionality to a WordPress site. It contains Theme class which is used
 * to set up your theme.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter;

use Codestartechnologies\WordpressThemeStarter\Core\Constants as CoreConstants;
use Codestartechnologies\WordpressThemeStarter\Core\ThemeCore;
use Codestartechnologies\WordpressThemeStarter\Helpers\Hooks as HelpersHooks;
use Codestartechnologies\WordpressThemeStarter\Helpers\ObjectsArray;
use Dotenv\Dotenv;
use WTS_Theme\App\Bindings;
use WTS_Theme\App\Constants;
use WTS_Theme\App\Hooks;

/**
 * Prevent direct access to this file from url
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme class
 *
 * Main class used in setting up your theme. This class is designed from a singleton design pattern.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class Theme
{
    /**
     * Instance property of Theme class
     *
     * This property will be used to create one object from Theme class in the whole of program execution.
     *
     * @access private
     * @static
     * @var Theme
     * @since 1.0.0
     */
    private static Theme $instance;

    /**
     * Object containing core functionalities of the theme.
     *
     * It is the main class that will manage and handle all the tasks required by your theme.
     *
     * @access private
     * @var ThemeCore
     * @since 1.0.0
     */
    private ThemeCore $theme_core;

    /**
     * Theme constructor
     *
     * It include autoloader class files, and defines related constants for the theme.
     *
     * @access private
     * @return void
     * @since 1.0.0
     */
    private function __construct()
    {
        // Require composer autoloader file
        require_once trailingslashit( get_template_directory() ) . 'vendor/autoload.php';

        // Require project autoloader file
        require_once trailingslashit( get_template_directory() ) . 'autoload.php';

        // Load .env inside the application
        $dotenv = Dotenv::createImmutable( __DIR__ );
        $dotenv->safeLoad();

        // Define project core constants
        CoreConstants::define_core_constants();

        // Define user constants
        Constants::define_constants();
    }

    /**
     * Theme Instance
     *
     * Creates an instance from Theme class
     *
     * @static
     * @return Theme
     * @since 1.0.0
     */
    public static function instance() : Theme
    {
        // Check for an existing instance and return the instance
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Initialize the theme with dependency injections.
     *
     * Calls Bootstrap class to run dependencies for the theme.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function init() : void
    {
        $this->theme_core = new ThemeCore(
            new Hooks(),
            new HelpersHooks(),
            ObjectsArray::create_objects_with_config( Bindings::$menus ),
            ObjectsArray::create_objects_with_config( Bindings::$themes_menus ),
            ObjectsArray::create_objects_with_config( Bindings::$setting_menus ),
            ObjectsArray::create_objects_with_config( Bindings::$sidebars ),
            ObjectsArray::create_objects( Bindings::$unregistered_widgets ),
            ObjectsArray::create_objects( Bindings::$widgets ),
            ObjectsArray::create_objects_with_config( Bindings::$customizers ),
            ObjectsArray::create_objects_with_config( Bindings::$settings ),
            ObjectsArray::create_objects( Bindings::$admin_notices )
        );

        $this->theme_core->setup();
    }
}

$theme = \Codestartechnologies\WordpressThemeStarter\Theme::instance();
$theme->init();