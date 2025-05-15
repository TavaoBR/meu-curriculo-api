<?php

namespace App\Entity;

use App\Repository\ExperienciasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienciasRepository::class)]
class Experiencias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'experiencias')]
    private ?Curriculos $CurriculoId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Cargo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Empresa = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $Inicio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $fim = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Atual = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Descricao = null;

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

    public function getCargo(): ?string
    {
        return $this->Cargo;
    }

    public function setCargo(?string $Cargo): static
    {
        $this->Cargo = $Cargo;

        return $this;
    }

    public function getEmpresa(): ?string
    {
        return $this->Empresa;
    }

    public function setEmpresa(?string $Empresa): static
    {
        $this->Empresa = $Empresa;

        return $this;
    }

    public function getInicio(): ?\DateTime
    {
        return $this->Inicio;
    }

    public function setInicio(?\DateTime $Inicio): static
    {
        $this->Inicio = $Inicio;

        return $this;
    }

    public function getFim(): ?\DateTime
    {
        return $this->fim;
    }

    public function setFim(?\DateTime $fim): static
    {
        $this->fim = $fim;

        return $this;
    }

    public function isAtual(): ?bool
    {
        return $this->Atual;
    }

    public function setAtual(?bool $Atual): static
    {
        $this->Atual = $Atual;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->Descricao;
    }

    public function setDescricao(?string $Descricao): static
    {
        $this->Descricao = $Descricao;

        return $this;
    }
}
