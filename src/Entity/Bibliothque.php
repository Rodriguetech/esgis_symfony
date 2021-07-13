<?php

namespace App\Entity;

use App\Repository\BibliothqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothqueRepository::class)
 */
class Bibliothque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Musee::class, inversedBy="bibliothques")
     */
    private $numMus;

    /**
     * @ORM\ManyToOne(targetEntity=Ouvrage::class, inversedBy="bibliothques")
     */
    private $ISBN;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAchat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumMus(): ?Musee
    {
        return $this->numMus;
    }

    public function setNumMus(?Musee $numMus): self
    {
        $this->numMus = $numMus;

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

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }
}
