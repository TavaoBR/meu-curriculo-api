<?php

namespace App\Entity;

use App\Enum\HabilidadesEnum;
use App\Repository\HabilidadesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabilidadesRepository::class)]
class Habilidades
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'habilidades')]
    private ?Curriculos $CurriculoId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nome = null;

    #[ORM\Column(nullable: true, enumType: HabilidadesEnum::class)]
    private ?HabilidadesEnum $Nivel = null;

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

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(?string $Nome): static
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getNivel(): ?HabilidadesEnum
    {
        return $this->Nivel;
    }

    public function setNivel(?HabilidadesEnum $Nivel): static
    {
        $this->Nivel = $Nivel;

        return $this;
    }
}
