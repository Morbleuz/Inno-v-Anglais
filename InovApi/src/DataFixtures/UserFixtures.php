<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class UserFixtures extends Fixture
{
    private $faker;
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this->faker=Factory::create("fr_FR");
        $this->passwordHasher= $passwordHasher;
 }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<12;$i++){
            $user = new User();
            if ($i==0) {
                $user->setUsername('ritzzo62')
                    ->setNom('RITZZO')
                    ->setRoles(array('ROLE_ADMIN'))
                    ->setPrenom('Pierre')
                    ->setPassword('ritzzo62');     
            } else if ($i==1) {
                $user->setUsername('Tozano')
                    ->setNom('OZANO')
                    ->setRoles(array('ROLE_ADMIN'))
                    ->setPrenom('Tanguy')
                    ->setPassword('btsinfo');     
            } else {
                $nom=$this->faker->lastName();
                $prenom=$this->faker->firstName();
                $user->setUsername($nom.''.$prenom)
                    ->setNom($nom)
                    ->setPrenom($prenom)
                    ->setPassword($prenom);
            }
            
            $this->addReference('user'.$i, $user);
            $manager->persist($user);
        }
        $manager->flush();
    }
}