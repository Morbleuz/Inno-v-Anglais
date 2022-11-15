<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Liste;
use App\Entity\Mot;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ListeFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<2;$i++){
            $liste = new Liste();
            if ($i==0) {
                $liste->setTheme('Vie quotidienne');
                $liste->addMot($this->getReference('mot0'));
                $liste->addMot($this->getReference('mot6'));
                $liste->addMot($this->getReference('mot7'));
                $liste->addMot($this->getReference('mot10'));
                $liste->addMot($this->getReference('mot11'));
            } else if ($i==1) {
                $liste->setTheme('Informatique');
                $liste->addMot($this->getReference('mot1'));
                $liste->addMot($this->getReference('mot3'));
                $liste->addMot($this->getReference('mot8'));
                $liste->addMot($this->getReference('mot12'));
                $liste->addMot($this->getReference('mot13'));
            }
            
            $this->addReference('liste'.$i, $liste);
            $manager->persist($liste);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MotFixtures::class,
        ];
    }
}