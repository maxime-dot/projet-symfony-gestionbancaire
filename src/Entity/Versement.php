<?php

namespace App\Entity;

use App\Repository\VersementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VersementRepository::class)]
class Versement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $clients = null;

    #[ORM\Column]
    private ?float $MontantVerse = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateVerse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClients(): ?Client
    {
        return $this->clients;
    }

    public function setClients(?Client $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    public function getMontantVerse(): ?float
    {
        return $this->MontantVerse;
    }

    public function setMontantVerse(float $MontantVerse): self
    {
        $this->MontantVerse = $MontantVerse;

        return $this;
    }

    public function getDateVerse(): ?\DateTimeImmutable
    {
        return $this->dateVerse;
    }

    public function setDateVerse(\DateTimeImmutable $dateVerse): self
    {
        $this->dateVerse = $dateVerse;

        return $this;
    }
}
