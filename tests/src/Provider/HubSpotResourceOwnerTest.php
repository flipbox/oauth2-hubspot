<?php namespace League\OAuth2\Client\Test\Provider;

use Mockery as m;

class HubSpotResourceOwnerTest extends \PHPUnit_Framework_TestCase
{
    public function testEmailIsNullWithoutResponse()
    {
        $user = new \Flipbox\OAuth2\Client\Provider\HubSpotResourceOwner;

        $value = $user->getEmail();

        $this->assertNull($value);
    }

    public function testIdIsNullWithoutResponse()
    {
        $user = new \Flipbox\OAuth2\Client\Provider\HubSpotResourceOwner;

        $value = $user->getId();

        $this->assertNull($value);
    }

    public function testHubIdIsNullWithoutResponse()
    {
        $user = new \Flipbox\OAuth2\Client\Provider\HubSpotResourceOwner;

        $value = $user->getHubId();

        $this->assertNull($value);
    }

    public function testAppIdIsNullWithoutResponse()
    {
        $user = new \Flipbox\OAuth2\Client\Provider\HubSpotResourceOwner;

        $value = $user->getAppId();

        $this->assertNull($value);
    }

    public function testDomainIsNullWithoutResponse()
    {
        $user = new \Flipbox\OAuth2\Client\Provider\HubSpotResourceOwner;

        $value = $user->getDomain();

        $this->assertNull($value);
    }

    public function testResponsePropertyMapping()
    {
        $response = [
            'token' => uniqid().uniqid(),
            'user' => uniqid().'@'.uniqid().'.com',
            'hub_domain' => uniqid().'.com',
            'scopes' => [
                'contacts',
                'content',
                'oauth'
            ],
            'hub_id' => rand(6, 10),
            'app_id' => rand(6, 10),
            'expires_in' => rand(6, 10),
            'user_id' => rand(6, 10),
            'token_type' => 'access'
        ];
        $user = new \Flipbox\OAuth2\Client\Provider\HubSpotResourceOwner($response);

        $this->assertEquals($response['hub_domain'], $user->getDomain());
        $this->assertEquals($response['user'], $user->getEmail());
        $this->assertEquals($response['user_id'], $user->getId());
        $this->assertEquals($response['scopes'], $user->getScopes());
        $this->assertEquals($response['hub_id'], $user->getHubId());
        $this->assertEquals($response['app_id'], $user->getAppId());
        $this->assertEquals($response['expires_in'], $user->getExpires());
    }

}
