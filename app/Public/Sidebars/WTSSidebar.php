<?php
/**
 * WTSSidebar class file.
 *
 * This is an example class file for registering theme sidebar areas.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @link       https://codestar.com.ng
 * @since      1.0.0
 */

namespace App\Public\Sidebars;

use Codestartechnologies\WordpressThemeStarter\Abstracts\Sidebar as AbstractsSidebar;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WTSSidebar' ) ) {
    /**
     * Class WTSSidebar
     *
     * This file contains Sidebar class for registering theme sidebar areas.
     *
     * @package WordpressThemeStarter
     * @author Chijindu Nzeako <chijindunzeako517@gmail.com>
     */
    final class WTSSidebar extends AbstractsSidebar {
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
}