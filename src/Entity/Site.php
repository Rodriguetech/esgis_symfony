<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
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
    private $nomSite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $anneedecouv;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="sites")
     */
    private $codePays;

    /**
     * @ORM\OneToMany(targetEntity=Referencier::class, mappedBy="siteNom")
     */
    private $referenciers;

    public function __construct()
    {
        $this->referenciers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSite(): ?string
    {
        return $this->nomSite;
    }

    public function setNomSite(string $nomSite): self
    {
        $this->nomSite = $nomSite;

        return $this;
    }

    public function getAnneedecouv(): ?\DateTimeInterface
    {
        return $this->anneedecouv;
    }

    public function setAnneedecouv(\DateTimeInterface $anneedecouv): self
    {
        $this->anneedecouv = $anneedecouv;

        return $this;
    }

    public function getCodePays(): ?Pays
    {
        return $this->codePays;
    }

    public function setCodePays(?Pays $codePays): self
    {
        $this->codePays = $codePays;

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
            $referencier->setSiteNom($this);
        }

        return $this;
    }

    public function removeReferencier(Referencier $referencier): self
    {
        if ($this->referenciers->removeElement($referencier)) {
            // set the owning side to null (unless already changed)
            if ($referencier->getSiteNom() === $this) {
                $referencier->setSiteNom(null);
            }
        }

        return $this;
    }
}
