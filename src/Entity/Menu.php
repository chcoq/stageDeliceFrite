<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
    private $name;

    /**
    * @ORM\Column(type="float")
    */
    private $price;

    //Ajout de la jointure entre la table menu et category
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="menus")
     */
    private $category;
    /**
     * Many Menus have Many Products.
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="menus")
     * @ORM\JoinTable(name="menu_products")
     */
    private $products;

    public  function  __construct()
    {
        $this->products = new ArrayCollection();

    }
    //fin de la jointure

    //ajout de la jointure  entre la table menu et la table produid

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    //fin de la jointure

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function __toString() {
        return $this->name;
    }

}
