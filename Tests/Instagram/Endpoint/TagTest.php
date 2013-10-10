<?php

namespace Eden\Instagram\Endpoint;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-10-10 at 02:33:37.
 */
class TagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Tag
     */
    protected $key = '';
    protected $secret = '';
    protected $redirect = '';
    protected $code = '';
    protected $token = '';
    protected $tag;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        if (!empty($this->token)) {
            $this->tag = eden('instagram')
                    ->endpoint($this->token)
                    ->tag();
        }
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    public function testCode()
    {
        if (empty($this->code) && empty($this->token)) {
            $scope = array(
                'basic',
                'comments',
                'relationships',
                'likes'
            );

            $url = eden('instagram')
                    ->auth($this->key, $this->secret, $this->redirect)
                    ->getLoginUrl($scope);

            $this->assertTrue(false, 'Please login to this url: ' . $url);
        }
    }

    public function testToken()
    {
        if (empty($this->code) || empty($this->token)) {
            $auth = eden('instagram')
                    ->auth($this->key, $this->secret, $this->redirect);

            $accessToken = $auth->getAccess($this->code);

            if (isset($accessToken['access_token'])) {
                $this->assertTrue(false,
                                  'Your access token: ' . $accessToken['access_token']);
            } else {
                $meta = $auth->getMeta();

                $url = $meta['url'];
                $url .= '?' . http_build_query($meta['query']);

                $this->assertTrue(false,
                                  'Put the access code and get the access token from this: ' . $url);
            }
        }
    }

    /**
     * @covers Eden\Instagram\Endpoint\Tag::getInfo
     */
    public function testGetInfo()
    {
        if (empty($this->token)) {
            return;
        }

        $response = $this->tag->getInfo();
        
        if (!is_array($response)) {
            $this->assertTrue($response === null);
        } else if (isset($response['meta']['error_message'])) {
            $this->assertTrue(false, $response['meta']['error_message']);
        } else {
            $this->assertArrayHasKey('data', $response);
        }
    }

    /**
     * @covers Eden\Instagram\Endpoint\Tag::getRecent
     */
    public function testGetRecent()
    {
        if (empty($this->token)) {
            return;
        }

        $response = $this->tag->getRecent();
        
        if (!is_array($response)) {
            $this->assertTrue($response === null);
        } else if (isset($response['meta']['error_message'])) {
            $this->assertTrue(false, $response['meta']['error_message']);
        } else {
            $this->assertArrayHasKey('data', $response);
        }
    }

    /**
     * @covers Eden\Instagram\Endpoint\Tag::search
     */
    public function testSearch()
    {
        if (empty($this->token)) {
            return;
        }

        $response = $this->tag->search('love');
        
        if (!is_array($response)) {
            $this->assertTrue($response === null);
        } else if (isset($response['meta']['error_message'])) {
            $this->assertTrue(false, $response['meta']['error_message']);
        } else {
            $this->assertArrayHasKey('data', $response);
        }
    }

}