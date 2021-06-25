<?php

namespace App\Entity;

use App\Repository\FlotaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlotaRepository::class)
 */
class Flota
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marka;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typ;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rokProdukcji;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $przebieg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarka(): ?string
    {
        return $this->marka;
    }

    public function setMarka(string $marka): self
    {
        $this->marka = $marka;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getNumer(): ?string
    {
        return $this->numer;
    }

    public function setNumer(string $numer): self
    {
        $this->numer = $numer;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getTyp(): ?string
    {
        return $this->typ;
    }

    public function setTyp(string $typ): self
    {
        $this->typ = $typ;

        return $this;
    }

    public function getRokProdukcji(): ?string
    {
        return $this->rokProdukcji;
    }

    public function setRokProdukcji(string $rokProdukcji): self
    {
        $this->rokProdukcji = $rokProdukcji;

        return $this;
    }

    public function getPrzebieg(): ?string
    {
        return $this->przebieg;
    }

    public function setPrzebieg(string $przebieg): self
    {
        $this->przebieg = $przebieg;

        return $this;
    }
}
