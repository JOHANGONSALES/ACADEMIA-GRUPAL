<?php

namespace App\Entity;

use App\Repository\CursosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosRepository::class)]
class Cursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\Column]
    private ?bool $estado = null;

    #[ORM\OneToMany(mappedBy: 'fk_cursos', targetEntity: Alumnoscruso::class)]
    private Collection $Cursos;

    public function __construct()
    {
        $this->Cursos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function isEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection<int, Alumnoscruso>
     */
    public function getCursos(): Collection
    {
        return $this->Cursos;
    }

    public function addCurso(Alumnoscruso $curso): static
    {
        if (!$this->Cursos->contains($curso)) {
            $this->Cursos->add($curso);
            $curso->setFkCursos($this);
        }

        return $this;
    }

    public function removeCurso(Alumnoscruso $curso): static
    {
        if ($this->Cursos->removeElement($curso)) {
            // set the owning side to null (unless already changed)
            if ($curso->getFkCursos() === $this) {
                $curso->setFkCursos(null);
            }
        }

        return $this;
    }
}
