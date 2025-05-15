<?php

namespace App\Entity;

use App\Repository\ProjetosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetosRepository::class)]
class Projetos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'projetos')]
    private ?Curriculos $CurriculoId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nome = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Descricao = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Link = null;

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

    public function getDescricao(): ?string
    {
        return $this->Descricao;
    }

    public function setDescricao(?string $Descricao): static
    {
        $this->Descricao = $Descricao;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->Link;
    }

    public function setLink(?string $Link): static
    {
        $this->Link = $Link;

        return $this;
    }
}
