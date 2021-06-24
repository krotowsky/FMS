<?php

namespace App\Entity;

use App\Repository\UmowyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UmowyRepository::class)
 */
class Umowy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $numerUmowy;

    /**
     * @ORM\Column(type="integer")
     */
    private $kontrahentId;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $dataOd;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $dataDo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notatka;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerUmowy(): ?string
    {
        return $this->numerUmowy;
    }

    public function setNumerUmowy(string $numerUmowy): self
    {
        $this->numerUmowy = $numerUmowy;

        return $this;
    }

    public function getKontrahentId(): ?int
    {
        return $this->kontrahentId;
    }

    public function setKontrahentId(int $kontrahentId): self
    {
        $this->kontrahentId = $kontrahentId;

        return $this;
    }

    public function getDataOd(): ?string
    {
        return $this->dataOd;
    }

    public function setDataOd(string $dataOd): self
    {
        $this->dataOd = $dataOd;

        return $this;
    }

    public function getDataDo(): ?string
    {
        return $this->dataDo;
    }

    public function setDataDo(string $dataDo): self
    {
        $this->dataDo = $dataDo;

        return $this;
    }

    public function getNotatka(): ?string
    {
        return $this->notatka;
    }

    public function setNotatka(?string $notatka): self
    {
        $this->notatka = $notatka;

        return $this;
    }
}
