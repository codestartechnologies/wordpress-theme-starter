<?php
/**
 * Sidebar class file.
 *
 * This file contains Sidebar class for registering theme sidebar areas.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Public\Sidebars;

use Codestartechnologies\WordpressThemeStarter\Abstracts\Sidebar as AbstractsSidebar;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Sidebar' ) ) {
    /**
     * Class Sidebar
     *
     * This file contains Sidebar class for registering theme sidebar areas.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class Sidebar extends AbstractsSidebar {
        /**
         * Sidebar constructor
         *
         * @access public
         * @param array $parameters     Initial parameters passed to register_sidebar() method
         * @return void
         * @since 1.0.0
         */
        public function __construct( array $parameters )
        {
            parent::__construct( $parameters );
        }
    }
}