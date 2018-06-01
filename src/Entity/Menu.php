<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 * @ORM\Table("menu")
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
{
    /**
     *
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

    /**
     * @ORM\Column(type="text")
     */
    private $description;
//jointure entre menu et tva
    /**
     * @ORM\ManyToOne(targetEntity="Tva", inversedBy="menus",cascade={"persist","remove"})
     */
    private $tva;

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

    public function __construct()
    {
        $this->products = new ArrayCollection();

    }

    //fin de la jointure


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

        $new = $name;
        $new = preg_replace('#Ç#', 'C', $new);
        $new = preg_replace('#ç#', 'c', $new);
        $new = preg_replace('#è|é|ê|ë#', 'e', $new);
        $new = preg_replace('#È|É|Ê|Ë#', 'E', $new);
        $new = preg_replace('#à|á|â|ã|ä|å#', 'a', $new);
        $new = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $new);
        $new = preg_replace('#ì|í|î|ï#', 'i', $new);
        $new = preg_replace('#Ì|Í|Î|Ï#', 'I', $new);
        $new = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $new);
        $new = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $new);
        $new = preg_replace('#ù|ú|û|ü#', 'u', $new);
        $new = preg_replace('#Ù|Ú|Û|Ü#', 'U', $new);
        $new = preg_replace('#ý|ÿ#', 'y', $new);
        $new = preg_replace('#Ý#', 'Y', $new);
        $new = preg_replace('#"#', '', $new);
        $new = preg_replace('#-#', '', $new);
        $new = preg_replace('#&#', '', $new);
        $new = preg_replace('#/#', '', $new);
        $new = preg_replace('#\'#', '', $new);
        $new = preg_replace('#\\\#', '', $new);
        $new = preg_replace('#~#', '', $new);
        $new = preg_replace('#{|}#', '', $new);
        $new = preg_replace('#\[|\]|\(|\)#', '', $new);
        $new = preg_replace('#\|#', '', $new);
        $new = preg_replace('#\##', '', $new);
        $new = preg_replace('#²|`|^|@|_#', '', $new);
        $new = preg_replace('#°|=|\+|¨|^ #', '', $new);
        $new = preg_replace('#,|;|:|!|\?|\.|§|€|£|\$|ù|%|¤|\*|µ|>|<|\^|\^   #', '', $new);

        $new = mb_strtolower($new);



        $new = mb_strtolower($new);


        $this->name = $new;
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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getTva()
    {
        return $this->tva;
    }


    public function setTva($tva)
    {
//        dump($tva);
//        die();
        $this->tva = $tva;
    }


    public function __toString()
    {
        return $this->name;
    }

}
