<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_adm = null;



    #[ORM\Column(length: 255)]
    private ?string $pseudo_adm = null;

    #[ORM\Column(length: 64)]
    private ?string $mdp_adm = null;

    #[ORM\Column(length: 255)]
    private ?string $mail_adm = null;

    #[ORM\Column(length: 20)]
    private ?string $phone_adm = null;

    #[ORM\OneToMany(mappedBy: 'adm', targetEntity: Moderer::class)]
    private Collection $moderers;

    public function __construct()
    {
        $this->moderers = new ArrayCollection();
    }

    public function getId_adm(): ?int
    {
        return $this->id_adm;
    }


    public function getPseudoAdm(): ?string
    {
        return $this->pseudo_adm;
    }

    public function setPseudoAdm(string $pseudo_adm): static
    {
        $this->pseudo_adm = $pseudo_adm;

        return $this;
    }

    public function getMdpAdm(): ?string
    {
        return $this->mdp_adm;
    }

    public function setMdpAdm(string $mdp_adm): static
    {
        $this->mdp_adm = $mdp_adm;

        return $this;
    }

    public function getMailAdm(): ?string
    {
        return $this->mail_adm;
    }

    public function setMailAdm(string $mail_adm): static
    {
        $this->mail_adm = $mail_adm;

        return $this;
    }

    public function getPhoneAdm(): ?string
    {
        return $this->phone_adm;
    }

    public function setPhoneAdm(string $phone_adm): static
    {
        $this->phone_adm = $phone_adm;

        return $this;
    }

    /**
     * @return Collection<int, Moderer>
     */
    public function getModerers(): Collection
    {
        return $this->moderers;
    }

    public function addModerer(Moderer $moderer): static
    {
        if (!$this->moderers->contains($moderer)) {
            $this->moderers->add($moderer);
            $moderer->setAdm($this);
        }

        return $this;
    }

    public function removeModerer(Moderer $moderer): static
    {
        if ($this->moderers->removeElement($moderer)) {
            // set the owning side to null (unless already changed)
            if ($moderer->getAdm() === $this) {
                $moderer->setAdm(null);
            }
        }

        return $this;
    }
}
