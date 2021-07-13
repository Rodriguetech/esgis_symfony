<?php

namespace App\Entity;

use App\Repository\ReferencierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReferencierRepository::class)
 */
class Referencier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Site::class, inversedBy="referenciers")
     */
    private $siteNom;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroPage;

    /**
     * @ORM\ManyToOne(targetEntity=Ouvrage::class, inversedBy="referenciers")
     */
    private $ISBN;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteNom(): ?Site
    {
        return $this->siteNom;
    }

    public function setSiteNom(?Site $siteNom): self
    {
        $this->siteNom = $siteNom;

        return $this;
    }

    public function getNumeroPage(): ?int
    {
        return $this->numeroPage;
    }

    public function setNumeroPage(int $numeroPage): self
    {
        $this->numeroPage = $numeroPage;

        return $this;
    }

    public function getISBN(): ?Ouvrage
    {
        return $this->ISBN;
    }

    public function setISBN(?Ouvrage $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }
}
