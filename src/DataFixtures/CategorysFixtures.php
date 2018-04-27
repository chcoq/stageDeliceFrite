<?php

/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 27/04/2018
 * Time: 16:14
 */

// App/DataFixtures/CategorysFixtures.php
namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CategorysFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setNameCat('Seul');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setNameCat('Sandwich');
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setNameCat('Américain');
        $manager->persist($category3);

        $manager->flush();

        $this->addReference('category1',$category1);
        $this->addReference('category2',$category2);
        $this->addReference('category3',$category3);
    }

    public function getDependencies()
    {
        return array(

            ProductsFixtures::class,
            ImagesFixtures::class,
            MenusFixtures::class,
            UsersFixtures::class,
        );
    }

}


