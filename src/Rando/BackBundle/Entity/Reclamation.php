<?php

namespace Rando\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="Rando\BackBundle\Repository\ReclamationRepository")
 */
class Reclamation
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="Rando\BackBundle\Entity\Event", inversedBy="reclamations")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Rando\BackBundle\Entity\Produit", inversedBy="reclamations")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="Rando\BackBundle\Entity\Utilisateur", inversedBy="reclamations")
     */
    private $user;

//    /**
//     * var ArrayCollection
//     * @ORM\OneToMany(targetEntity="SBC\TiersBundle\Entity\Client", mappedBy="client", cascade={"remove"})
//     * @ORM\JoinColumn(nullable=true)
//     */
//    private $clients;


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
     * @return Reclamation
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
     * Set description
     *
     * @param string $description
     *
     * @return Reclamation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reclamation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Reclamation
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }



    /**
     * Set produit
     *
     * @param \Rando\BackBundle\Entity\Produit $produit
     *
     * @return Reclamation
     */
    public function setProduit(\Rando\BackBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Rando\BackBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set user
     *
     * @param \Rando\BackBundle\Entity\Utilisateur $user
     *
     * @return Reclamation
     */
    public function setUser(\Rando\BackBundle\Entity\Utilisateur $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Rando\BackBundle\Entity\Utilisateur
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set event
     *
     * @param \Rando\BackBundle\Entity\Event $event
     *
     * @return Reclamation
     */
    public function setEvent(\Rando\BackBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Rando\BackBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }
}
