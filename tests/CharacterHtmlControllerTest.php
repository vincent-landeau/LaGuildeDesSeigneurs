<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Constraints as Assert;

class CharacterHtmlControllerTest extends WebTestCase
{
    private $client; 
    private $content; 
    private static $identifier;

    public function setUp() : void
    {
        $this->client = static::createClient();
    }

    public function testNew()
    {
        $this->client->request('GET', '/character/html/new');
        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
    }

    /**
     * Tests index.
     */
    public function testIndex()
    {
        $this->client->request('GET', '/character/html/');

        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
    }

    /**
     * Tests get all characters whose intelligence level is greater than or equal to a level.
     */
    public function testAllByIntelligenceLevel()
    {
        $this->client->request('GET', '/character/html/intelligence/120');
        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
    }

    /**
     * Test d'affichage d'un caractère;
     */
    public function testDisplay()
    {
        $this->client->request('GET', '/character/html/' . self::$identifier);
        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
    }

    public function testBadIdentifier()
    {
        $this->client->request('GET', '/character/html/badIdentifier');
        $this->assertError404($this->client->getResponse()->getStatusCode());
    }

    public function testInexistingIdentifier()
    {
        $this->client->request('GET', '/character/html/chara7414a10767e9f5e71d2fdd262c9a34ec695error');
        $this->assertError404($this->client->getResponse()->getStatusCode());
    }

    public function assertError404($statusCode)
    {
        $this->assertEquals(404, $statusCode);
    }

    public function assertJsonResponse()
    {
        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'), $response->headers);
        $this->content = json_decode($response->getContent(), true, 50);
    }
}
