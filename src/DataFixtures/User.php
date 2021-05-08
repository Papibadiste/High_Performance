<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class User extends Fixture
{

    public $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $product = new \App\Entity\User();
            $product->setName('Name'.$i);
            $product->setEmail('oui@oui'.$i);
            $product->setRoles((array)'ROLE_USER');
            $product->setCreatedAt(new \DateTime());
            $oass = "123".$i;
            $encoded = $this->encoder->encodePassword($product, $oass);
            $product->setPassword($encoded);
            $manager->persist($product);
        }
        $manager->flush();

    }
}
