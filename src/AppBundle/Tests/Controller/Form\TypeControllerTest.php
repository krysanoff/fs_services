<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Form\TypeControllerTest extends WebTestCase
{
    public function testBuildform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/buildForm');
    }

}
