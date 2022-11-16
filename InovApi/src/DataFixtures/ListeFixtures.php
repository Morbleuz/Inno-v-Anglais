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
        for($i=0;$i<8;$i++){
            $liste = new Liste();
            if ($i==0) {
                $liste->setTheme('La maison');
                $liste->addMot($this->getReference('mot0'));
                $liste->addMot($this->getReference('mot6'));
                $liste->addMot($this->getReference('mot7'));
                $liste->addMot($this->getReference('mot10'));
                $liste->addMot($this->getReference('mot11'));
                $liste->addMot($this->getReference('mot22'));
                $liste->addMot($this->getReference('mot48'));
                $liste->addMot($this->getReference('mot51'));
            } else if ($i==1) {
                $liste->setTheme('L\'informatique');
                $liste->addMot($this->getReference('mot1'));
                $liste->addMot($this->getReference('mot2'));
                $liste->addMot($this->getReference('mot3'));
                $liste->addMot($this->getReference('mot8'));
                $liste->addMot($this->getReference('mot12'));
                $liste->addMot($this->getReference('mot13'));
                $liste->addMot($this->getReference('mot49'));
            } else if ($i==2) {
                $liste->setTheme('Les animaux');
                $liste->addMot($this->getReference('mot15'));
                $liste->addMot($this->getReference('mot17'));
                $liste->addMot($this->getReference('mot23'));
                $liste->addMot($this->getReference('mot25'));
                $liste->addMot($this->getReference('mot32'));
                $liste->addMot($this->getReference('mot33'));
                $liste->addMot($this->getReference('mot34'));
            } else if ($i==3) {
                $liste->setTheme('Les moyens de transport');
                $liste->addMot($this->getReference('mot16'));
                $liste->addMot($this->getReference('mot19'));
                $liste->addMot($this->getReference('mot20'));
                $liste->addMot($this->getReference('mot21'));
                $liste->addMot($this->getReference('mot24'));
                $liste->addMot($this->getReference('mot35'));
                $liste->addMot($this->getReference('mot36'));
            } else if ($i==4) {
                $liste->setTheme('La nourriture');
                $liste->addMot($this->getReference('mot14'));
                $liste->addMot($this->getReference('mot18'));
                $liste->addMot($this->getReference('mot36'));
                $liste->addMot($this->getReference('mot37'));
                $liste->addMot($this->getReference('mot38'));
                $liste->addMot($this->getReference('mot39'));
                $liste->addMot($this->getReference('mot50'));
            } else if ($i==5) {
                $liste->setTheme('Les lieux');
                $liste->addMot($this->getReference('mot0'));
                $liste->addMot($this->getReference('mot4'));
                $liste->addMot($this->getReference('mot5'));
                $liste->addMot($this->getReference('mot9'));
                $liste->addMot($this->getReference('mot26'));
                $liste->addMot($this->getReference('mot40'));
                $liste->addMot($this->getReference('mot41'));
            }
            else if ($i==6) {
                $liste->setTheme('L\'espace');
                $liste->addMot($this->getReference('mot24'));
                $liste->addMot($this->getReference('mot30'));
                $liste->addMot($this->getReference('mot31'));
                $liste->addMot($this->getReference('mot42'));
                $liste->addMot($this->getReference('mot43'));
                $liste->addMot($this->getReference('mot44'));
                $liste->addMot($this->getReference('mot51'));
                $liste->addMot($this->getReference('mot52'));
            } else if ($i==7) {
                $liste->setTheme('Les nationalités');
                $liste->addMot($this->getReference('mot27'));
                $liste->addMot($this->getReference('mot28'));
                $liste->addMot($this->getReference('mot29'));
                $liste->addMot($this->getReference('mot45'));
                $liste->addMot($this->getReference('mot46'));
                $liste->addMot($this->getReference('mot47'));
                $liste->addMot($this->getReference('mot53'));
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