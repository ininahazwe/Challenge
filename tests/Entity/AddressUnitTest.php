<?php

namespace App\Tests\Entity;

use App\Entity\Address;
use App\Entity\Company;
use App\Entity\Employee;
use App\Entity\Provider;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class AddressUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $address = new Address();
        $company = new Company();
        $client = new User();
        $employee = new Employee();
        $provider = new Provider();
        $datetime = new DateTime();

        $address->setFullname('fullname')
            ->setAdresse('addresse')
            ->setComplement('complement')
            ->setVille('ville')
            ->setZipcode('zipcode')
            ->setCountry('country')
            ->setUser($client)
            ->setProvider($provider)
            ->setCompany($company)
            ->setEmployee($employee)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime);

        $this->assertTrue($address->getFullname() === 'fullname');
        $this->assertTrue($address->getAdresse() === 'addresse');
        $this->assertTrue($address->getComplement() === 'complement');
        $this->assertTrue($address->getVille() === 'ville');
        $this->assertTrue($address->getCountry() === 'country');
        $this->assertTrue($address->getUser() === $client);
        $this->assertTrue($address->getProvider() === $provider);
        $this->assertTrue($address->getCompany() === $company);
        $this->assertTrue($address->getEmployee() === $employee);
        $this->assertTrue($address->getCreatedAt() === $datetime);
        $this->assertTrue($address->getUpdatedAt() === $datetime);
    }

    public function testIsFalse()
    {
        $address = new Address();
        $company = new Company();
        $client = new User();
        $employee = new Employee();
        $provider = new Provider();
        $datetime = new DateTime();

        $address->setFullname('fullname')
                ->setAdresse('addresse')
                ->setComplement('complement')
                ->setVille('ville')
                ->setZipcode('zipcode')
                ->setCountry('country')
                ->setUser($client)
                ->setProvider($provider)
                ->setCompany($company)
                ->setEmployee($employee)
                ->setCreatedAt($datetime)
                ->setUpdatedAt($datetime);

        $this->assertFalse($address->getFullname() === 'false');
        $this->assertFalse($address->getAdresse() === 'false');
        $this->assertFalse($address->getComplement() === 'false');
        $this->assertFalse($address->getVille() === 'false');
        $this->assertFalse($address->getCountry() === 'false');
        $this->assertFalse($address->getUser() === 'false');
        $this->assertFalse($address->getProvider() === 'false');
        $this->assertFalse($address->getCompany() === 'false');
        $this->assertFalse($address->getEmployee() === 'false');
        $this->assertFalse($address->getCreatedAt() === new DateTime());
        $this->assertFalse($address->getUpdatedAt() === new DateTime());
    }

    public function testIsEmpty()
    {
        $address = new Address();

        $this->assertEmpty($address->getFullname());
        $this->assertEmpty($address->getAdresse());
        $this->assertEmpty($address->getComplement());
        $this->assertEmpty($address->getVille());
        $this->assertEmpty($address->getCountry());
        $this->assertEmpty($address->getUser());
        $this->assertEmpty($address->getProvider());
        $this->assertEmpty($address->getCompany());
        $this->assertEmpty($address->getEmployee());
        $this->assertEmpty($address->getCreatedAt());
        $this->assertEmpty($address->getUpdatedAt());
    }
}
