<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandesRepository")
 */
class Commandes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valider;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $commande;

//relation avec User
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="commandes")
     */
    private $userOrm;

    public function getId()
    {
        return $this->id;
    }

    public function getValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(?bool $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(?int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }


    public function getCommande()
    {
        return $this->commande;
    }


    public function setCommande($commande)
    {
        $this->commande = $commande;
    }



    /**
     * @return mixed
     */
    public function getUserOrm()
    {
        return $this->userOrm;
    }

    /**
     * @param mixed $userOrm
     */
    public function setUserOrm($userOrm)
    {
        $this->userOrm = $userOrm;
    }

}
