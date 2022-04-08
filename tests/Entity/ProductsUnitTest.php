<?php

namespace App\Tests\Entity;

use App\Entity\Employee;
use App\Entity\Product;
use App\Entity\Provider;
use DateTime;
use PHPUnit\Framework\TestCase;

class ProductsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $product = new Product();
        $datetime = new DateTime();
        $provider = new Provider();
        $gestionnaire = new Employee();

        $product->setTitle('title')
            ->setPrice(1.33)
            ->setTax(1.33)
            ->setStock(1)
            ->setProvider($provider)
            ->setGestionnaire($gestionnaire)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertTrue($product->getTitle() === 'title');
        $this->assertTrue($product->getPrice() === 1.33);
        $this->assertTrue($product->getTax() === 1.33);
        $this->assertTrue($product->getStock() === 1);
        $this->assertTrue($product->getCreatedAt() === $datetime);
        $this->assertTrue($product->getUpdatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $product = new Product();
        $datetime = new DateTime();
        $provider = new Provider();
        $gestionnaire = new Employee();

        $product->setTitle('title')
            ->setPrice(1.33)
            ->setTax(1.33)
            ->setStock(1.33)
            ->setProvider($provider)
            ->setGestionnaire($gestionnaire)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertFalse($product->getTitle() === 'false');
        $this->assertFalse($product->getPrice() === 1);
        $this->assertFalse($product->getTax() === 1);
        $this->assertFalse($product->getStock() === 0);
        $this->assertFalse($product->getProvider() === 'false');
        $this->assertFalse($product->getGestionnaire() === 'false');
        $this->assertFalse($product->getCreatedAt() === new DateTime());
        $this->assertFalse($product->getUpdatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $product = new Product();

        $this->assertEmpty($product->getTitle());
        $this->assertEmpty($product->getPrice());
        $this->assertEmpty($product->getTax());
        $this->assertEmpty($product->getStock());
        $this->assertEmpty($product->getProvider());
        $this->assertEmpty($product->getGestionnaire());
        $this->assertEmpty($product->getCreatedAt());
        $this->assertEmpty($product->getUpdatedAt());
    }
}
