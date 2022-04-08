<?php

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\Employee;
use App\Entity\Transaction;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $client = new User();
        $datetime = new DateTime();
        $employee = New Employee();
        $address = New Address();
        $transaction = New Transaction();

        $client->setEmail('client@gmail.com')
                ->setFirstname('firstname')
                ->setlastname('lastname')
                ->setPassword('password')
                ->setEmployee($employee)
                ->addAddress($address)
                ->addTransaction($transaction)
                ->setCreatedAt($datetime)
                ->setUpdatedAt($datetime);

        $this->assertTrue($client->getEmail() === 'client@gmail.com');
        $this->assertTrue($client->getFirstname() === 'firstname');
        $this->assertTrue($client->getLastname() === 'lastname');
        $this->assertTrue($client->getPassword() === 'password');
        $this->assertTrue($client->getEmployee() === $employee);
        $this->assertTrue($client->getAddresses() === $address);
        $this->assertTrue($client->getTransactions() === $transaction);
        $this->assertTrue($client->getCreatedAt() === $datetime);
        $this->assertTrue($client->getUpdatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $client = new User();
        $datetime = new DateTime();
        $employee = New Employee();
        $address = New Address();
        $transaction = New Transaction();

        $client->setEmail('client@gmail.com')
                ->setFirstname('firstname')
                ->setlastname('lastname')
                ->setPassword('password')
                ->setEmployee($employee)
                ->addAddress($address)
                ->addTransaction($transaction)
                ->setCreatedAt($datetime)
                ->setUpdatedAt($datetime);

        $this->assertFalse($client->getEmail() === 'false');
        $this->assertFalse($client->getFirstname() === 'false');
        $this->assertFalse($client->getLastname() === 'false');
        $this->assertFalse($client->getPassword() === 'false');
        $this->assertFalse($client->getEmployee() === 'false');
        $this->assertFalse($client->getAddresses() === 'false');
        $this->assertFalse($client->getTransactions() === 'false');
        $this->assertFalse($client->getCreatedAt() === new DateTime());
        $this->assertFalse($client->getUpdatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $client = new User();

        $this->assertEmpty($client->getEmail());
        $this->assertEmpty($client->getFirstname());
        $this->assertEmpty($client->getLastname());
        $this->assertEmpty($client->getPassword());
        $this->assertEmpty($client->getEmployee());
        $this->assertEmpty($client->getAddresses());
        $this->assertEmpty($client->getTransactions());
        $this->assertEmpty($client->getCreatedAt());
        $this->assertEmpty($client->getUpdatedAt());
    }
}
