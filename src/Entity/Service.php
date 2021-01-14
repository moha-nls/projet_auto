<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
    private $nomService;

    /**
     * @ORM\Column(type="float")
     */
    private $prixService;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptionService;

    /**
     * @ORM\Column(type="string")
     */
    private $dureeService;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\OneToMany(targetEntity=RendezVous::class, mappedBy="Service")
     */
    private $RendezVous;

    public function __construct()
    {
        $this->RendezVous = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(string $nomService): self
    {
        $this->nomService = $nomService;

        return $this;
    }

    public function getPrixService(): ?float
    {
        return $this->prixService;
    }

    public function setPrixService(float $prixService): self
    {
        $this->prixService = $prixService;

        return $this;
    }

    public function getDescriptionService(): ?string
    {
        return $this->descriptionService;
    }

    public function setDescriptionService(?string $descriptionService): self
    {
        $this->descriptionService = $descriptionService;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDureeService()
    {
        return $this->dureeService;
    }

    /**
     * @param mixed $dureeService
     */
    public function setDureeService($dureeService): void
    {
        $this->dureeService = $dureeService;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
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
     * @return Collection|RendezVous[]
     */
    public function getRendezVous(): Collection
    {
        return $this->RendezVous;
    }

    public function addRendezVou(RendezVous $rendezVou): self
    {
        if (!$this->RendezVous->contains($rendezVou)) {
            $this->RendezVous[] = $rendezVou;
            $rendezVou->setService($this);
        }

        return $this;
    }

    public function removeRendezVou(RendezVous $rendezVou): self
    {
        if ($this->RendezVous->removeElement($rendezVou)) {
            // set the owning side to null (unless already changed)
            if ($rendezVou->getService() === $this) {
                $rendezVou->setService(null);
            }
        }

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
    public function __toString()
    {
        return $this->nomService;
    }
}
