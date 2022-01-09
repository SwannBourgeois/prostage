<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $DUTInfo = new Formation();
        $DUTInfo->setNomLong("DUT Informatique");
        $DUTInfo->setNomCourt("DUT Info");
        $manager->persist($DUTInfo);

        $manager->flush();
    }
}
