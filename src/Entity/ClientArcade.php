<?php

namespace App\Entity;

use App\Repository\ClientArcadeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientArcadeRepository::class)]
class ClientArcade
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $Nazwa_klienta = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Data = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Godzina = null;

    #[ORM\Column]
    private ?bool $Rezerwacja = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Rodzaj_automatu_do_gry = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwaKlienta(): ?string
    {
        return $this->Nazwa_klienta;
    }

    public function setNazwaKlienta(string $Nazwa_klienta): self
    {
        $this->Nazwa_klienta = $Nazwa_klienta;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->Data;
    }

    public function setData(\DateTimeInterface $Data): self
    {
        $this->Data = $Data;

        return $this;
    }

    public function getGodzina(): ?\DateTimeInterface
    {
        return $this->Godzina;
    }

    public function setGodzina(\DateTimeInterface $Godzina): self
    {
        $this->Godzina = $Godzina;

        return $this;
    }

    public function isRezerwacja(): ?bool
    {
        return $this->Rezerwacja;
    }

    public function setRezerwacja(bool $Rezerwacja): self
    {
        $this->Rezerwacja = $Rezerwacja;

        return $this;
    }

    public function getRodzajAutomatuDoGry(): ?string
    {
        return $this->Rodzaj_automatu_do_gry;
    }

    public function setRodzajAutomatuDoGry(?string $Rodzaj_automatu_do_gry): self
    {
        $this->Rodzaj_automatu_do_gry = $Rodzaj_automatu_do_gry;

        return $this;
    }
}
