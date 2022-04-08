<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Tests\NeedLogin;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{
    use NeedLogin;

    public function testDisplayLogin()
    {
        $client = static::createClient();
        $client->request('GET', '/login');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Se connecter');
        $this->assertSelectorNotExists('.alert alert-danger');
    }

    public function testLoginWithBadCredentials()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form([
            'email' => 'jane@doe.fr',
            'password' => '000000000'
        ]);
        $client->submit($form);
        $this->assertResponseRedirects('/login');
        $client->followRedirect();
        $this->assertSelectorExists('.alert alert-danger');
    }

    public function testSuccessfullLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form([
            'email' => 'yves@gmail.com',
            'password' => '123456'
        ]);
        $client->submit($form);
        $this->assertResponseRedirects('/dashboard');
    }

    public function letAuthenticatedUserAccessDashboard()
    {
        $client = static::createClient();
        $user = User::class;

        $this->login($client, $user);

        $client->request('GET', '/dashboard');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testAdminRequireAdminRole()
    {
        $client = static::createClient();
        $user = User::class;

        $this->login($client, $user);

        $client->request('GET', '/dashboard');
        $this->assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
    }

    public function testAdminRequireAdminRoleWithSufficientRole()
    {
        $client = static::createClient();
        $user = User::class;

        $this->login($client, $user);

        $client->request('GET', '/dashboard');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
