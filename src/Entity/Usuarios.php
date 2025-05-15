<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Senha = null;

    #[ORM\Column(nullable: true)]
    private ?int $Tentativas = null;

    #[ORM\Column(length: 999, nullable: true)]
    private ?string $Token = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Curriculos>
     */
    #[ORM\OneToMany(targetEntity: Curriculos::class, mappedBy: 'UsuarioId')]
    private Collection $curriculos;

    public function __construct()
    {
        $this->curriculos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->Senha;
    }

    public function setSenha(?string $Senha): static
    {
        $this->Senha = $Senha;

        return $this;
    }

    public function getTentativas(): ?int
    {
        return $this->Tentativas;
    }

    public function setTentativas(?int $Tentativas): static
    {
        $this->Tentativas = $Tentativas;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->Token;
    }

    public function setToken(?string $Token): static
    {
        $this->Token = $Token;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Curriculos>
     */
    public function getCurriculos(): Collection
    {
        return $this->curriculos;
    }

    public function addCurriculo(Curriculos $curriculo): static
    {
        if (!$this->curriculos->contains($curriculo)) {
            $this->curriculos->add($curriculo);
            $curriculo->setUsuarioId($this);
        }

        return $this;
    }

    public function removeCurriculo(Curriculos $curriculo): static
    {
        if ($this->curriculos->removeElement($curriculo)) {
            // set the owning side to null (unless already changed)
            if ($curriculo->getUsuarioId() === $this) {
                $curriculo->setUsuarioId(null);
            }
        }

        return $this;
    }
}
