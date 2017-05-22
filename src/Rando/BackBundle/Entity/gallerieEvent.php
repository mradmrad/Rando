<?php

namespace Rando\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * gallerieEvent
 *
 * @ORM\Table(name="gallerie_event")
 * @ORM\Entity(repositoryClass="Rando\BackBundle\Repository\gallerieEventRepository")
 */
class gallerieEvent
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
     * @var Event
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="gallerie")
     */
    protected $event;


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

