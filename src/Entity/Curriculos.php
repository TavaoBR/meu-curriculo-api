<?php

namespace App\Entity;

use App\Repository\CurriculosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurriculosRepository::class)]
class Curriculos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'curriculos')]
    private ?Usuarios $UsuarioId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomeCompleto = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $AreaAtuacao = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Estado = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Cidade = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Country = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $DataNascimento = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Telefone = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $Genero = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $EstadoCivil = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Experiencias>
     */
    #[ORM\OneToMany(targetEntity: Experiencias::class, mappedBy: 'CurriculoId')]
    private Collection $experiencias;

    /**
     * @var Collection<int, FormacoesAcademicas>
     */
    #[ORM\OneToMany(targetEntity: FormacoesAcademicas::class, mappedBy: 'CurriculoId')]
    private Collection $formacoesAcademicas;

    /**
     * @var Collection<int, Habilidades>
     */
    #[ORM\OneToMany(targetEntity: Habilidades::class, mappedBy: 'CurriculoId')]
    private Collection $habilidades;

    /**
     * @var Collection<int, Idiomas>
     */
    #[ORM\OneToMany(targetEntity: Idiomas::class, mappedBy: 'CurriculoId')]
    private Collection $idiomas;

    /**
     * @var Collection<int, Links>
     */
    #[ORM\OneToMany(targetEntity: Links::class, mappedBy: 'CurriculoId')]
    private Collection $links;

    /**
     * @var Collection<int, Certificacoes>
     */
    #[ORM\OneToMany(targetEntity: Certificacoes::class, mappedBy: 'CurriculoId')]
    private Collection $certificacoes;

    /**
     * @var Collection<int, Resumos>
     */
    #[ORM\OneToMany(targetEntity: Resumos::class, mappedBy: 'CurriculId')]
    private Collection $resumos;

    /**
     * @var Collection<int, Projetos>
     */
    #[ORM\OneToMany(targetEntity: Projetos::class, mappedBy: 'CurriculoId')]
    private Collection $projetos;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Titulo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PublicToken = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Padrao = null;

    public function __construct()
    {
        $this->experiencias = new ArrayCollection();
        $this->formacoesAcademicas = new ArrayCollection();
        $this->habilidades = new ArrayCollection();
        $this->idiomas = new ArrayCollection();
        $this->links = new ArrayCollection();
        $this->certificacoes = new ArrayCollection();
        $this->resumos = new ArrayCollection();
        $this->projetos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuarioId(): ?Usuarios
    {
        return $this->UsuarioId;
    }

    public function setUsuarioId(?Usuarios $UsuarioId): static
    {
        $this->UsuarioId = $UsuarioId;

        return $this;
    }

    public function getNomeCompleto(): ?string
    {
        return $this->NomeCompleto;
    }

    public function setNomeCompleto(?string $NomeCompleto): static
    {
        $this->NomeCompleto = $NomeCompleto;

        return $this;
    }

    public function getAreaAtuacao(): ?string
    {
        return $this->AreaAtuacao;
    }

    public function setAreaAtuacao(?string $AreaAtuacao): static
    {
        $this->AreaAtuacao = $AreaAtuacao;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->Estado;
    }

    public function setEstado(?string $Estado): static
    {
        $this->Estado = $Estado;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->Cidade;
    }

    public function setCidade(?string $Cidade): static
    {
        $this->Cidade = $Cidade;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(?string $Country): static
    {
        $this->Country = $Country;

        return $this;
    }

    public function getDataNascimento(): ?\DateTime
    {
        return $this->DataNascimento;
    }

    public function setDataNascimento(?\DateTime $DataNascimento): static
    {
        $this->DataNascimento = $DataNascimento;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->Telefone;
    }

    public function setTelefone(?string $Telefone): static
    {
        $this->Telefone = $Telefone;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->Genero;
    }

    public function setGenero(?string $Genero): static
    {
        $this->Genero = $Genero;

        return $this;
    }

    public function getEstadoCivil(): ?string
    {
        return $this->EstadoCivil;
    }

    public function setEstadoCivil(?string $EstadoCivil): static
    {
        $this->EstadoCivil = $EstadoCivil;

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
     * @return Collection<int, Experiencias>
     */
    public function getExperiencias(): Collection
    {
        return $this->experiencias;
    }

    public function addExperiencia(Experiencias $experiencia): static
    {
        if (!$this->experiencias->contains($experiencia)) {
            $this->experiencias->add($experiencia);
            $experiencia->setCurriculoId($this);
        }

        return $this;
    }

    public function removeExperiencia(Experiencias $experiencia): static
    {
        if ($this->experiencias->removeElement($experiencia)) {
            // set the owning side to null (unless already changed)
            if ($experiencia->getCurriculoId() === $this) {
                $experiencia->setCurriculoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FormacoesAcademicas>
     */
    public function getFormacoesAcademicas(): Collection
    {
        return $this->formacoesAcademicas;
    }

    public function addFormacoesAcademica(FormacoesAcademicas $formacoesAcademica): static
    {
        if (!$this->formacoesAcademicas->contains($formacoesAcademica)) {
            $this->formacoesAcademicas->add($formacoesAcademica);
            $formacoesAcademica->setCurriculoId($this);
        }

        return $this;
    }

    public function removeFormacoesAcademica(FormacoesAcademicas $formacoesAcademica): static
    {
        if ($this->formacoesAcademicas->removeElement($formacoesAcademica)) {
            // set the owning side to null (unless already changed)
            if ($formacoesAcademica->getCurriculoId() === $this) {
                $formacoesAcademica->setCurriculoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Habilidades>
     */
    public function getHabilidades(): Collection
    {
        return $this->habilidades;
    }

    public function addHabilidade(Habilidades $habilidade): static
    {
        if (!$this->habilidades->contains($habilidade)) {
            $this->habilidades->add($habilidade);
            $habilidade->setCurriculoId($this);
        }

        return $this;
    }

    public function removeHabilidade(Habilidades $habilidade): static
    {
        if ($this->habilidades->removeElement($habilidade)) {
            // set the owning side to null (unless already changed)
            if ($habilidade->getCurriculoId() === $this) {
                $habilidade->setCurriculoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Idiomas>
     */
    public function getIdiomas(): Collection
    {
        return $this->idiomas;
    }

    public function addIdioma(Idiomas $idioma): static
    {
        if (!$this->idiomas->contains($idioma)) {
            $this->idiomas->add($idioma);
            $idioma->setCurriculoId($this);
        }

        return $this;
    }

    public function removeIdioma(Idiomas $idioma): static
    {
        if ($this->idiomas->removeElement($idioma)) {
            // set the owning side to null (unless already changed)
            if ($idioma->getCurriculoId() === $this) {
                $idioma->setCurriculoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Links>
     */
    public function getLinks(): Collection
    {
        return $this->links;
    }

    public function addLink(Links $link): static
    {
        if (!$this->links->contains($link)) {
            $this->links->add($link);
            $link->setCurriculoId($this);
        }

        return $this;
    }

    public function removeLink(Links $link): static
    {
        if ($this->links->removeElement($link)) {
            // set the owning side to null (unless already changed)
            if ($link->getCurriculoId() === $this) {
                $link->setCurriculoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Certificacoes>
     */
    public function getCertificacoes(): Collection
    {
        return $this->certificacoes;
    }

    public function addCertificaco(Certificacoes $certificaco): static
    {
        if (!$this->certificacoes->contains($certificaco)) {
            $this->certificacoes->add($certificaco);
            $certificaco->setCurriculoId($this);
        }

        return $this;
    }

    public function removeCertificaco(Certificacoes $certificaco): static
    {
        if ($this->certificacoes->removeElement($certificaco)) {
            // set the owning side to null (unless already changed)
            if ($certificaco->getCurriculoId() === $this) {
                $certificaco->setCurriculoId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Resumos>
     */
    public function getResumos(): Collection
    {
        return $this->resumos;
    }

    public function addResumo(Resumos $resumo): static
    {
        if (!$this->resumos->contains($resumo)) {
            $this->resumos->add($resumo);
            $resumo->setCurriculId($this);
        }

        return $this;
    }

    public function removeResumo(Resumos $resumo): static
    {
        if ($this->resumos->removeElement($resumo)) {
            // set the owning side to null (unless already changed)
            if ($resumo->getCurriculId() === $this) {
                $resumo->setCurriculId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Projetos>
     */
    public function getProjetos(): Collection
    {
        return $this->projetos;
    }

    public function addProjeto(Projetos $projeto): static
    {
        if (!$this->projetos->contains($projeto)) {
            $this->projetos->add($projeto);
            $projeto->setCurriculoId($this);
        }

        return $this;
    }

    public function removeProjeto(Projetos $projeto): static
    {
        if ($this->projetos->removeElement($projeto)) {
            // set the owning side to null (unless already changed)
            if ($projeto->getCurriculoId() === $this) {
                $projeto->setCurriculoId(null);
            }
        }

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->Titulo;
    }

    public function setTitulo(?string $Titulo): static
    {
        $this->Titulo = $Titulo;

        return $this;
    }

    public function getPublicToken(): ?string
    {
        return $this->PublicToken;
    }

    public function setPublicToken(?string $PublicToken): static
    {
        $this->PublicToken = $PublicToken;

        return $this;
    }

    public function isPadrao(): ?bool
    {
        return $this->Padrao;
    }

    public function setPadrao(?bool $Padrao): static
    {
        $this->Padrao = $Padrao;

        return $this;
    }
}
