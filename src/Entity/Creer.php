<?php

namespace App\Entity;

use App\Repository\CreerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreerRepository::class)]
class Creer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_cre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCre(): ?\DateTimeInterface
    {
        return $this->date_cre;
    }

    public function setDateCre(\DateTimeInterface $date_cre): static
    {
        $this->date_cre = $date_cre;

        return $this;
    }
}
