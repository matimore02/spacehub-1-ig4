<?php


namespace App\Entity;


use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
   #[ORM\Id]
   #[ORM\GeneratedValue]
   #[ORM\Column]
   private ?int $id_use = null;


   #[ORM\Column(length: 180, unique: true)]
   private ?string $username = null;


   #[ORM\Column]
   private array $roles = [];


   #[ORM\Column(length: 180)]
   private ?string $password = null;

   #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Publication::class)]
   private Collection $publication;

   #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Modifier::class)]
   private Collection $modifiers;

   public function getId(): ?int
   {
       return $this->id_use;
   }


   public function getUsername(): ?string
   {
       return $this->username;
   }


   public function setUsername(string $username): self
   {
       $this->username = $username;


       return $this;
   }


   /**
    * A visual identifier that represents this user.
    *
    * @see UserInterface
    */
   public function getUserIdentifier(): string
   {
       return (string) $this->username;
   }


   /**
    * @see UserInterface
    */
   public function getRoles(): array
   {
       $roles = $this->roles;
       // guarantee every user at least has ROLE_USER
       $roles[] = 'ROLE_USER';


       return array_unique($roles);
   }


   public function setRoles(array $roles): self
   {
       $this->roles = $roles;


       return $this;
   }
   /**
    * @see UserInterface
    */
    public function getPassword(): string
    {
        return (string) $this->password;
    }
 
 
    public function setPassword(string $password): self
    {
        $this->password = $password;
 
 
        return $this;
    }


   /**
    * @see UserInterface
    */
   public function eraseCredentials()
   {
       // If you store any temporary, sensitive data on the user, clear it here
       // $this->plainPassword = null;
   }
   /**
     * @return Collection<int, Publication>
     */
    public function getPublication(): Collection
    {
        return $this->publication;
    }

    public function addPublication(Publication $publication): static
    {
        if (!$this->publication->contains($publication)) {
            $this->publication->add($publication);
            $publication->setutilisateur($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): static
    {
        if ($this->publication->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getutilisateur() === $this) {
                $publication->setutilisateur(null);
            }
        }

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
            $modifier->setUtilisateur($this);
        }

        return $this;
    }

    public function removeModifier(Modifier $modifier): static
    {
        if ($this->modifiers->removeElement($modifier)) {
            // set the owning side to null (unless already changed)
            if ($modifier->getUtilisateur() === $this) {
                $modifier->setUtilisateur(null);
            }
        }

        return $this;
    }

}
