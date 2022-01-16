<?php

namespace App\Entity;

use App\Repository\NekretninaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NekretninaRepository::class)
 */
class Nekretnina
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
    private $naslov;

    /**
     * @ORM\Column(type="text")
     */
    private $opis;

    /**
     * @ORM\Column(type="float")
     */
    private $cijena;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kategorija;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaslov(): ?string
    {
        return $this->naslov;
    }

    public function setNaslov(string $naslov): self
    {
        $this->naslov = $naslov;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): self
    {
        $this->opis = $opis;

        return $this;
    }

    public function getCijena(): ?float
    {
        return $this->cijena;
    }

    public function setCijena(float $cijena): self
    {
        $this->cijena = $cijena;

        return $this;
    }

    public function getKategorija(): ?string
    {
        return $this->kategorija;
    }

    public function setKategorija(string $kategorija): self
    {
        $this->kategorija = $kategorija;

        return $this;
    }
}
