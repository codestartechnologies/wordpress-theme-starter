<?php
/**
 * WTSMenuPage class file.
 *
 * This file contains WTSMenuPage class. This class will create an admin page in the admin dashboard.
 *
 * @package    WordpressThemeStarter
 * @author     Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link       https://github.com/codestartechnologies/wordpress-theme-starter
 * @since      1.0.0
 */

namespace WTS_Theme\App\Admin\Menus;

use Codestartechnologies\WordpressThemeStarter\Abstracts\MenuPage as AbstractsMenuPage;

/**
 * Prevent direct access to this file.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class WTSMenuPage
 *
 * This class will create an admin page in the admin dashboard.
 *
 * @package WordpressThemeStarter
 * @author  Chijindu Nzeako <chijindunzeako517@gmail.com>
 */
final class WTSMenuPage extends AbstractsMenuPage
{
    /**
     * WTSMenuPage constructor
     *
     * @access public
     * @param array $parameters   Initial parameters passed to add_menu_page()
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
        return array(

            'random_string' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quidem suscipit voluptas aliquam in nisi, iste dolorem incidunt possimus ab, ullam mollitia, velit nostrum sunt repellat a ipsum laborum repudiandae!',
        );
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