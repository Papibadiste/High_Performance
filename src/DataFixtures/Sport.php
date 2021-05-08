<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Sport extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $product = new \App\Entity\Sport();
            $product->setName('NameSport '.$i);
            $manager->persist($product);
        }
        $manager->flush();

    }
}
