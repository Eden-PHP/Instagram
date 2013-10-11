<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Instagram\Endpoint;

use Eden\Instagram\Argument;

/**
 * Instagram Comment Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Comment extends Base
{
    protected $connection = 'media';
    protected $link = array(
        'COMMENTS' => 'comments'
    );

    /**
     * Preloads the class.
     *
     * @param string $token access token
     * @return void
     */
    public function __construct($token)
    {
        Argument::i()->test(1, 'string');
        
        parent::__construct($token);
    }

    /**
     * Get a full list of comments on a media.
     *
     * @return array
     */
    public function getComments()
    {
        return $this->getResponse($this->link['COMMENTS']);
    }

    /**
     * Create a comment on a media.
     * Please email apidevelopers@instagram.com for access.
     *
     * @param string $text text to post as a comment on the media
     * @return array
     */
    public function createComment($text)
    {
        Argument::i()->test(1, 'string');

        return $this->postResponse($this->link['COMMENTS'], array('text' => $text));
    }

    /**
     * Remove a comment either on the authenticated user's media or authored
     * by the authenticated user.
     *
     * @param string $commentId id of the comment
     * @return array
     */
    public function removeComment($commentId)
    {
        Argument::i()->test(1, 'string', 'int');

        return $this->deleteResponse($this->link['COMMENTS'] . '/' . $commentId);
    }
}
