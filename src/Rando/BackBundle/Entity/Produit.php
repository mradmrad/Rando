<?php

namespace Rando\BackBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="Rando\BackBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="gallerieProduit", mappedBy="produit", cascade={"persist", "remove"})
     */
    private $gallerie;

    /**
     * var ArrayCollection
     * @ORM\OneToMany(targetEntity="Rando\BackBundle\Entity\Reclamation", mappedBy="event", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $reclamations;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Produit
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Produit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gallerie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reclamations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add gallerie
     *
     * @param \Rando\BackBundle\Entity\gallerieProduit $gallerie
     *
     * @return Produit
     */
    public function addGallerie(\Rando\BackBundle\Entity\gallerieProduit $gallerie)
    {
        $this->gallerie[] = $gallerie;

        return $this;
    }

    /**
     * Remove gallerie
     *
     * @param \Rando\BackBundle\Entity\gallerieProduit $gallerie
     */
    public function removeGallerie(\Rando\BackBundle\Entity\gallerieProduit $gallerie)
    {
        $this->gallerie->removeElement($gallerie);
    }

    /**
     * Get gallerie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGallerie()
    {
        return $this->gallerie;
    }

    /**
     * Add reclamation
     *
     * @param \Rando\BackBundle\Entity\Reclamation $reclamation
     *
     * @return Produit
     */
    public function addReclamation(\Rando\BackBundle\Entity\Reclamation $reclamation)
    {
        $this->reclamations[] = $reclamation;

        return $this;
    }

    /**
     * Remove reclamation
     *
     * @param \Rando\BackBundle\Entity\Reclamation $reclamation
     */
    public function removeReclamation(\Rando\BackBundle\Entity\Reclamation $reclamation)
    {
        $this->reclamations->removeElement($reclamation);
    }

    /**
     * Get reclamations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReclamations()
    {
        return $this->reclamations;
    }
}
