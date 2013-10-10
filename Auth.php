<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2011-2012 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Instagram;

use Eden\Oauth\Oauth2\Client;

/**
 * Instagram Authentication
 *
 * @vendor Eden
 * @package Instagram
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Auth extends Client
{
    const REQUEST_URL = 'https://api.instagram.com/oauth/authorize';
    const ACCESS_URL = 'https://api.instagram.com/oauth/access_token';
    const USER_AGENT = 'instagram-php-3.1';

    /**
     * Sets the application's key, secret and redirect uri.
     *
     * @param string $key          the application's key
     * @param string $secret       the application's secret
     * @param string $redirect     the application's redirect uri
     * @param string $responseType [optional] response type you want
     * @return void
     */
    public function __construct($key, $secret, $redirect, $responseType = self::CODE)
    {
        Argument::i()
                ->test(1, 'string')
                ->test(2, 'string')
                ->test(3, 'url')
                ->test(4, 'string');

        $this->responseType = $responseType;

        parent::__construct($key, $secret, $redirect, self::REQUEST_URL, self::ACCESS_URL);
    }
}
