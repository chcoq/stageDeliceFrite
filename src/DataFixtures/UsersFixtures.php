<?php

/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 27/04/2018
 * Time: 16:14
 */

// App/DataFixtures/UsersFixtures.php
namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersFixtures extends Fixture //implements  DependentFixtureInterface
{
    public const ROLE_ADMIN='ROLE_USER' ;
    public const ROLE_SUPER_ADMIN='ROLE_ADMIN';
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('David');
        $user1->setEmail('david@essai.com');
        $user1->setEnabled(1);
        $user1->setPassword($this->encoder->encodePassword($user1,'essai'));
        $user1->addRole('ROLE_ADMIN');
        $manager->persist($user1);

        $this->addReference(self::ROLE_SUPER_ADMIN, $user1);

        $user2 = new User();
        $user2->setUsername('Sandrine');
        $user2->setEmail('sandrine@essai.com');
        $user2->setEnabled(1);
        $user2->setPassword($this->encoder->encodePassword($user2,'essai'));
        $user1->addRole('ROLE_USER');
        $manager->persist($user2);
        $this->addReference(self::ROLE_ADMIN, $user2);

        $manager->flush();

        $this->addReference('user1',$user1);
        $this->addReference('user2',$user2);

    }

//    public function getDependencies()
//    {
//        return array(
//
//            CategorysFixtures::class,
//            ProductsFixtures::class,
//            ImagesFixtures::class,
//        );
//    }


}


