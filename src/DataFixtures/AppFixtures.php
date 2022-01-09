<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');


        //Création des formations
        $DUTInfo = new Formation();
        $DUTInfo->setNomLong("DUT Informatique");
        $DUTInfo->setNomCourt("DUT Info");
        
        $LPProg = new Formation();
        $LPProg->setNomLong("Licence Professionnelle Programmation Avancée");
        $LPProg->setNomCourt("LP Prog");

        $LPNum = new Formation();
        $LPNum->setNomLong("Licence Professionnelle Métiers du Numérique");
        $LPNum->setNomCourt("LP Num");

        $LInfo = new Formation();
        $LInfo->setNomLong("Licence Informatique");
        $LInfo->setNomCourt("L Info");

        $tabFormations = array($DUTInfo,$LPProg,$LPNum,$LInfo);
        foreach($tabFormations as $tab)
        {
            $manager->persist($tab);
        }

        //Création des Entreprises
            $tabEntreprise = array();
            for($i = 0; $i <15; $i++)
            {
                $Entreprise = new Entreprise();
                $Entreprise->setNom($faker->company);
                $Entreprise->setAdresse($faker->address);
                $Entreprise->setActivite($faker->realText($maxNbChars = 50, $indexSize = 2));
                $Entreprise->setURLsite($faker->domainName);

                array_push($tabEntreprise,$Entreprise);
                $manager->persist($Entreprise);
            }
        
            //Création des stages
            for($i = 0; $i <15; $i++)
            {
                $nbEntreprise = $faker->numberBetween($min = 0, $max = 14);
                $nbFormations = $faker->numberBetween($min = 0, $max = 3);

                $Stage = new Stage();
                $Stage->setTitre($faker->realText($maxNbChars = 30, $indexSize = 2));
                $Stage->setDescMission($faker->realText($maxNbChars = 255, $indexSize = 2));
                $Stage->setEmailContact($faker->safeEmail);

                $Stage->setEntreprise($tabEntreprise[$nbEntreprise]);
                $Stage->addFormation($tabFormations[$nbFormations]);

                $manager->persist($Stage);
            }


        $manager->flush();
    }
}
