<?php

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\CartDetails;
use App\Entity\Employee;
use App\Entity\Provider;
use App\Entity\Transaction;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class TransactionUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $company = new Transaction();
        $datetime = new DateTime();
        $address = New Address();
        $cart = New CartDetails();
        $client = New User();

        $company->setFirstname('firstname')
            ->setLastname('lastname')
            ->setEmail('email@gmail.com')
            ->setAddress($address)
            ->setMoreInfo('more')
            ->setIsPaid(true)
            ->setQuantity(1)
            ->setSubTotalHT(1)
            ->setSubTotalTTC(1)
            ->setReference('reference')
            ->addCartDetail($cart)
            ->setUser($client)
            ->setCreatedAt($datetime)
        ;

        $this->assertTrue($company->getFirstname() === 'firstname');
        $this->assertTrue($company->getLastname() === 'lastname');
        $this->assertTrue($company->getEmail() === 'email@gmail.com');
        $this->assertTrue($company->getAddress() === $address);
        $this->assertTrue($company->getMoreInfo() === 'more');
        $this->assertTrue($company->getIsPaid() === true);
        $this->assertTrue($company->getQuantity() === 1);
        $this->assertTrue($company->getSubTotalHT() === 1);
        $this->assertTrue($company->getSubTotalTTC() === 1);
        $this->assertTrue($company->getReference() === 'reference');
        $this->assertTrue($company->getCartDetails() === $cart);
        $this->assertTrue($company->getUser() === $client);
        $this->assertTrue($company->getCreatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $company = new Transaction();
        $datetime = new DateTime();
        $address = New Address();
        $cart = New CartDetails();
        $client = New User();

        $company->setFirstname('firstname')
                ->setLastname('lastname')
                ->setEmail('email@gmail.com')
                ->setAddress($address)
                ->setMoreInfo('more')
                ->setIsPaid(true)
                ->setQuantity(1)
                ->setSubTotalHT(1)
                ->setSubTotalTTC(1)
                ->setReference('reference')
                ->addCartDetail($cart)
                ->setUser($client)
                ->setCreatedAt($datetime)
        ;

        $this->assertFalse($company->getFirstname() === 'false');
        $this->assertFalse($company->getLastname() === 1);
        $this->assertFalse($company->getEmail() === 'false');
        $this->assertFalse($company->getAddress() === 'false');
        $this->assertFalse($company->getMoreInfo() === 'false');
        $this->assertFalse($company->getIsPaid() === false);
        $this->assertFalse($company->getQuantity() === 0);
        $this->assertFalse($company->getSubTotalHT() === 0);
        $this->assertFalse($company->getSubTotalTTC() === 0);
        $this->assertFalse($company->getReference() === 'false');
        $this->assertFalse($company->getCartDetails() === 'false');
        $this->assertFalse($company->getUser() === 'false');
        $this->assertFalse($company->getCreatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $company = new Transaction();

        $this->assertEmpty($company->getFirstname());
        $this->assertEmpty($company->getLastname());
        $this->assertEmpty($company->getEmail());
        $this->assertEmpty($company->getAddress());
        $this->assertEmpty($company->getMoreInfo());
        $this->assertEmpty($company->getIsPaid());
        $this->assertEmpty($company->getQuantity());
        $this->assertEmpty($company->getSubTotalHT());
        $this->assertEmpty($company->getSubTotalTTC());
        $this->assertEmpty($company->getReference());
        $this->assertEmpty($company->getCartDetails());
        $this->assertEmpty($company->getUser());
        $this->assertEmpty($company->getCreatedAt());
    }
}
