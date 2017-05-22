<?php

namespace Rando\BackBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * gallerieProduit
 *
 * @ORM\Table(name="gallerie_produit")
 * @ORM\Entity(repositoryClass="Rando\BackBundle\Repository\gallerieProduitRepository")
 */
class gallerieProduit
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
     * @var Produit
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="gallerie")
     */
    protected $produit;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

