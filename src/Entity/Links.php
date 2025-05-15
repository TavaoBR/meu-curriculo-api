<?php

namespace App\Entity;

use App\Enum\TipoLinksEnum;
use App\Repository\LinksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LinksRepository::class)]
class Links
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'links')]
    private ?Curriculos $CurriculoId = null;

    #[ORM\Column(nullable: true, enumType: TipoLinksEnum::class)]
    private ?TipoLinksEnum $Tipo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $url = null;

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

    public function getTipo(): ?TipoLinksEnum
    {
        return $this->Tipo;
    }

    public function setTipo(?TipoLinksEnum $Tipo): static
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }
}
