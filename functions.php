<?php
/**
 * This file is where unique features are added to your WordPress theme.
 *
 * This file behaves like a WordPress plugin, adding features and functionality to a WordPress site. It contains WTSTheme class which is used
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
use Codestartechnologies\WordpressThemeStarter\Core\Bootstrap;
use Codestartechnologies\WordpressThemeStarter\Helpers\Arrays;
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
 * WTSTheme class
 *
 * Main class used in setting up your theme. This class is designed from a singleton design pattern.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class WTSTheme
{
    /**
     * Instance property of WTSTheme class
     *
     * This property will be used to create one object from WTSTheme class in the whole of program execution.
     *
     * @access private
     * @static
     * @var WTSTheme
     * @since 1.0.0
     */
    private static WTSTheme $instance;

    /**
     * Object containing core functionalities of the theme.
     *
     * It is the main class that will manage and handle all the tasks required by your theme.
     *
     * @access private
     * @var Bootstrap
     * @since 1.0.0
     */
    private Bootstrap $bootstrap;

    /**
     * WTSTheme constructor
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
     * WTSTheme Instance
     *
     * Creates an instance from WTSTheme class
     *
     * @static
     * @return WTSTheme
     * @since 1.0.0
     */
    public static function instance() : WTSTheme
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
        $this->bootstrap = new Bootstrap(
            new Hooks(),
            Arrays::create_objects_with_config( Bindings::$menus ),
            Arrays::create_objects_with_config( Bindings::$themes_menus ),
            Arrays::create_objects_with_config( Bindings::$setting_menus ),
            Arrays::create_objects_with_config( Bindings::$sidebars ),
            Arrays::create_objects( Bindings::$unregistered_widgets ),
            Arrays::create_objects( Bindings::$widgets ),
            Arrays::create_objects_with_config( Bindings::$customizers ),
            Arrays::create_objects_with_config( Bindings::$settings ),
            Arrays::create_objects( Bindings::$admin_notices )
        );

        $this->bootstrap->setup();
    }
}

$theme = \Codestartechnologies\WordpressThemeStarter\WTSTheme::instance();
$theme->init();