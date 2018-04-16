<?php

namespace App\Entity;

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

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

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
