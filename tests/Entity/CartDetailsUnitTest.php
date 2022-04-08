<?php

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\CartDetails;
use App\Entity\Company;
use App\Entity\Employee;
use App\Entity\Provider;
use App\Entity\Transaction;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class CartDetailsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $cartDetails = new CartDetails();
        $transaction = new Transaction();
        $datetime = new DateTime();

        $cartDetails->setProductName('name')
            ->setProductPrice(1)
            ->setProductQuantity(1)
            ->setSubTotalProductHT(1)
            ->setTaxeProduct(1)
            ->setSubTotalProductTTC(1)
            ->setCart($transaction)
            ->setCreatedAt($datetime)
            ;

        $this->assertTrue($cartDetails->getProductName() === 'name');
        $this->assertTrue($cartDetails->getProductPrice() === 1);
        $this->assertTrue($cartDetails->getProductQuantity() === 1);
        $this->assertTrue($cartDetails->getSubTotalProductHT() === 1);
        $this->assertTrue($cartDetails->getSubTotalProductTTC() === 1);
        $this->assertTrue($cartDetails->getTaxeProduct() === 1);
        $this->assertTrue($cartDetails->getCart() === $transaction);
        $this->assertTrue($cartDetails->getCreatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $cartDetails = new CartDetails();
        $transaction = new Transaction();
        $datetime = new DateTime();

        $cartDetails->setProductName('name')
                ->setProductPrice(1)
                ->setProductQuantity(1)
                ->setSubTotalProductHT(1)
                ->setTaxeProduct(1)
                ->setSubTotalProductTTC(1)
                ->setCart($transaction)
                ->setCreatedAt($datetime)
        ;

        $this->assertFalse($cartDetails->getProductName() === 'false');
        $this->assertFalse($cartDetails->getProductPrice() === 0);
        $this->assertFalse($cartDetails->getProductQuantity() === 0);
        $this->assertFalse($cartDetails->getSubTotalProductHT() === 0);
        $this->assertFalse($cartDetails->getSubTotalProductTTC() === 0);
        $this->assertFalse($cartDetails->getTaxeProduct() === 0);
        $this->assertFalse($cartDetails->getCart() === 'false');
        $this->assertFalse($cartDetails->getCreatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $cartDetails = new CartDetails();

        $this->assertEmpty($cartDetails->getProductName());
        $this->assertEmpty($cartDetails->getProductPrice());
        $this->assertEmpty($cartDetails->getProductQuantity());
        $this->assertEmpty($cartDetails->getSubTotalProductHT());
        $this->assertEmpty($cartDetails->getSubTotalProductTTC());
        $this->assertEmpty($cartDetails->getTaxeProduct());
        $this->assertEmpty($cartDetails->getCart());
        $this->assertEmpty($cartDetails->getCreatedAt());
    }
}
