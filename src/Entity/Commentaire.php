<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1024)]
    private ?string $text_com = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "id_utilisateur", referencedColumnName: "id_use", nullable: false)]
    private ?utilisateur $utilisateur = null;

    #[ORM\Column]
    private ?int $nbLike_com = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextCom(): ?string
    {
        return $this->text_com;
    }

    public function setTextCom(string $text_com): static
    {
        $this->text_com = $text_com;

        return $this;
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

    public function getNbLikeCom(): ?int
    {
        return $this->nbLike_com;
    }

    public function setNbLikeCom(int $nbLike_com): static
    {
        $this->nbLike_com = $nbLike_com;

        return $this;
    }
}
