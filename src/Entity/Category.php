<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nameCat;

    //ajout de la jointure entre la table category et la table menu

    /**
     * @ORM\OneToMany(targetEntity="Menu", mappedBy="category")
     */
    private $menus;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
    }

    public function getMenus()
    {
        return $this->menus;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNameCat(): ?string
    {
        return $this->nameCat;
    }

    public function setNameCat(string $nameCat): self
    {
        $this->nameCat = $nameCat;

        return $this;
    }
//    public  function  __toString($object)
//    {
//        return $object instanceof  Category
//            ? $object->getName()
//            : 'Category';
//    }
    public function __toString() {
        return $this->nameCat;
    }
}
