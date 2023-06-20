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

    #[ORM\OneToMany(mappedBy: 'fk_curso', targetEntity: Alumnoscursos::class)]
    private Collection $alumnoscursos;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 255)]
    private ?string $imagen = null;
    public function __toString()
    {
        return $this->titulo;
    }
    public function __construct()
    {
        $this->alumnoscursos = new ArrayCollection();
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
     * @return Collection<int, Alumnoscursos>
     */
    public function getAlumnoscursos(): Collection
    {
        return $this->alumnoscursos;
    }

    public function addAlumnoscurso(Alumnoscursos $alumnoscurso): static
    {
        if (!$this->alumnoscursos->contains($alumnoscurso)) {
            $this->alumnoscursos->add($alumnoscurso);
            $alumnoscurso->setFkCurso($this);
        }

        return $this;
    }

    public function removeAlumnoscurso(Alumnoscursos $alumnoscurso): static
    {
        if ($this->alumnoscursos->removeElement($alumnoscurso)) {
            // set the owning side to null (unless already changed)
            if ($alumnoscurso->getFkCurso() === $this) {
                $alumnoscurso->setFkCurso(null);
            }
        }

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImagen(): ?string
    {
       
        return $this->imagen;
    }

    public function setImagen(string $imagen): static
    {
        $this->imagen = $imagen;

        return $this;
    }
}
