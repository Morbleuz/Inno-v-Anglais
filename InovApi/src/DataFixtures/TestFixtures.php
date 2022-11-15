<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Test;
use App\Entity\Liste;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TestFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<2;$i++){
            $test = new Test();
            if ($i==0) {
                $test->setNiveau('Facile');
                $test->setLier($this->getReference('liste0'));
            } else if ($i==1) {
                $test->setNiveau('Moyen');
                $test->setLier($this->getReference('liste1'));
            } else if ($i==2) {
                $test->setNiveau('Difficile');
            } else if ($i==3) {
                $test->setNiveau('Queen of England');
            }
            
            $this->addReference('test'.$i, $test);
            $manager->persist($test);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ListeFixtures::class,
        ];
    }
}