<?php

namespace App\Entity;

use App\Repository\CertificacoesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertificacoesRepository::class)]
class Certificacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'certificacoes')]
    private ?Curriculos $CurriculoId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nome = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Instituicao = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $Data = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Descricao = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ArquivoPdf = null;

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

    public function getInstituicao(): ?string
    {
        return $this->Instituicao;
    }

    public function setInstituicao(?string $Instituicao): static
    {
        $this->Instituicao = $Instituicao;

        return $this;
    }

    public function getData(): ?\DateTime
    {
        return $this->Data;
    }

    public function setData(?\DateTime $Data): static
    {
        $this->Data = $Data;

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

    public function getArquivoPdf(): ?string
    {
        return $this->ArquivoPdf;
    }

    public function setArquivoPdf(?string $ArquivoPdf): static
    {
        $this->ArquivoPdf = $ArquivoPdf;

        return $this;
    }
}
