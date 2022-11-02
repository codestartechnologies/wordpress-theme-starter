<?php
/**
 * This file contains configuration settings for posts pagination
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

return array(
    /**
     * Customize markups used in displaying pagination using wts_paginate()
     */
    'pagination_markup'         => array(
        /**
         * Markup for displaying the opening pagination container tag
         *
         * Default: <nav>
         */
        'wrapper_open'      => '',

        /**
         * Markup for displaying the link to the first page
         *
         * %s is used for generating the link to the page
         *
         * Default: <a href="%s">&laquo;</a>
         */
        'page_first'        => '',

        /**
         * Markup for displaying the link to the previous page
         *
         * %s is used for generating the link to the page
         *
         * Default: <a href="%s">&lsaquo;</a>
         */
        'page_prev'         => '',

        /**
         * Markup for displaying the link to the current page
         *
         * %s is used for generating the link to the page
         *
         * Default: <a class="active" href="javascript:void(0);">%s</a>
         */
        'page_current'      => '',

        /**
         * Markup for displaying the dynamically generated links
         *
         * %1$s is used for generating the link to the page, %2$s displays the markup text
         *
         * Default: <a href="%1$s">%2$s</a>
         */
        'page_links'        => '',

        /**
         * Markup for displaying the link to the next page
         *
         * %s is used for generating the link to the page
         *
         * Default: <a href="%s">&rsaquo;</a>
         */
        'page_next'         => '',

        /**
         * Markup for displaying the link to the last page
         *
         * %s is used for generating the link to the page
         *
         * Default: <a href="%s">&raquo;</a>
         */
        'page_last'         => '',

        /**
         * Markup for displaying the closing pagination container tag
         *
         * Default: </nav>
         */
        'wrapper_close'     => '',
    ),

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