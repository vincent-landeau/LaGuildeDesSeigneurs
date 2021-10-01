<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CharacterControllerTest extends WebTestCase
{
    /**
     * Tests index
     */
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/character');

        $this->assertJsonResponse($client->getResponse());
    }

    public function testDisplay()
    {
        $client = static::createClient();
        $client->request('GET', '/character/display/185f84a61cf8544ce266095fdfc4a13ddc2dd415');

        $this->assertJsonResponse($client->getResponse());
    }

    public function assertJsonResponse($response)
    {
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'), $response->headers);

    }
}
