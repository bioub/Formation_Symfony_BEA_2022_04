<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Company;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // $product = new Product();
        // $manager->persist($product);

        $bea = new Company();
        $bea->setName('BEA');
        $manager->persist($bea);

        $formationTech = new Company();
        $formationTech->setName('formation.tech')
            ->setPostCode('75017');
        $manager->persist($formationTech);

        for ($i=0; $i<5; $i++) {
            $contact = new Contact();
            $contact->setFirstName($faker->firstName);
            $contact->setLastName($faker->lastName);

            if (mt_rand(0, 1)) {
                $contact->setEmail($faker->email);
            }

            if (mt_rand(0, 1)) {
                $contact->setPhone($faker->phoneNumber);
            }
            $manager->persist($contact);
        }

        $brands = ['Renault', 'Peugeot', 'Citroen'];
        foreach ($brands as $brand) {
            $car = new Car();
            $car->setBrand($brand);
            $manager->persist($car);
        }

        $manager->flush();
    }
}
