<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

//    /**
//     * @ORM\Column(type="string", length=50 ,nullable=true)
//     */
    /**
     * @ORM\OneToMany(targetEntity="Commandes", mappedBy="userOrm")
     */
    private $commandes;
    /**
     * @ORM\OneToMany(targetEntity="UtilisateursAdresses", mappedBy="user", cascade={"remove"})
     */
    private $adresses;
//relation

    public function __construct()
    {
        parent::__construct();
        $this->commandes = new ArrayCollection();
        $this->adresses = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * @param mixed $commandes
     */
    public function setCommandes($commandes)
    {
        $this->commandes = $commandes;
    }

    /**
     * @return mixed
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    /**
     * @param mixed $adresses
     */
    public function setAdresses($adresses)
    {
        $this->adresses = $adresses;
    }



}
