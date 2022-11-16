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
        for($i=0;$i<54;$i++){
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
            }  else if ($i==14) {
                $mot->setMotAnglais('bread')
                    ->setMotFrancais('pain');
            }  else if ($i==15) {
                $mot->setMotAnglais('cow')
                    ->setMotFrancais('vache');
            }  else if ($i==16) {
                $mot->setMotAnglais('airplane')
                    ->setMotFrancais('avion');
            }  else if ($i==17) {
                $mot->setMotAnglais('cat')
                    ->setMotFrancais('chat');
            }  else if ($i==18) {
                $mot->setMotAnglais('butter')
                    ->setMotFrancais('beurre');
            }  else if ($i==19) {
                $mot->setMotAnglais('bike')
                    ->setMotFrancais('vélo');
            }  else if ($i==20) {
                $mot->setMotAnglais('car')
                    ->setMotFrancais('voiture');
            }  else if ($i==21) {
                $mot->setMotAnglais('subway')
                    ->setMotFrancais('métro');
            }  else if ($i==22) {
                $mot->setMotAnglais('roof')
                    ->setMotFrancais('toit');
            }  else if ($i==23) {
                $mot->setMotAnglais('lion')
                    ->setMotFrancais('lion');
            }  else if ($i==24) {
                $mot->setMotAnglais('rocket')
                    ->setMotFrancais('fusée');
            }  else if ($i==25) {
                $mot->setMotAnglais('animal')
                    ->setMotFrancais('animal');
            }  else if ($i==26) {
                $mot->setMotAnglais('city')
                    ->setMotFrancais('ville');
            }  else if ($i==27) {
                $mot->setMotAnglais('French')
                    ->setMotFrancais('français');
            }  else if ($i==28) {
                $mot->setMotAnglais('German')
                    ->setMotFrancais('allemand');
            }  else if ($i==29) {
                $mot->setMotAnglais('nationality')
                    ->setMotFrancais('nationalité');
            }  else if ($i==30) {
                $mot->setMotAnglais('space')
                    ->setMotFrancais('espace');
            }  else if ($i==31) {
                $mot->setMotAnglais('star')
                    ->setMotFrancais('étoile');
            }  else if ($i==32) {
                $mot->setMotAnglais('dog')
                    ->setMotFrancais('chien');
            }  else if ($i==33) {
                $mot->setMotAnglais('goat')
                    ->setMotFrancais('chèvre');
            }  else if ($i==34) {
                $mot->setMotAnglais('bird')
                    ->setMotFrancais('oiseau');
            }  else if ($i==35) {
                $mot->setMotAnglais('boat')
                    ->setMotFrancais('bâteau');
            }  else if ($i==36) {
                $mot->setMotAnglais('fish')
                    ->setMotFrancais('poisson');
            }  else if ($i==37) {
                $mot->setMotAnglais('meat')
                    ->setMotFrancais('viande');
            }  else if ($i==38) {
                $mot->setMotAnglais('vegetables')
                    ->setMotFrancais('légumes');
            }  else if ($i==39) {
                $mot->setMotAnglais('mushroom')
                    ->setMotFrancais('champignon');
            }  else if ($i==40) {
                $mot->setMotAnglais('church')
                    ->setMotFrancais('église');
            }  else if ($i==41) {
                $mot->setMotAnglais('tower')
                    ->setMotFrancais('tour');
            }  else if ($i==42) {
                $mot->setMotAnglais('the Earth')
                    ->setMotFrancais('la Terre');
            }  else if ($i==43) {
                $mot->setMotAnglais('the Sun')
                    ->setMotFrancais('le soleil');
            }  else if ($i==44) {
                $mot->setMotAnglais('moon')
                    ->setMotFrancais('lune');
            }  else if ($i==45) {
                $mot->setMotAnglais('Dutch')
                    ->setMotFrancais('néerlandais');
            }  else if ($i==46) {
                $mot->setMotAnglais('Irish')
                    ->setMotFrancais('irlandais');
            }  else if ($i==47) {
                $mot->setMotAnglais('Austrian')
                    ->setMotFrancais('autrichien');
            }  else if ($i==48) {
                $mot->setMotAnglais('floor')
                    ->setMotFrancais('sol');
            }  else if ($i==49) {
                $mot->setMotAnglais('network')
                    ->setMotFrancais('réseau');
            }  else if ($i==50) {
                $mot->setMotAnglais('food')
                    ->setMotFrancais('nourriture');
            }  else if ($i==51) {
                $mot->setMotAnglais('light')
                    ->setMotFrancais('lumière');
            }  else if ($i==52) {
                $mot->setMotAnglais('void')
                    ->setMotFrancais('vide');
            }  else if ($i==53) {
                $mot->setMotAnglais('Spanish')
                    ->setMotFrancais('espagnol');
            }

            $this->addReference('mot'.$i, $mot);
            $manager->persist($mot);
        }
        $manager->flush();
    }
}