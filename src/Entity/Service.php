<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
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
     * @ORM\Column(type="time")
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

    public function getDureeService(): ?\DateTimeInterface
    {
        return $this->dureeService;
    }

    public function setDureeService(\DateTimeInterface $dureeService): self
    {
        $this->dureeService = $dureeService;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
