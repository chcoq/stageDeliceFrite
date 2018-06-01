<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 * @ORM\Table("category")
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
        $new = $nameCat;
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

        $this->nameCat = $new;

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
