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
     * Customize markups used when filtering comments lists
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

    /**
     * Customize the opening tag markup for html element that will be added after the opening comment form tag
     *
     * Default: <div id="wts-form-inner">
     */
    'after_open_form_tag' => '',

    /**
     * Customize the closing tag markup for html element that will be added before the closing comment form tag
     *
     * Default: </div>
     */
    'before_close_form_tag' => '',

    /**
     * Customize the markup for html element that will be added after the comment form
     *
     * Default: <br />
     */
    'after_form' => '',

    /**
     * Customize the markup for html element that will be added before the comment form
     *
     * Default:
     */
    'before_form' => '',

    /**
     * Customize the markup used when filtering comment form default arguments.
     */
    'form_defaults_markup'  => array(
        /**
         * Opening tag markup
         *
         * Default: <h3>
         */
        'title_reply_before'    => '',

        /**
         * Closing tag markup
         *
         * Default: </h3>
         */
        'title_reply_after'     => '',

        /**
         * Markup to display must be logged in message
         *
         * %1$s displays the message, %2$s generates the login link, %3$s displays the login link text
         *
         * Default: <p> %1$s <a href="%2$s">%3$s</a> </p>
         */
        'must_log_in'           => '',

        /**
         * Markup to display logged in as
         *
         * %1$s displays the message, %2$s generates the logout link, %3$s displays the logout link text
         *
         * Default: <p> %1$s <a href="%2$s">%3$s</a> </p>
         */
        'logged_in_as'          => '',

        /**
         * Markup used to wrap the comments note text
         *
         * %s displays the comments note
         *
         * Default: <p>%s</p>
         */
        'comment_notes_before'  => '',

        /**
         * Markup used to display reply to
         *
         * %1$s displays the message, %2$s generates the reply link, %3$s displays the reply the text
         *
         * Default: %1$s <a href="%2$s">%3$s</a>
         */
        'title_reply_to'        => '',

    ),

    /**
     * Customize markup for cancel comment reply link HTML
     */
    'cancel_reply_markup'  => array(
        /**
         * Markup for the cancel comment reply link
         *
         * %1$s generates the cancel reply link, %2$s displays the text, %3$s generates the style attribute
         *
         * Default: <a href="%1$s" %3$s>%2$s</a>
         */
        'container'  => '',
    ),

    /**
     * Customize markup for comment form fields
     */
    'fields_markup'    => array(

        /**
         * Markup to display author field
         *
         * %1$s generates the input field name, %2$s holds the value of the field
         *
         * Default: <p><label>Fullname</label><input type="text" name="%1$s" value="%2$s" /></p><br />
         */
        'author'    => '',

        /**
         * Markup to display email field
         *
         * %1$s generates the input field name, %2$s holds the value of the field
         *
         * Default: <p><label>Email Address</label><input type="email" name="%1$s" value="%2$s" /></p><br />
         */
        'email'     => '',

        /**
         * Markup to display comment field
         *
         * %s generates the textarea field name
         *
         * Default: <p><label>Your Comment</label><textarea name="%s"></textarea></p><br />
         */
        'comment'   => '',

        /**
         * Markup to display cookie consent field
         *
         * %1$s generates the checbox field name, %2$s adds checked attribute to the field, %3$s displays the consent text
         *
         * Default: <p><input type="checkbox" name="%1$s" value="yes" %2$s /><label>%3$s</label></p><br />
         */
        'cookies'   => '',

    ),

    /**
     * Customize markup for filtering the submit field for the comment form to display
     */
    'submit_field_markup'   => array(
        /**
         * Default: <p> %1$s %2$s </p>
         */
        'container' => '',

        /**
         * Markup for the submit element. Can be input element or button
         *
         * %1$s generates the field name, %2$s generates the field id
         *
         * Default: <button type="submit" name="%1$s" id="%2$s">Add Comment</button>
         */
        'button'    => '',

    ),

);