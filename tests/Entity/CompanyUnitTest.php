<?php

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\Company;
use App\Entity\Employee;
use DateTime;
use PHPUnit\Framework\TestCase;

class CompanyUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $company = new Company();
        $address = new Address();
        $employee = new Employee();
        $datetime = new DateTime();

        $company->setName('name')
            ->setBalance(1.55)
            ->addAddress($address)
            ->addEmployee($employee)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertTrue($company->getName() === 'name');
        $this->assertTrue($company->getBalance() === 1.55);
        $this->assertTrue($company->getAddress() === $address);
        $this->assertTrue($company->getEmployees() === $employee);
        $this->assertTrue($company->getCreatedAt() === $datetime);
        $this->assertTrue($company->getUpdatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $company = new Company();
        $address = new Address();
        $employee = new Employee();
        $datetime = new DateTime();

        $company->setName('name')
            ->setBalance(1.55)
            ->addAddress($address)
            ->addEmployee($employee)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertFalse($company->getName() === 'false');
        $this->assertFalse($company->getBalance() === 2);
        $this->assertFalse($company->getAddress() === 'false');
        $this->assertFalse($company->getEmployees() === 'false');
        $this->assertFalse($company->getCreatedAt() === new DateTime());
        $this->assertFalse($company->getUpdatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $company = new Company();

        $this->assertEmpty($company->getName());
        $this->assertEmpty($company->getBalance());
        $this->assertEmpty($company->getAddress());
        $this->assertEmpty($company->getEmployees());
        $this->assertEmpty($company->getCreatedAt());
        $this->assertEmpty($company->getUpdatedAt());
    }
}
