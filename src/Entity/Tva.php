<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("tva")
 * @ORM\Entity(repositoryClass="App\Repository\TvaRepository")
 */
class Tva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

//relation entre tva et menu
    /**
     * @ORM\OneToMany(targetEntity="Menu", mappedBy="tva")
     */
    private $menus;
    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $multiplicate;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $valeur;

    public function getId()
    {
        return $this->id;
    }

    public function getMultiplicate(): ?float
    {
        return $this->multiplicate;
    }

    public function setMultiplicate(?float $multiplicate): self
    {
        $this->multiplicate = $multiplicate;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }
    public function __toString() {
        return $this->nom;
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

}
