<?php

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\Company;
use App\Entity\Employee;
use App\Entity\Product;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class EmployeeUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $employee = new Employee();
        $user = new User();
        $birthday = new DateTime();
        $firstDay = new DateTime();
        $datetime = new DateTime();
        $address = new Address();
        $product = new Product();
        $company = new Company();

        $employee->setName('name')
            ->setBirthday($birthday)
            ->setFirstDay($firstDay)
            ->addAddress($address)
            ->setUser($user)
            ->setCompany($company)
            ->addProduct($product)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertTrue($employee->getName() === 'name');
        $this->assertTrue($employee->getBirthday() === $birthday);
        $this->assertTrue($employee->getFirstDay() === $firstDay);
        $this->assertTrue($employee->getAddress() === $address);
        $this->assertTrue($employee->getUser() === $user);
        $this->assertTrue($employee->getCompany() === $company);
        $this->assertTrue($employee->getProducts() === $product);
        $this->assertTrue($employee->getCreatedAt() === $datetime);
        $this->assertTrue($employee->getUpdatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $employee = new Employee();
        $user = new User();
        $birthday = new DateTime();
        $firstDay = new DateTime();
        $datetime = new DateTime();
        $address = new Address();
        $product = new Product();
        $company = new Company();

        $employee->setName('true@test.com')
            ->setBirthday($birthday)
            ->setFirstDay($firstDay)
            ->addAddress($address)
            ->setUser($user)
            ->setCompany($company)
            ->addProduct($product)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertFalse($employee->getName() === 'false');
        $this->assertFalse($employee->getBirthday() === new DateTime());
        $this->assertFalse($employee->getFirstDay() === new DateTime());
        $this->assertFalse($employee->getAddress() === 'false');
        $this->assertFalse($employee->getUser() === 'false');
        $this->assertFalse($employee->getCompany() === 'false');
        $this->assertFalse($employee->getProducts() === 'false');
        $this->assertFalse($employee->getCreatedAt() === new DateTime());
        $this->assertFalse($employee->getUpdatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $employee = new Employee();

        $this->assertEmpty($employee->getName());
        $this->assertEmpty($employee->getBirthday());
        $this->assertEmpty($employee->getFirstDay());
        $this->assertEmpty($employee->getAddress());
        $this->assertEmpty($employee->getUser());
        $this->assertEmpty($employee->getCompany());
        $this->assertEmpty($employee->getProducts());
        $this->assertEmpty($employee->getCreatedAt());
        $this->assertEmpty($employee->getUpdatedAt());
    }
}