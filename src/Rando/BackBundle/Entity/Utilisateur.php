<?php

namespace Rando\BackBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser ;
/**
 * Utilisateur
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="Rando\BackBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrPoints", type="integer", length=255)
     */
    protected $nbrPoints;


    /**
     * var ArrayCollection
     * @ORM\OneToMany(targetEntity="Rando\BackBundle\Entity\Reclamation", mappedBy="event", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $reclamations;
    

    /**
     * Utilisateur constructor.
     * @param int $nbrPoints
     */
    public function __construct()
    {
        
        $this->nbrPoints = 500 ;
    }


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
     * Set nbrPoints
     *
     * @param integer $nbrPoints
     *
     * @return Utilisateur
     */
    public function setNbrPoints($nbrPoints)
    {
        $this->nbrPoints = $nbrPoints;

        return $this;
    }

    /**
     * Get nbrPoints
     *
     * @return integer
     */
    public function getNbrPoints()
    {
        return $this->nbrPoints;
    }



    /**
     * Add reclamation
     *
     * @param \Rando\BackBundle\Entity\Reclamation $reclamation
     *
     * @return Utilisateur
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
