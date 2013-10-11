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
 * Instagram Media Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Media extends Base
{
    protected $connection = 'media';
    protected $link = array(
        'POPULAR' => 'popular',
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
     * Get information about a media object.
     * The returned type key will allow you to differentiate between image and video media.
     * Note: If you authenticate with an OAuth Token, you will receive the user_has_liked
     * key which quickly tells you whether the current user has liked this media item.
     *
     * @return array
     */
    public function getMedia()
    {
        return $this->getResponse();
    }

    /**
     * Search for media in a given area. The default time span is set to 5 days.
     * The time span must not exceed 7 days. Defaults time stamps cover the last 5 days.
     * Can return mix of image and video types.
     *
     * @param float|string|null $lat          [optional] latitude of the center search coordinate. (if used, lng is required)
     * @param float|string|null $lng          [optional] longitude of the center search coordinate. (if used, lat is required)
     * @param int|null          $minTimestamp [optional] a unix timestamp, all media returned will be taken later than this timestamp
     * @param int|null          $maxTimestamp [optional] a unix timestamp, all media returned will be taken earlier than this timestamp
     * @param int|null          $distance     [optional] default is 1km (distance=1000), max distance is 5km
     * @return array
     */
    public function search(
            $lat = null,
            $lng = null,
            $minTimestamp = null,
            $maxTimestamp = null, 
            $distance = null
    ) {
        Argument::i()
                ->test(1, 'float', 'string', 'null')
                ->test(2, 'float', 'string', 'null')
                ->test(3, 'int', 'null')
                ->test(4, 'int', 'null')
                ->test(5, 'int', 'null');

        $post = array(
            'lat' => $lat,
            'lng' => $lng,
            'min_timestamp' => $minTimestamp,
            'max_timestamp' => $maxTimestamp,
            'distance' => $distance
        );

        return $this->getResponse($this->link['SEARCH'], $post, false);
    }

    /**
     * Get a list of what media is most popular at the moment. Can return mix of image and video types.
     *
     * @return array
     */
    public function popular()
    {
        return $this->getResponse($this->link['POPULAR'], array(), false);
    }
}
