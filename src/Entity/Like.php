<?php

namespace App\Entity;

use App\Repository\LikeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikeRepository::class)]
#[ORM\Table(name: '`like`')]
class Like
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_lik = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "id_utilisateur", referencedColumnName: "id_use", nullable: false)]
    private ?utilisateur $utilisateur = null;

    public function getIdLike(): ?int
    {
        return $this->id_lik;
    }

    public function getutilisateur(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setutilisateur(?utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
