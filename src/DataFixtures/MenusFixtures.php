<?php

/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 27/04/2018
 * Time: 16:14
 */

// App/DataFixtures/MenusFixtures.php
namespace App\DataFixtures;


use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

//use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MenusFixtures extends Fixture //implements  DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $menu1 = new Menu();
        $menu1->setName('Saucisse');
        $menu1->setPrice(rand(0,20));
        $menu1->setProducts(array($this->getReference('product1')));
        $manager->persist($menu1);

        $menu2 = new Menu();
        $menu2->setName('Saucisse');
        $menu2->setPrice(rand(0,20));
        $menu2->setProducts(array($this->getReference('product1')));
        $manager->persist($menu2);

        $menu3 = new Menu();
        $menu3->setName('Saucisse');
        $menu3->setPrice(rand(0,20));
        $menu3->setProducts(array($this->getReference('product1')));
        $manager->persist($menu3);

        $menu4 = new Menu();
        $menu4->setName('Fricadelle');
        $menu4->setPrice(rand(0,20));
        $menu4->setProducts(array($this->getReference('product2')));
        $manager->persist($menu4);

        $menu5 = new Menu();
        $menu5->setName('Fricadelle');
        $menu5->setPrice(rand(0,20));
        $menu5->setProducts(array($this->getReference('product2')));
        $manager->persist($menu5);

        $menu6 = new Menu();
        $menu6->setName('Fricadelle');
        $menu6->setPrice(rand(0,20));
        $menu6->setProducts(array($this->getReference('product2')));
        $manager->persist($menu6);

        $menu7 = new Menu();
        $menu7->setName('Jambon');
        $menu7->setPrice(rand(0,20));
        $menu7->setProducts(array($this->getReference('product3')));
        $manager->persist($menu7);

        $menu8 = new Menu();
        $menu8->setName('Jambon');
        $menu8->setPrice(rand(0,20));
        $menu8->setProducts(array($this->getReference('product3')));
        $manager->persist($menu8);

        $menu9 = new Menu();
        $menu9->setName('Jambon');
        $menu9->setPrice(rand(0,20));
        $menu9->setProducts(array($this->getReference('product3')));
        $manager->persist($menu9);

        $manager->flush();

        $this->addReference('menu1',$menu1);
        $this->addReference('menu2',$menu2);
        $this->addReference('menu3',$menu3);
        $this->addReference('menu4',$menu4);
        $this->addReference('menu5',$menu5);
        $this->addReference('menu6',$menu6);
        $this->addReference('menu7',$menu7);
        $this->addReference('menu8',$menu8);
        $this->addReference('menu9',$menu9);

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


