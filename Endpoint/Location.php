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
 * Instagram Location Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Location extends Base
{
    protected $connection = 'locations';
    protected $link = array(
        'RECENT' => 'media/recent',
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
     * Get information about a location.
     *
     * @return array
     */
    public function getInfo()
    {
        return $this->getResponse();
    }

    /**
     * Get a list of recent media objects from a given location.
     * May return a mix of both image and video types.
     *
     * @param int|null    $minTimestamp [optional] return media before this UNIX timestamp
     * @param int|null    $maxTimestamp [optional] return media after this UNIX timestamp
     * @param string|null $minId        [optional] media later than this min_id
     * @param string|null $maxId        [optional] media earlier than this max_id
     * @return array
     */
    public function getRecent(
            $minTimestamp = null, 
            $maxTimestamp = null, 
            $minId = null, 
            $maxId = null
    ) {
        Argument::i()
                ->test(1, 'int', 'null')
                ->test(2, 'int', 'null')
                ->test(3, 'string', 'null')
                ->test(4, 'string', 'null');

        $post = array(
            'min_timestamp' => $minTimestamp,
            'max_timestamp' => $maxTimestamp,
            'min_id' => $minId,
            'max_id' => $maxId
        );

        return $this->getResponse($this->link['RECENT'], $post);
    }

    /**
     * Search for a location by geographic coordinate.
     *
     * @param float|string|null $lat            [optional] latitude of the center search coordinate. (if used, lng is required)
     * @param float|string|null $lng            [optional] longitude of the center search coordinate. (if used, lat is required)
     * @param int|null          $distance       [optional] default is 1km (distance=1000), max distance is 5km
     * @param string|null       $foursquareV2Id [optional] returns a location mapped off of a foursquare v2 api location id.
     *                                          (if used, you are not required to use lat and lng)
     * @return array
     */
    public function search(
            $lat = null, 
            $lng = null, 
            $distance = null,
            $foursquareV2Id = null
    ) {
        Argument::i()
                ->test(1, 'float', 'string', 'null')
                ->test(2, 'float', 'string', 'null')
                ->test(3, 'int', 'null')
                ->test(4, 'string', 'null');

        $post = array(
            'lat' => $lat,
            'lng' => $lng,
            'distance' => $distance,
            'foursquare_v2_id' => $foursquareV2Id
        );

        return $this->getResponse($this->link['SEARCH'], $post, false);
    }
}
