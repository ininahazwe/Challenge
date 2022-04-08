<?php

namespace App\Tests\Form;

use App\Entity\Address;
use App\Entity\User;
use App\Form\AddressType;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\DoctrineOrmExtension;
use Symfony\Component\Form\Test\TypeTestCase;

class AddressTypeTest extends TypeTestCase
{
    protected function getExtensions(): array {

        $mockEntityManager = $this->createMock(EntityManager::class);
        $mockEntityManager->method('getClassMetadata')
                ->willReturn(new ClassMetadata(User::class))
        ;

        $execute = $this->createMock(AbstractQuery::class);
        $execute->method('execute')
                ->willReturn([]);

        $query = $this->createMock(QueryBuilder::class);
        $query->method('getQuery')
                ->willReturn($execute);


        $entityRepository = $this->createMock(EntityRepository::class);
        $entityRepository->method('createQueryBuilder')
                ->willReturn($query)
        ;

        $mockEntityManager->method('getRepository')->willReturn($entityRepository);

        $mockRegistry = $this->createMock(ManagerRegistry::class);
        $mockRegistry->method('getManagerForClass')
                ->willReturn($mockEntityManager)
        ;

        return array_merge(parent::getExtensions(), [new DoctrineOrmExtension($mockRegistry)]);
    }

    public function testBuildForm()
    {
        $data = [
                'fullname' => 'fullnameTest',
                'addresse' => 'addresse',
                'complement' => 'complement',
                'ville' => 'ville',
                'zipcode' => 'zipcode',
                'country' => 'country'
        ];

        $address = new Address();

        $form = $this->factory->create( AddressType::class, $address);

        $addressToCompare = new Address();

        $addressToCompare->setFullname($data['fullname']);
        $addressToCompare->setAdresse($data['addresse']);
        $addressToCompare->setComplement($data['complement']);
        $addressToCompare->setVille($data['ville']);
        $addressToCompare->setZipcode($data['zipcode']);
        $addressToCompare->setCountry($data['country']);

        //verifier la transmission
        $form->submit($data);

        $this->assertTrue($form->isSynchronized());

        $this->assertEquals($address->getFullname(), $addressToCompare->getFullname());
        $this->assertEquals($address->getAdresse(), $addressToCompare->getAdresse());
        $this->assertEquals($address->getComplement(), $addressToCompare->getComplement());
        $this->assertEquals($address->getVille(), $addressToCompare->getVille());
        $this->assertEquals($address->getZipcode(), $addressToCompare->getZipcode());
        $this->assertEquals($address->getCountry(), $addressToCompare->getCountry());
    }
}