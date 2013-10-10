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
 * Instagram Tag Endpoint
 *
 * @vendor Eden
 * @package Instagram\Endpoint
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Tag extends Base
{
    protected $connection = 'tags';
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
     * Get information about a tag object.
     *
     * @return array
     */
    public function getInfo()
    {
        return $this->getResponse();
    }

    /**
     * Get a list of recently tagged media. Note that this media is ordered by
     * when the media was tagged with this tag, rather than the order it was posted.
     * Use the $maxTagId and $minTagId parameters in the pagination response to
     * paginate through these objects. Can return a mix of image and video types.
     *
     * @param string|null $maxTagId [optional] return media before this min_id
     * @param string|null $minTagId [optional] return media after this max_id
     * @return array
     */
    public function getRecent($maxTagId = null, $minTagId = null)
    {
        Argument::i()
                ->test(1, 'string', 'null')
                ->test(2, 'string', 'null');

        $post = array(
            'max_tag_id' => $maxTagId,
            'min_tag_id' => $minTagId
        );

        return $this->getResponse($this->link['RECENT'], $post);
    }

    /**
     * Search for tags by name. Results are ordered first as an exact match, then by popularity.
     * Short tags will be treated as exact matches.
     *
     * @param string $query a valid tag name without a leading #. (eg. snowy, nofilter)
     * @return array
     */
    public function search($query)
    {
        Argument::i()->test(1, 'string');

        $post = array(
            'q' => $query
        );

        return $this->getResponse($this->link['SEARCH'], $post, false);
    }
}
