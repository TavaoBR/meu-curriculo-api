<?php

namespace App\Entity;

use App\Repository\ResumosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumosRepository::class)]
class Resumos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'resumos')]
    private ?Curriculos $CurriculId = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Texto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurriculId(): ?Curriculos
    {
        return $this->CurriculId;
    }

    public function setCurriculId(?Curriculos $CurriculId): static
    {
        $this->CurriculId = $CurriculId;

        return $this;
    }

    public function getTexto(): ?string
    {
        return $this->Texto;
    }

    public function setTexto(?string $Texto): static
    {
        $this->Texto = $Texto;

        return $this;
    }
}
