<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Mot;

class MotFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<15;$i++){
            $mot = new Mot();
            if ($i==0) {
                $mot->setMotAnglais('house')
                    ->setMotFrancais('maison');
            } else if ($i==1) {
                $mot->setMotAnglais('keyboard')
                    ->setMotFrancais('clavier');
            }  else if ($i==2) {
                $mot->setMotAnglais('computer')
                    ->setMotFrancais('ordinateur');
            }  else if ($i==3) {
                $mot->setMotAnglais('mouse')
                    ->setMotFrancais('souris');
            }  else if ($i==4) {
                $mot->setMotAnglais('castle')
                    ->setMotFrancais('château');
            }  else if ($i==5) {
                $mot->setMotAnglais('tree')
                    ->setMotFrancais('arbre');
            }  else if ($i==6) {
                $mot->setMotAnglais('kitchen')
                    ->setMotFrancais('cuisine');
            }  else if ($i==7) {
                $mot->setMotAnglais('bedroom')
                    ->setMotFrancais('chambre');
            }  else if ($i==8) {
                $mot->setMotAnglais('software')
                    ->setMotFrancais('logiciel');
            }  else if ($i==9) {
                $mot->setMotAnglais('swimming pool')
                    ->setMotFrancais('piscine');
            }  else if ($i==10) {
                $mot->setMotAnglais('door')
                    ->setMotFrancais('porte');
            }  else if ($i==11) {
                $mot->setMotAnglais('light')
                    ->setMotFrancais('lumière');
            }  else if ($i==12) {
                $mot->setMotAnglais('monitor')
                    ->setMotFrancais('moniteur');
            }  else if ($i==13) {
                $mot->setMotAnglais('graphic card')
                    ->setMotFrancais('carte graphique');
            }  else if ($i==13) {
                $mot->setMotAnglais('graphic card')
                    ->setMotFrancais('carte graphique');
            }

            $this->addReference('mot'.$i, $mot);
            $manager->persist($mot);
        }
        $manager->flush();
    }
}