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
        for($i=0;$i<8;$i++){
            $test = new Test();
            if ($i==0) {
                $test->setNiveau('Facile - 01');
                $test->setLier($this->getReference('liste0'));
            } else if ($i==1) {
                $test->setNiveau('Facile - 02');
                $test->setLier($this->getReference('liste1'));
            } else if ($i==2) {
                $test->setNiveau('Facile - 03');
                $test->setLier($this->getReference('liste2'));
            } else if ($i==3) {
                $test->setNiveau('Facile - 04');
                $test->setLier($this->getReference('liste4'));
            } else if ($i==4) {
                $test->setNiveau('Moyen - 01');
                $test->setLier($this->getReference('liste3'));
            } else if ($i==5) {
                $test->setNiveau('Moyen - 02');
                $test->setLier($this->getReference('liste5'));
            } else if ($i==6) {
                $test->setNiveau('Difficile - 01');
                $test->setLier($this->getReference('liste6'));
            } else if ($i==7) {
                $test->setNiveau('Difficile - 02');
                $test->setLier($this->getReference('liste7'));
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