<?php

namespace App\Entity;

use App\Enum\IdiomasEnum;
use App\Repository\IdiomasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IdiomasRepository::class)]
class Idiomas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'idiomas')]
    private ?Curriculos $CurriculoId = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Idioma = null;

    #[ORM\Column(nullable: true, enumType: IdiomasEnum::class)]
    private ?IdiomasEnum $Nivel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurriculoId(): ?Curriculos
    {
        return $this->CurriculoId;
    }

    public function setCurriculoId(?Curriculos $CurriculoId): static
    {
        $this->CurriculoId = $CurriculoId;

        return $this;
    }

    public function getIdioma(): ?string
    {
        return $this->Idioma;
    }

    public function setIdioma(?string $Idioma): static
    {
        $this->Idioma = $Idioma;

        return $this;
    }

    public function getNivel(): ?IdiomasEnum
    {
        return $this->Nivel;
    }

    public function setNivel(?IdiomasEnum $Nivel): static
    {
        $this->Nivel = $Nivel;

        return $this;
    }
}
