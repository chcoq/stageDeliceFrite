<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptionRepository")
 */
class Config
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
    private $public;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cellular;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $fixe;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $activateCellular;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $activateFixe;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cb;

        /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chequeB;

        /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chequeD;

        /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chequeT;

        /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $passR;

        /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sC;

        /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tR;

    public function getId()
    {
        return $this->id;
    }

    public function getPublic()
    {
        return $this->public;
    }

    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    public function getCellular()
    {
        return $this->cellular;
    }

    public function setCellular( $cellular)
    {
        $this->cellular = $cellular;

        return $this;
    }

    public function getFixe()
    {
        return $this->fixe;
    }

    public function setFixe($fixe)
    {
        $this->fixe = $fixe;

        return $this;
    }

    public function getActivateCellular()
    {
        return $this->activateCellular;
    }

    public function setActivateCellular($activateCellular)
    {
        $this->activateCellular = $activateCellular;

        return $this;
    }

    public function getActivateFixe()
    {
        return $this->activateFixe;
    }

    public function setActivateFixe($activateFixe)
    {
        $this->activateFixe = $activateFixe;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCb()
    {
        return $this->cb;
    }

    /**
     * @param mixed $cb
     */
    public function setCb($cb)
    {
        $this->cb = $cb;
    }

    /**
     * @return mixed
     */
    public function getChequeB()
    {
        return $this->chequeB;
    }

    /**
     * @param mixed $chequeB
     */
    public function setChequeB($chequeB)
    {
        $this->chequeB = $chequeB;
    }

    /**
     * @return mixed
     */
    public function getChequeD()
    {
        return $this->chequeD;
    }

    /**
     * @param mixed $chequeD
     */
    public function setChequeD($chequeD)
    {
        $this->chequeD = $chequeD;
    }

    /**
     * @return mixed
     */
    public function getChequeT()
    {
        return $this->chequeT;
    }

    /**
     * @param mixed $chequeT
     */
    public function setChequeT($chequeT)
    {
        $this->chequeT = $chequeT;
    }

    /**
     * @return mixed
     */
    public function getPassR()
    {
        return $this->passR;
    }

    /**
     * @param mixed $passR
     */
    public function setPassR($passR)
    {
        $this->passR = $passR;
    }

    /**
     * @return mixed
     */
    public function getSC()
    {
        return $this->sC;
    }

    /**
     * @param mixed $sC
     */
    public function setSC($sC)
    {
        $this->sC = $sC;
    }

    /**
     * @return mixed
     */
    public function getTR()
    {
        return $this->tR;
    }

    /**
     * @param mixed $tR
     */
    public function setTR($tR)
    {
        $this->tR = $tR;
    }

}
