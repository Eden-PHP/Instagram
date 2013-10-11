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
     * @param string $key      the application's key
     * @param string $secret   the application's secret
     * @param string $redirect the application's redirect uri
     * @return void
     */
    public function __construct($key, $secret, $redirect)
    {
        Argument::i()
                ->test(1, 'string')
                ->test(2, 'string')
                ->test(3, 'url');

        parent::__construct($key, $secret, $redirect, self::REQUEST_URL, self::ACCESS_URL);
    }
    
    /**
     * Sets the response type authentication.
     * Current response types are Client::CODE and Client::TOKEN.
     * 
     * @param string $responseType
     * @return \Eden\Instagram\Auth
     */
    public function setResponseType($responseType)
    {
        Argument::i()->test(1, 'string');
        
        $this->responseType = $responseType;
        
        return $this;
    }
    
    /**
     * Gets the response type.
     * 
     * @return string
     */
    public function getResponseType() {
        return $this->responseType;
    }
}
