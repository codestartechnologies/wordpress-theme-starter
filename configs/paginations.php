<?php
/**
 * This file contains configuration settings for posts pagination
 *
 * @package     WordpressThemeStarter
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://github.com/codestartechnologies/wordpress-theme-starter
 * @since       1.0.0
 */

return array(

    /**
     * Customize markups used in displaying pagination using wts_paginate()
     */
    'pagination_markup'         => array(

        /**
         * Markup for displaying the opening pagination container tag
         *
         * Default: <ul class="wts-flex wts-posts-pagination">
         */
        'wrapper_open'      => '',

        /**
         * Markup for displaying the link to the first page
         *
         * %s is used for generating the link to the page
         *
         * Default: <li><a href="%s">&laquo;</a></li>
         */
        'page_first'        => '',

        /**
         * Markup for displaying the link to the previous page
         *
         * %s is used for generating the link to the page
         *
         * Default: <li><a href="%s">&lsaquo;</a></li>
         */
        'page_prev'         => '',

        /**
         * Markup for displaying the link to the current page
         *
         * %s is used for generating the link to the page
         *
         * Default: <li><span>%s</span></li>
         */
        'page_current'      => '',

        /**
         * Markup for displaying the dynamically generated links
         *
         * %1$s is used for generating the link to the page, %2$s displays the markup text
         *
         * Default: <li><a href="%1$s">%2$s</a></li>
         */
        'page_links'        => '',

        /**
         * Markup for displaying the link to the next page
         *
         * %s is used for generating the link to the page
         *
         * Default: <li><a href="%s">&rsaquo;</a></li>
         */
        'page_next'         => '',

        /**
         * Markup for displaying the link to the last page
         *
         * %s is used for generating the link to the page
         *
         * Default: <li><a href="%s">&raquo;</a></li>
         */
        'page_last'         => '',

        /**
         * Markup for displaying the closing pagination container tag
         *
         * Default: </ul>
         */
        'wrapper_close'     => '',

    ),

    /**
     * Customize markups used in displaying pagination using wts_simple_paginate()
     */
    'simple_pagination_markup'  => array(

        /**
         * Markup for displaying the link to the previous page
         *
         * %1$s is used to generate the link to the page, %2$s is used to dispaly the text
         *
         * Default: <a href="%1$s">%2$s</a>
         */
        'prev'  => '',

        /**
         * Markup for displaying the link to the next page
         *
         * %1$s is used to generate the link to the page, %2$s is used to dispaly the text
         *
         * Default: <a href="%1$s">%2$s</a>
         */
        'next'  => '',

    ),

);