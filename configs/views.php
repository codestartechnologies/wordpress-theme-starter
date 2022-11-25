<?php
/**
 * This file contains configuration settings for loading views
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

return array(
    /**
     * Customize markups used in displaying error messages when loading views
     */
    'error_messages'    => array(
        /**
         * Markup for not found error message when loading a view
         *
         * %s shows the full path to the requested view
         *
         * Default: <h3 style="color: red;">View could not be loaded!</h3><p>There was an error loading <b>%s</b>. Please check file exist and is readable. </p>
         */
        'not_found'     => '',

        /**
         * Markup for invalid view type error message when loading a view
         *
         * %s shows the type of the requested view
         *
         * Default: <h3 style="color: red;">View type does not exist!</h3><p>View of type <b>%s</b> is invalid. Valid types are <em>admin</em> and <em>site</em> </p>
         */
        'invalid_type'  => '',
    ),

);
