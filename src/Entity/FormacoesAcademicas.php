<?php

namespace App\Entity;

use App\Enum\NivelEnum;
use App\Repository\FormacoesAcademicasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormacoesAcademicasRepository::class)]
class FormacoesAcademicas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'formacoesAcademicas')]
    private ?Curriculos $CurriculoId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Curso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Instituicao = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $Inicio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $Fim = null;

    #[ORM\Column(nullable: true, enumType: NivelEnum::class)]
    private ?NivelEnum $Nivel = null;

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

    public function getCurso(): ?string
    {
        return $this->Curso;
    }

    public function setCurso(?string $Curso): static
    {
        $this->Curso = $Curso;

        return $this;
    }

    public function getInstituicao(): ?string
    {
        return $this->Instituicao;
    }

    public function setInstituicao(?string $Instituicao): static
    {
        $this->Instituicao = $Instituicao;

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
        return $this->Fim;
    }

    public function setFim(?\DateTime $Fim): static
    {
        $this->Fim = $Fim;

        return $this;
    }

    public function getNivel(): ?NivelEnum
    {
        return $this->Nivel;
    }

    public function setNivel(?NivelEnum $Nivel): static
    {
        $this->Nivel = $Nivel;

        return $this;
    }
}
