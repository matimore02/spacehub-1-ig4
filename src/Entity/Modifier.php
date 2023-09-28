<?php

namespace App\Entity;

use App\Repository\ModifierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModifierRepository::class)]
class Modifier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_mdf = null;

    #[ORM\Column(length: 255)]
    private ?string $demande_mdf = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "id_Utilisateur", referencedColumnName: "id_use", nullable: false)]
    private ?Utilisateur $Utilisateur = null;

    #[ORM\ManyToOne(targetEntity: Publication::class)]
    #[ORM\JoinColumn(name: "id_pub", referencedColumnName: "id_pub", nullable: false)]
    private ?publication $id_pub = null;

    public function getIdMdf(): ?int
    {
        return $this->id;
    }

    public function getDateMdf(): ?\DateTimeInterface
    {
        return $this->date_mdf;
    }

    public function setDateMdf(\DateTimeInterface $date_mdf): static
    {
        $this->date_mdf = $date_mdf;

        return $this;
    }

    public function getDemandeMdf(): ?string
    {
        return $this->demande_mdf;
    }

    public function setDemandeMdf(string $demande_mdf): static
    {
        $this->demande_mdf = $demande_mdf;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): static
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    public function getIdPub(): ?publication
    {
        return $this->id_pub;
    }

    public function setIdPub(?publication $id_pub): static
    {
        $this->id_pub = $id_pub;

        return $this;
    }
}
