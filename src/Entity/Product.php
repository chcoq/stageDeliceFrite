<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tile;

    //jointure entre les tables menu et product

    /**
     * Many Products have Many Menus.
     * @ORM\ManyToMany(targetEntity="Menu" , mappedBy="products")
     */

    private  $menus;
    public function __construct()
    {
        $this->menus = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * @param mixed $menus
     */
    public function setMenus($menus)
    {
        $this->menus = $menus;
    }

    //fin de la jointure

    public function getId()
    {
        return $this->id;
    }

    public function getTile(): ?string
    {
        return $this->tile;
    }

    public function setTile(string $tile): self
    {
        $this->tile = $tile;

        return $this;
    }

    public function __toString() {
        return $this->tile;
    }
}
