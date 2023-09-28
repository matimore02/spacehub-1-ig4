<?php

namespace App\Entity;

use App\Repository\ModererRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModererRepository::class)]
class Moderer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_mod = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_mod = null;

    #[ORM\Column(length: 255)]
    private ?string $etatutilisateur_mod = null;

    #[ORM\ManyToOne(targetEntity: utilisateur::class)]
    #[ORM\JoinColumn(name: "id_utilisateur", referencedColumnName: "id_use", nullable: false)]
    private ?utilisateur $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: Admin::class)]
    #[ORM\JoinColumn(name: "id_adm", referencedColumnName: "id_adm", nullable: false)]
    private ?admin $adm = null;

    public function getId(): ?int
    {
        return $this->id_mod;
    }

    public function getDateMod(): ?\DateTimeInterface
    {
        return $this->date_mod;
    }

    public function setDateMode(\DateTimeInterface $date_mod): static
    {
        $this->date_mod = $date_mod;

        return $this;
    }

    public function getEtatutilisateurMod(): ?string
    {
        return $this->etatutilisateur_mod;
    }

    public function setEtatutilisateurMod(string $etatutilisateur_mod): static
    {
        $this->etatutilisateur_mod = $etatutilisateur_mod;

        return $this;
    }

    public function getIdUse(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setIdUse(?utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getAdm(): ?admin
    {
        return $this->adm;
    }

    public function setAdm(?admin $adm): static
    {
        $this->adm = $adm;

        return $this;
    }
}
