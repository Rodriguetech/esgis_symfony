<?php

namespace App\Entity;

use App\Repository\MuseeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Visiter::class, mappedBy="numMusee")
     */
    private $visiters;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothque::class, mappedBy="numMus")
     */
    private $bibliothques;

    public function __construct()
    {
        $this->visiters = new ArrayCollection();
        $this->bibliothques = new ArrayCollection();
    }


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

    /**
     * @return Collection|Visiter[]
     */
    public function getVisiters(): Collection
    {
        return $this->visiters;
    }

    public function addVisiter(Visiter $visiter): self
    {
        if (!$this->visiters->contains($visiter)) {
            $this->visiters[] = $visiter;
            $visiter->setNumMusee($this);
        }

        return $this;
    }

    public function removeVisiter(Visiter $visiter): self
    {
        if ($this->visiters->removeElement($visiter)) {
            // set the owning side to null (unless already changed)
            if ($visiter->getNumMusee() === $this) {
                $visiter->setNumMusee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bibliothque[]
     */
    public function getBibliothques(): Collection
    {
        return $this->bibliothques;
    }

    public function addBibliothque(Bibliothque $bibliothque): self
    {
        if (!$this->bibliothques->contains($bibliothque)) {
            $this->bibliothques[] = $bibliothque;
            $bibliothque->setNumMus($this);
        }

        return $this;
    }

    public function removeBibliothque(Bibliothque $bibliothque): self
    {
        if ($this->bibliothques->removeElement($bibliothque)) {
            // set the owning side to null (unless already changed)
            if ($bibliothque->getNumMus() === $this) {
                $bibliothque->setNumMus(null);
            }
        }

        return $this;
    }

}
