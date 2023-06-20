<?php

namespace App\Entity;

use App\Repository\AlumnoscrusoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnoscrusoRepository::class)]
class Alumnoscruso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Alumnos')]
    private ?Alumnos $fk_alumno = null;

    #[ORM\ManyToOne(inversedBy: 'Cursos')]
    private ?Cursos $fk_cursos = null;

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

    public function getFkCursos(): ?Cursos
    {
        return $this->fk_cursos;
    }

    public function setFkCursos(?Cursos $fk_cursos): static
    {
        $this->fk_cursos = $fk_cursos;

        return $this;
    }
}
