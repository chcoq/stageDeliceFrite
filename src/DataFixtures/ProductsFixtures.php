<?php

/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 27/04/2018
 * Time: 16:14
 */

// App/DataFixtures/ProductsFixtures.php
namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product1= new Product();
        $product1->setTitle('Saucisse');
        $product1->setImage($this->getReference('image6'));
        $manager->persist($product1);

        $product2= new Product();
        $product2->setTitle('Fricadelle');
        $product2->setImage($this->getReference('image2'));
        $manager->persist($product2);

        $product3= new Product();
        $product3->setTitle('Jambon');
        $product3->setImage($this->getReference('image3'));
        $manager->persist($product3);

        $product4= new Product();
        $product4->setTitle('Merguez');
        $product4->setImage($this->getReference('image4'));
        $manager->persist($product4);



        $manager->flush();

        $this->addReference('product1',$product1);
        $this->addReference('product2',$product2);
        $this->addReference('product3',$product3);
        $this->addReference('product4',$product4);

    }

}


