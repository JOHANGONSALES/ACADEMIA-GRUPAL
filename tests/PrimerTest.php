<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PrimerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'alumnos/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Alumnos');
    }
}
