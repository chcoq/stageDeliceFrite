<?php

/**
 * Created by PhpStorm.
 * User: lecocq
 * Date: 27/04/2018
 * Time: 16:14
 */

// App/DataFixtures/ImagesFixtures.php
namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $image1 = new Image();
        $image1->setAlt('americain');
        $image1->setPath('americain.jpg');
        $manager->persist($image1);

        $image2 = new Image();
        $image2->setAlt('fricadelle');
        $image2->setPath('fricadelle.jpg');
        $manager->persist($image2);

        $image3 = new Image();
        $image3->setAlt('jambon');
        $image3->setPath('jambon.jpg');
        $manager->persist($image3);

        $image4 = new Image();
        $image4->setAlt('merguez');
        $image4->setPath('merguez.jpg');
        $manager->persist($image4);

        $image5 = new Image();
        $image5->setAlt('sandwich');
        $image5->setPath('sandwich.jpg');
        $manager->persist($image5);

        $image6 = new Image();
        $image6->setAlt('saucisse');
        $image6->setPath('saucisse.jpg');
        $manager->persist($image6);

        $manager->flush();

        $this->addReference('image1',$image1);
        $this->addReference('image2',$image2);
        $this->addReference('image3',$image3);
        $this->addReference('image4',$image4);
        $this->addReference('image5',$image5);
        $this->addReference('image6',$image6);
    }

}


