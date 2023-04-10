<?php
/**
 * MenuPage abstract class file.
 *
 * This file contains MenuPage abstract class which contains contracts for creating admin pages in the admin dashboard.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace Codestartechnologies\WordpressThemeStarter\Abstracts;

use Codestartechnologies\WordpressThemeStarter\Interfaces\ActionHooks;
use Codestartechnologies\WordpressThemeStarter\Traits\View;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * MenuPage class
 *
 * This class contains contracts for creating admin pages in the admin dashboard.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
abstract class MenuPage implements ActionHooks
{

    use View;

    /**
     * The text to be displayed in the title tags of the page when the menu is selected.
     *
     * @access protected
     * @var string
     * @since 1.0.0
     */
    protected string $page_title;

    /**
     * The text to be used for the menu.
     *
     * @access protected
     * @var string
     * @since 1.0.0
     */
    protected string $menu_title;

    /**
     * The capability required for this menu to be displayed to the user.
     *
     * @access protected
     * @var string
     * @since 1.0.0
     */
    protected string $capability;

    /**
     * The slug name to refer to this menu by.
     *
     * @access protected
     * @var string
     * @since 1.0.0
     */
    protected string $menu_slug;

    /**
     * The menu icon.
     *
     * @access protected
     * @var string
     * @since 1.0.0
     */
    protected string $menu_icon;

    /**
     * The view that will be rendered in the menu page.
     *
     * @access protected
     * @var string
     * @since 1.0.0
     */
    protected string $view;

    /**
     * The position in the menu order this item should appear.
     *
     * @access protected
     * @var integer|null
     * @since 1.0.0
     */
    protected ?int $position;

    /**
     * The resulting page's hook_suffix.
     *
     * @access protected
     * @var string|null
     * @since 1.0.0
     */
    protected ?string $page_hook = null;

    /**
     * Menu Page constructor
     *
     * @access public
     * @param array $parameters  Initial values to pass to add_menu_page().
     * @return void
     * @since 1.0.0
     */
    public function __construct( array $parameters )
    {
        $this->page_title   = $parameters['page_title'];
        $this->menu_title   = $parameters['menu_title'];
        $this->capability   = $parameters['capability'];
        $this->menu_slug    = $parameters['menu_slug'];
        $this->menu_icon    = $parameters['menu_icon'] ?? '';
        $this->view         = $parameters['view'];
        $this->position     = $parameters['position'];
    }

    /**
     * Register add_action() and remove_action().
     *
     * @final
     * @access public
     * @return void
     * @since 1.0.0
     */
    final public function register_actions() : void
    {
        $hook_suffix = $this->get_menu_hookname();
        add_action( 'admin_menu', array( $this, 'menu_page' ) );
        add_action( "load-{$hook_suffix}", array( $this, 'load_page_hook' ) );
    }

    /**
     * "admin_menu" action hook callback
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function menu_page() : void
    {
        add_menu_page(
            $this->page_title,
            $this->menu_title,
            $this->capability,
            $this->menu_slug,
            array( $this, 'menu_page_cb' ),
            $this->menu_icon,
            $this->position
        );
    }

    /**
     * add_menu_page() callback
     *
     * This method loads the view that will be shown on the admin menu page
     *
     * @final
     * @access public
     * @return void
     * @since 1.0.0
     */
    final public function menu_page_cb() : void
    {
        if ( ! current_user_can( $this->capability ) ) {
            exit;
        }

        $this->load_view( $this->view, $this->view_args() );
    }

    /**
     * The menu page hook name
     *
     * @access protected
     * @return string
     * @since 1.0.0
     */
    protected function get_menu_hookname() : string
    {
        return $this->page_hook ?? 'toplevel_page_' . $this->menu_slug;
    }

    /**
     * Arguments that will be passed to the page view.
     *
     * @abstract
     * @access public
     * @return array
     * @since 1.0.0
     */
    abstract public function view_args() : array;

    /**
     * Fires before the page is loaded.
     *
     * Add functionalties that will run before the menu page is fully loaded.
     *
     * @abstract
     * @access public
     * @return void
     * @since 1.0.0
     */
    abstract public function load_page_hook() : void;
}