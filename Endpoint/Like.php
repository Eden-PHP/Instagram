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
 * Instagram Like Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Like extends Base
{
    protected $connection = 'media';
    protected $link = array(
        'LIKES' => 'likes'
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
     * Get a list of users who have liked this media.
     *
     * @return array
     */
    public function getLikes()
    {
        return $this->getResponse($this->link['LIKES']);
    }

    /**
     * Set a like on this media by the currently authenticated user.
     *
     * @return array
     */
    public function like()
    {
        return $this->postResponse($this->link['LIKES']);
    }

    /**
     * Remove a like on this media by the currently authenticated user.
     *
     * @return array
     */
    public function unlike()
    {
        return $this->deleteResponse($this->link['LIKES']);
    }
}
