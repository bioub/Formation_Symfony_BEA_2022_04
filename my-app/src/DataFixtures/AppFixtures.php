<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $bea = new Company();
        $bea->setName('BEA');
        $manager->persist($bea);

        $formationTech = new Company();
        $formationTech->setName('formation.tech')
            ->setPostCode('75017');
        $manager->persist($formationTech);

        $manager->flush();
    }
}
