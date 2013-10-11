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
 * Instagram User Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class User extends Base
{
    protected $connection = 'users';
    protected $link = array(
        'FEED' => 'feed',
        'RECENT' => 'media/recent',
        'LIKED' => 'media/liked',
        'SEARCH' => 'search'
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
     * Get basic information about a user.
     *
     * @return array
     */
    public function getInfo()
    {
        return $this->getResponse();
    }

    /**
     * See the authenticated user's feed. May return a mix of both image and video types.
     *
     * @param int|null    $count [optional] count of media to return
     * @param string|null $minId [optional] return media later than this min_id
     * @param string|null $maxId [optional] return media earlier than this max_id
     * @return array
     */
    public function getFeed($count = null, $minId = null, $maxId = null)
    {
        Argument::i()
                ->test(1, 'int', 'null')
                ->test(2, 'string', 'null')
                ->test(3, 'string', 'null');

        $post = array(
            'count' => $count,
            'min_id' => $minId,
            'max_id' => $maxId
        );

        return $this->getResponse($this->link['FEED'], $post);
    }

    /**
     * Get the most recent media published by a user. May return a mix of both image and video types.
     *
     * @param int|null    $count        [optional] count of media to return
     * @param int|null    $minTimestamp [optional] return media before this UNIX timestamp
     * @param int|null    $maxTimestamp [optional] return media after this UNIX timestamp
     * @param string|null $minId        [optional] media later than this min_id
     * @param string|null $maxId        [optional] media earlier than this max_id
     * @return array
     */
    public function getMediaRecent(
            $count = null,
            $minTimestamp = null,
            $maxTimestamp = null,
            $minId = null,
            $maxId = null
    ) {
        Argument::i()
                ->test(1, 'int', 'null')
                ->test(2, 'int', 'null')
                ->test(3, 'int', 'null')
                ->test(4, 'string', 'null')
                ->test(5, 'string', 'null');

        $post = array(
            'count' => $count,
            'min_timestamp' => $minTimestamp,
            'max_timestamp' => $maxTimestamp,
            'min_id' => $minId,
            'max_id' => $maxId
        );

        return $this->getResponse($this->link['RECENT'], $post);
    }

    /**
     * See the authenticated user's list of media they've liked.
     * May return a mix of both image and video types.
     * Note: This list is ordered by the order in which the user liked the media.
     * Private media is returned as long as the authenticated user has permission
     * to view that media. Liked media lists are only available for the currently
     * authenticated user.
     *
     * @param int|null    $count      count of media to return
     * @param string|null $maxLikedId return media liked before this id
     * @return array
     */
    public function getMediaLiked($count = null, $maxLikedId = null)
    {
        Argument::i()
                ->test(1, 'int', 'null')
                ->test(2, 'string', 'null');

        $post = array(
            'count' => $count,
            'max_liked_id' => $maxLikedId
        );

        return $this->getResponse($this->link['LIKED'], $post);
    }

    /**
     * Search for a user by name.
     *
     * @param string   $query a query string
     * @param int|null $count number of users to return
     * @return array
     */
    public function search($query, $count = null)
    {
        Argument::i()
                ->test(1, 'string')
                ->test(2, 'int', 'null');

        $post = array(
            'count' => $count,
            'q' => $query
        );

        return $this->getResponse($this->link['SEARCH'], $post, false);
    }
}
