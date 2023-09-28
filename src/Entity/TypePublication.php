<?php

namespace App\Entity;

use App\Repository\TypePublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Publication; // Assurez-vous d'importer la classe Publication

#[ORM\Entity(repositoryClass: TypePublicationRepository::class)]
class TypePublication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_tp = null;

    #[ORM\Column(length: 255)]
    private ?string $type_tp = null;

    #[ORM\OneToMany(mappedBy: 'typePublication', targetEntity: Publication::class)]
    private Collection $publications;

    public function getIdTp(): ?int
    {
        return $this->id_tp;
    }

    public function getTypeTp(): ?string
    {
        return $this->type_tp;
    }

    public function setTypeTp(string $type_tp): static
    {
        $this->type_tp = $type_tp;

        return $this;
    }

    /**
     * @return Collection<int, Publication>
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): static
    {
        if (!$this->publications->contains($publication)) {
            $this->publications->add($publication);
            $publication->setTypePublication($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): static
    {
        if ($this->publications->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getTypePublication() === $this) {
                $publication->setTypePublication(null);
            }
        }

        return $this;
    }
}
