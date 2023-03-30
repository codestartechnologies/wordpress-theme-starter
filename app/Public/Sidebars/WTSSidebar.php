<?php
/**
 * WTSSidebar class file.
 *
 * This is an example class file for registering theme sidebar areas.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace WTS_Theme\App\Public\Sidebars;

use Codestartechnologies\WordpressThemeStarter\Abstracts\Sidebar as AbstractsSidebar;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class WTSSidebar
 *
 * This file contains Sidebar class for registering theme sidebar areas.
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class WTSSidebar extends AbstractsSidebar
{
    /**
     * WTSSidebar constructor
     *
     * @access public
     * @param array $parameters     Initial parameters passed to register_sidebar()
     * @return void
     * @since 1.0.0
     */
    public function __construct( array $parameters )
    {
        parent::__construct( $parameters );
    }
}