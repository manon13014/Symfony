<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConferenceControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        static::assertResponseIsSuccessful();
        static::assertSelectorTextContains('h2', 'Give your feedback!');
        set_exception_handler(null);
    }
}
