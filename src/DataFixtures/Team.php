<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Team extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $product = new \App\Entity\Team();
            $product->setName('product '.$i);
            $product->setPointValue(random_int(10, 500));
            $manager->persist($product);
        }
        $manager->flush();

    }
}
