<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2011-2012 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Instagram\Endpoint;

use Eden\Instagram\Argument;

/**
 * Instagram Relationship Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Relationship extends Base
{
    protected $connection = 'users';
    protected $link = array(
        'FOLLOW' => 'follows',
        'FOLLOWED_BY' => 'followed-by',
        'REQUESTED_BY' => 'requested-by',
        'RELATIONSHIP' => 'relationship'
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
     * Get the list of users this user follows.
     *
     * @return array
     */
    public function getFollows()
    {
        return $this->getResponse($this->link['FOLLOW']);
    }

    /**
     * Get the list of users this user is followed by.
     *
     * @return array
     */
    public function getFollowedBy()
    {
        return $this->getResponse($this->link['FOLLOWED_BY']);
    }

    /**
     * List the users who have requested this user's permission to follow.
     *
     * @return array
     */
    public function getRequestedBy()
    {
        return $this->getResponse($this->link['REQUESTED_BY']);
    }

    /**
     * Get information about a relationship to another user.
     *
     * @return array
     */
    public function getRelationship()
    {
        return $this->getResponse($this->link['RELATIONSHIP']);
    }

    /**
     * Follow the targeted user.
     *
     * @return array
     */
    public function follow()
    {
        return $this->setRelationship('follow');
    }

    /**
     * Unfollow the targeted user.
     *
     * @return array
     */
    public function unfollow()
    {
        return $this->setRelationship('unfollow');
    }

    /**
     * Block the targeted user.
     *
     * @return array
     */
    public function block()
    {
        return $this->setRelationship('block');
    }

    /**
     * Unblock the targeted user.
     *
     * @return array
     */
    public function Unblock()
    {
        return $this->setRelationship('unblock');
    }

    /**
     * Approve the targeted user.
     *
     * @return array
     */
    public function approve()
    {
        return $this->setRelationship('approve');
    }

    /**
     * Ignore the targeted user.
     *
     * @return array
     */
    public function ignore()
    {
        return $this->setRelationship('ignore');
    }

    /**
     * Modify the relationship between the current user and the target user.
     *
     * @param string $action action to be made
     * @return array
     */
    protected function setRelationship($action)
    {
        Argument::i()->test(1, 'string');

        return $this->postResponse($this->link['RELATIONSHIP'],
                        array('action' => $action));
    }
}
