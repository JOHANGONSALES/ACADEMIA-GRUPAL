<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CursosTextTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'cursos/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Cursos');
    }
}
