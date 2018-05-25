<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HoraireRepository")
 */
class Horaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $jour;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $midiDebut;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $midifin;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $soirdebut;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $soirfin;

    public function getId()
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getMidiDebut(): ?\DateTimeInterface
    {
        return $this->midiDebut;
    }

    public function setMidiDebut(?\DateTimeInterface $midiDebut): self
    {
        $this->midiDebut = $midiDebut;

        return $this;
    }

    public function getMidifin(): ?\DateTimeInterface
    {
        return $this->midifin;
    }

    public function setMidifin(?\DateTimeInterface $midifin): self
    {
        $this->midifin = $midifin;

        return $this;
    }

    public function getSoirdebut(): ?\DateTimeInterface
    {
        return $this->soirdebut;
    }

    public function setSoirdebut(?\DateTimeInterface $soirdebut): self
    {
        $this->soirdebut = $soirdebut;

        return $this;
    }

    public function getSoirfin(): ?\DateTimeInterface
    {
        return $this->soirfin;
    }

    public function setSoirfin(?\DateTimeInterface $soirfin): self
    {
        $this->soirfin = $soirfin;

        return $this;
    }
}
