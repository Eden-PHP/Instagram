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
 * Instagram Geography Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Geography extends Base
{
    protected $connection = 'geographies';
    protected $link = array(
        'RECENT' => 'media/recent'
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
     * Get recent media from a geography subscription that you created.
     * Note: You can only access Geographies that were explicitly created by 
     * your OAuth client. Check the Geography Subscriptions section of the 
     * real-time updates page. When you create a subscription to some geography 
     * that you define, you will be returned a unique geo-id that can be used 
     * in this query. To backfill photos from the location covered by this 
     * geography, use the media search endpoint.
     *
     * @param int|null    $count max number of media to return
     * @param string|null $minId return media before this min_id
     * @return array
     */
    public function getRecent($count = null, $minId = null)
    {
        Argument::i()
                ->test(1, 'int', 'null')
                ->test(2, 'string', 'null');

        $query = array(
            'count' => $count,
            'min_id' => $minId
        );

        return $this->getResponse($this->link['RECENT'], $query);
    }
}
