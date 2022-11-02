<?php
/**
 * This file contains configuration settings for filtering comments
 *
 * @author      Chijindu Nzeako <chijindunzeako517@gmail.com>
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt GNU/AGPLv3
 * @link        https://codestar.com.ng
 */

return array(
    /**
     * Customize markups used in displaying when filtering comments lists
     */
    'comments_lists_markup' => array (
        /**
         * Markup for displaying a single comment opening list tag
         *
         * %1$s is used to display dynamic comment class, %2$s is used to display dynamic comment id
         *
         * Default: <li %1$s id="comment-%2$s">
         */
        'list_open'         => '',

        /**
         * Markup for displaying awaiting moderation
         *
         * %s is used to display the moderation message
         *
         * Default: <p><em class="comment-awaiting-moderation">%s</em></p>
         */
        'awaiting_approval' => '',

        /**
         * Markup to display log in message
         *
         * %1$s generates the login url, %2$s displays the log in message
         *
         * Default: <a href="%1$s">%2$s</a>
         */
        'login_to_comment'  => '',

        /**
         * Markup to display reply link
         *
         * %s generates the reply link
         *
         * Default: <a href="%s">Reply</a>
         */
        'reply_to_comment'  => '',

        /**
         * Markup for displaying meta information associated with the comment
         *
         * %1$s displays the author name, %2$s displays the date the comment was submited, %3$s displays the reply link
         *
         * Default: <div> <div><span>%1$s</span> - %3$s</div> <div><span>%2$s</span></div> </div>
         */
        'comment_meta'      => '',

        /**
         * Markup to display edit comment link
         *
         * %s is used to generate the edit link
         *
         * Default: <p><a href="%s">Edit comment</a></p>
         */
        'edit_comment'      => '',

        /**
         * Markup for displaying the comment
         *
         * %1$s is used for displaying the comment text, %2$s displays the edit comment link
         *
         * Default: <p> %1$s %2$s </p>
         */
        'comment'           => '',

    ),

);