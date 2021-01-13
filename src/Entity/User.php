<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository", repositoryClass=UserRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $portable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\Column(type="json")
     */
    private $role = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPortable(): ?int
    {
        return $this->portable;
    }

    public function setPortable(int $portable): self
    {
        $this->portable = $portable;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getRole(): array
    {
        $role = $this->role;
        // donne le role "User" à tout les utilisateurs
        $role[] = 'ROLE_USER';

        return array_unique($role);
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function beforePersist()
    {
        $this->createdAt = new DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function beforeUpdate()
    {

        $this->updateAt = new DateTime();
    }
}
