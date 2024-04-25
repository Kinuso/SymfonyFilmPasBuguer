<?php

namespace App\Entity;

use App\Repository\SymfotestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymfotestRepository::class)]
class Symfotest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $film = null;

    #[ORM\Column(length: 255)]
    private ?string $urlAffiche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienTrailer = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $durée = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSortie = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilm(): ?string
    {
        return $this->film;
    }

    public function setFilm(string $film): static
    {
        $this->film = $film;

        return $this;
    }

    public function getUrlAffiche(): ?string
    {
        return $this->urlAffiche;
    }

    public function setUrlAffiche(string $urlAffiche): static
    {
        $this->urlAffiche = $urlAffiche;

        return $this;
    }

    public function getLienTrailer(): ?string
    {
        return $this->lienTrailer;
    }

    public function setLienTrailer(?string $lienTrailer): static
    {
        $this->lienTrailer = $lienTrailer;

        return $this;
    }

    public function getDurée(): ?\DateTimeInterface
    {
        return $this->durée;
    }

    public function setDurée(\DateTimeInterface $durée): static
    {
        $this->durée = $durée;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): static
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
