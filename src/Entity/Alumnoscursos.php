<?php

namespace App\Entity;

use App\Repository\AlumnoscursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnoscursosRepository::class)]
class Alumnoscursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Alumnos $fk_alumno = null;

    #[ORM\ManyToOne]
    private ?Cursos $fk_curso = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkAlumno(): ?Alumnos
    {
        return $this->fk_alumno;
    }

    public function setFkAlumno(?Alumnos $fk_alumno): static
    {
        $this->fk_alumno = $fk_alumno;

        return $this;
    }

    public function getFkCurso(): ?Cursos
    {
        return $this->fk_curso;
    }

    public function setFkCurso(?Cursos $fk_curso): static
    {
        $this->fk_curso = $fk_curso;

        return $this;
    }
}
