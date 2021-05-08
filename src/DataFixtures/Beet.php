<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Beet extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 20; $i++) {
            $product = new \App\Entity\Beet();
            $product->setGoldPlay(30 + $i);
        }
        $manager->flush();

    }
}
