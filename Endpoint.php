<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Instagram;

use Eden\Instagram\Endpoint\Comment;
use Eden\Instagram\Endpoint\Geography;
use Eden\Instagram\Endpoint\Like;
use Eden\Instagram\Endpoint\Location;
use Eden\Instagram\Endpoint\Media;
use Eden\Instagram\Endpoint\Relationship;
use Eden\Instagram\Endpoint\Tag;
use Eden\Instagram\Endpoint\User;

/**
 * Endpoint factory. This is a factory class with
 * methods that will load up different Instagram API classes.
 *
 * @vendor Eden
 * @package Instagram
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Endpoint extends Base
{
    /**
     * Preloads the access token.
     *
     * @param string $token access token
     * @return void
     */
    public function __construct($token)
    {
        Argument::i()->test(1, 'string');
        
        $this->token = $token;
    }

    /**
     * Returns new instance of comment.
     *
     * @return \Eden\Instagram\Endpoint\Comment
     */
    public function comment()
    {
        return Comment::i($this->token);
    }

    /**
     * Returns new instance of geography.
     *
     * @return \Eden\Instagram\Endpoint\Geography
     */
    public function geography()
    {
        return Geography::i($this->token);
    }

    /**
     * Returns new instance of like.
     *
     * @return \Eden\Instagram\Endpoint\Like
     */
    public function like()
    {
        return Like::i($this->token);
    }

    /**
     * Returns new instance of location.
     *
     * @return \Eden\Instagram\Endpoint\Location
     */
    public function location()
    {
        return Location::i($this->token);
    }

    /**
     * Returns new instance of media.
     *
     * @return \Eden\Instagram\Endpoint\Media
     */
    public function media()
    {
        return Media::i($this->token);
    }

    /**
     * Returns new instance of relationship.
     *
     * @return \Eden\Instagram\Endpoint\Relationship
     */
    public function relationship()
    {
        return Relationship::i($this->token);
    }

    /**
     * Returns new instance of tag.
     *
     * @return \Eden\Instagram\Endpoint\Tag
     */
    public function tag()
    {
        return Tag::i($this->token);
    }

    /**
     * Returns new instance of user.
     *
     * @return \Eden\Instagram\Endpoint\User
     */
    public function user()
    {
        return User::i($this->token);
    }
}
