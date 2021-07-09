<?php

namespace App\Entity;

use App\Repository\MuseeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MuseeRepository::class)
 */
class Musee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numMus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomMus;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbLivres;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="musees")
     */
    private $pays;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumMus(): ?string
    {
        return $this->numMus;
    }

    public function setNumMus(string $numMus): self
    {
        $this->numMus = $numMus;

        return $this;
    }

    public function getNomMus(): ?string
    {
        return $this->nomMus;
    }

    public function setNomMus(string $nomMus): self
    {
        $this->nomMus = $nomMus;

        return $this;
    }

    public function getNbLivres(): ?int
    {
        return $this->nbLivres;
    }

    public function setNbLivres(int $nbLivres): self
    {
        $this->nbLivres = $nbLivres;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
