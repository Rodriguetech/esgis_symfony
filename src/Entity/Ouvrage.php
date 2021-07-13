<?php

namespace App\Entity;

use App\Repository\OuvrageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OuvrageRepository::class)
 */
class Ouvrage
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
    private $ISBN;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="ouvrages")
     */
    private $codepays;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothque::class, mappedBy="ISBN")
     */
    private $bibliothques;

    /**
     * @ORM\OneToMany(targetEntity=Referencier::class, mappedBy="ISBN")
     */
    private $referenciers;

    public function __construct()
    {
        $this->bibliothques = new ArrayCollection();
        $this->referenciers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(string $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getNbPage(): ?int
    {
        return $this->nbPage;
    }

    public function setNbPage(int $nbPage): self
    {
        $this->nbPage = $nbPage;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getCodepays(): ?Pays
    {
        return $this->codepays;
    }

    public function setCodepays(?Pays $codepays): self
    {
        $this->codepays = $codepays;

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
            $bibliothque->setISBN($this);
        }

        return $this;
    }

    public function removeBibliothque(Bibliothque $bibliothque): self
    {
        if ($this->bibliothques->removeElement($bibliothque)) {
            // set the owning side to null (unless already changed)
            if ($bibliothque->getISBN() === $this) {
                $bibliothque->setISBN(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Referencier[]
     */
    public function getReferenciers(): Collection
    {
        return $this->referenciers;
    }

    public function addReferencier(Referencier $referencier): self
    {
        if (!$this->referenciers->contains($referencier)) {
            $this->referenciers[] = $referencier;
            $referencier->setISBN($this);
        }

        return $this;
    }

    public function removeReferencier(Referencier $referencier): self
    {
        if ($this->referenciers->removeElement($referencier)) {
            // set the owning side to null (unless already changed)
            if ($referencier->getISBN() === $this) {
                $referencier->setISBN(null);
            }
        }

        return $this;
    }
}
