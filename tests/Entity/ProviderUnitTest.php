<?php

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\Product;
use App\Entity\Provider;
use DateTime;
use PHPUnit\Framework\TestCase;

class ProviderUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $provider = new Provider();
        $address = new Address();
        $product = new Product();
        $datetime = new DateTime();

        $provider->setName('name')
            ->addAddress($address)
            ->addProduct($product)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertTrue($provider->getName() === 'name');
        $this->assertTrue($provider->getAddress() === $address);
        $this->assertTrue($provider->getProduct() === $product);
        $this->assertTrue($provider->getCreatedAt() === $datetime);
        $this->assertTrue($provider->getUpdatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $provider = new Provider();
        $address = new Address();
        $product = new Product();
        $datetime = new DateTime();

        $provider->setName('name')
            ->addAddress($address)
            ->addProduct($product)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertFalse($provider->getName() === 'false');
        $this->assertFalse($provider->getAddress() === 'false');
        $this->assertFalse($provider->getProduct() === 'false');
        $this->assertFalse($provider->getCreatedAt() === new DateTime());
        $this->assertFalse($provider->getUpdatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $provider = new Provider();

        $this->assertEmpty($provider->getName());
        $this->assertEmpty($provider->getAddress());
        $this->assertEmpty($provider->getProduct());
        $this->assertEmpty($provider->getCreatedAt());
        $this->assertEmpty($provider->getUpdatedAt());
    }
}
