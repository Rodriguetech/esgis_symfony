<?php

namespace App\Entity;

use App\Repository\VisiterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisiterRepository::class)
 */
class Visiter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbVisiteurs;

    /**
     * @ORM\ManyToOne(targetEntity=Musee::class, inversedBy="visiters")
     */
    private $numMusee;

    /**
     * @ORM\ManyToOne(targetEntity=Moment::class, inversedBy="visiters")
     */
    private $jour;


    public function __construct()
    {
        $this->numMusee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbVisiteurs(): ?int
    {
        return $this->nbVisiteurs;
    }

    public function setNbVisiteurs(int $nbVisiteurs): self
    {
        $this->nbVisiteurs = $nbVisiteurs;

        return $this;
    }

    public function getNumMusee(): ?Musee
    {
        return $this->numMusee;
    }

    public function setNumMusee(?Musee $numMusee): self
    {
        $this->numMusee = $numMusee;

        return $this;
    }

    public function getJour(): ?Moment
    {
        return $this->jour;
    }

    public function setJour(?Moment $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

}
