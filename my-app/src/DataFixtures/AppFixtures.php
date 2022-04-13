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

        $company1 = new Company();
        $company1->setName('BEA');
        $manager->persist($company1);

        $company2 = new Company();
        $company2->setName('formation.tech')
            ->setPostCode('75017');
        $manager->persist($company2);

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

            // mt_rand(0, 2) retourne un entier aléatoire entre 0 et 2
            // si 0 on sort du if (0 == false)
            // sinon on rentre dans le if et $companyIndex contient l'entier (1 ou 2)
            // $$companyVariable utilise la variable dont le nom est dans la variable $companyVariable
            // (soit $company1 soit $company2)
            if ($companyIndex = mt_rand(0, 2)) {
                $companyVariable = "company$companyIndex";
                $contact->setCompany($$companyVariable);
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
