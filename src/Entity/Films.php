<?php

namespace App\Entity;

use App\Repository\FilmsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
class Films
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $urlAffiche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienTrailer = null;

    #[ORM\Column(length: 255)]
    private ?string $resume = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $duree = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSortie = null;

    #[ORM\ManyToOne(inversedBy: 'films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classification $Classification = null;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'films')]
    private Collection $Categorie;

    public function __construct()
    {
        $this->Categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function gettitre(): ?string
    {
        return $this->titre;
    }

    public function settitre(string $titre): static
    {
        $this->titre = $titre;

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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): static
    {
        $this->duree = $duree;

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

    public function getClassification(): ?Classification
    {
        return $this->Classification;
    }

    public function setClassification(?Classification $Classification): static
    {
        $this->Classification = $Classification;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->Categorie;
    }

    public function addCategorie(Categorie $Categorie): static
    {
        if (!$this->Categorie->contains($Categorie)) {
            $this->Categorie->add($Categorie);
        }

        return $this;
    }

    public function removeCategorie(Categorie $Categorie): static
    {
        $this->Categorie->removeElement($Categorie);

        return $this;
    }
}
