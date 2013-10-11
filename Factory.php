<?php //-->
/*
 * This file is part of the Eden package.
 * (c) 2011-2012 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Instagram;

/**
 * Instagram API factory. This is a factory class with
 * methods that will load up different Instagram classes.
 *
 * @vendor Eden
 * @package Instagram
 * @author Ian Mark Muninio <ianmuninio@openovate.com>
 */
class Factory extends Base
{
    const INSTANCE = 1; // set to singleton

    /**
     * Returns the instance of Auth.
     *
     * @param string $key          the application's key
     * @param string $secret       the application's secret
     * @param string $redirect     the application's redirect uri
     * @return \Eden\Instagram\Auth
     */
    public function auth($key, $secret, $redirect)
    {
        Argument::i()
                ->test(1, 'string')
                ->test(2, 'string')
                ->test(3, 'url');

        return Auth::i($key, $secret, $redirect);
    }

    /**
     * Returns the instance of Endpoint.
     *
     * @param string $token the access token
     * @return \Eden\Instagram\Endpoint
     */
    public function endpoint($token)
    {
        Argument::i()->test(1, 'string');

        return Endpoint::i($token);
    }
}
