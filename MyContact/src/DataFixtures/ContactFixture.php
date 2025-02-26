<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ContactFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr');
        for ($i=0; $i <20; $i++){
            $contact = new Contact();
            $contact
                ->setPrenom($faker->firstName)
                ->setNom($faker->lastName)
                ->setNumero($faker->numberBetween(770000000,779999999))
                ->setEmail($faker->email)
                ->setStatus($faker->boolean);
            $manager->persist($contact);

        }

        $manager->flush();
    }
}
