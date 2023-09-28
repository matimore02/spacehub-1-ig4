<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\utilisateur; // Assurez-vous d'importer la classe utilisateur

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_pub = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_pub = null;

    #[ORM\Column(length: 10000)]
    private ?string $text_pub = null;

    #[ORM\ManyToOne(targetEntity: utilisateur::class)]
    #[ORM\JoinColumn(name: "id_utilisateur", referencedColumnName: "id_use", nullable: false)]
    private ?utilisateur $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: TypePublication::class)]
    #[ORM\JoinColumn(name: "id_tp", referencedColumnName: "id_tp", nullable: false)]
    private ?TypePublication $typePublication = null;

    #[ORM\OneToMany(mappedBy: 'id_pub', targetEntity: Modifier::class)]
    private Collection $modifiers;

    public function __construct()
    {
        $this->modifiers = new ArrayCollection();
    }

    public function getIdPub(): ?int
    {
        return $this->id_pub;
    }

    public function getImagePub(): ?string
    {
        return $this->image_pub;
    }

    public function setImagePub(?string $image_pub): static
    {
        $this->image_pub = $image_pub;

        return $this;
    }

    public function getTextPub(): ?string
    {
        return $this->text_pub;
    }

    public function setTextPub(string $text_pub): static
    {
        $this->text_pub = $text_pub;

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

    public function getTypePublication(): ?TypePublication
    {
        return $this->typePublication;
    }

    public function setTypePublication(?TypePublication $typePublication): static
    {
        $this->typePublication = $typePublication;

        return $this;
    }

    /**
     * @return Collection<int, Modifier>
     */
    public function getModifiers(): Collection
    {
        return $this->modifiers;
    }

    public function addModifier(Modifier $modifier): static
    {
        if (!$this->modifiers->contains($modifier)) {
            $this->modifiers->add($modifier);
            $modifier->setIdPub($this);
        }

        return $this;
    }

    public function removeModifier(Modifier $modifier): static
    {
        if ($this->modifiers->removeElement($modifier)) {
            // set the owning side to null (unless already changed)
            if ($modifier->getIdPub() === $this) {
                $modifier->setIdPub(null);
            }
        }

        return $this;
    }
}
