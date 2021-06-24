<?php

namespace App\Entity;

use App\Repository\KontrahentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KontrahentRepository::class)
 */
class Kontrahent
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
    private $nazwa;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $NIP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $KRS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $REGON;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notatka;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getNIP(): ?string
    {
        return $this->NIP;
    }

    public function setNIP(string $NIP): self
    {
        $this->NIP = $NIP;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(?string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getKRS(): ?string
    {
        return $this->KRS;
    }

    public function setKRS(?string $KRS): self
    {
        $this->KRS = $KRS;

        return $this;
    }

    public function getREGON(): ?string
    {
        return $this->REGON;
    }

    public function setREGON(?string $REGON): self
    {
        $this->REGON = $REGON;

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
