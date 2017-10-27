<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemRepository")
 */
class Item
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="lbl", type="string", length=255, unique=false, nullable=true)
     */
    private $lbl;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255, nullable=true)
     */
    private $format;


    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255, nullable=true)
     */
    private $style;
    
    /**
    * @const path to cover directory
    */
    const COVER_DIRECTORY = '/uploads/cover/';


    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $cover;

    /**
     * @var File
     *
     * @Assert\NotBlank(message="S'il vous plait, ajoutez une image de couverture")
     * @Assert\File(mimeTypes={ "image/jpeg","image/png"  })
     */
    private $file;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Item
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Item
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set lbl
     *
     * @param string $lbl
     *
     * @return Item
     */
    public function setLbl($lbl)
    {
        $this->lbl = $lbl;

        return $this;
    }

    /**
     * Get lbl
     *
     * @return string
     */
    public function getLbl()
    {
        return $this->lbl;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Item
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set style
     *
     * @param string $style
     *
     * @return Item
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }
    /**
     * Get Cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Article
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param File $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }
        /**
     * On part de notre class et on remonte jusqu'au dossier web
     * Chemin physique sur le serveur du dossier d'upload
     *
     * @return string
     */
    public function getCoverUploadDirectory()
    {
        return __DIR__ . "/../../../web" . self::COVER_DIRECTORY;
    }

    /**
     * Chemin physique de l'image sur le serveur  
     * 
     * @return string
     */
    public function getCoverAbsolutePath()
    {
        return $this->getCoverUploadDirectory() . $this->getCover();
    }

    /**
     * Chemin de l'image via l'URL, servira dans pour l'affichage dans les templates twig
     *
     * @return string
     */
    public function getCoverWebPath()
    {
        return self::COVER_DIRECTORY . $this->getCover();
    }
}


