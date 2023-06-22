<?php

namespace App\Entity;

use App\Repository\AlumnosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnosRepository::class)]
class Alumnos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $primer_apellido = null;

    #[ORM\Column(length: 255)]
    private ?string $segundo_apellido = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_nacimiento = null;

    #[ORM\Column(length: 255)]
    private ?string $domicilio = null;

    #[ORM\Column(length: 255)]
    private ?string $poblacion = null;

    #[ORM\Column]
    private ?int $codigo_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'fk_alumno', targetEntity: Alumnoscursos::class)]
    private Collection $alumnoscursos;
    
    public function __toString()
    {
        return $this->nombre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrimerApellido(): ?string
    {
        return $this->primer_apellido;
    }

    public function setPrimerApellido(string $primer_apellido): static
    {
        $this->primer_apellido = $primer_apellido;

        return $this;
    }

    public function getSegundoApellido(): ?string
    {
        return $this->segundo_apellido;
    }

    public function setSegundoApellido(string $segundo_apellido): static
    {
        $this->segundo_apellido = $segundo_apellido;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fecha_nacimiento): static
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    public function getDomicilio(): ?string
    {
        return $this->domicilio;
    }

    public function setDomicilio(string $domicilio): static
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getPoblacion(): ?string
    {
        return $this->poblacion;
    }

    public function setPoblacion(string $poblacion): static
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    public function getCodigoPostal(): ?int
    {
        return $this->codigo_postal;
    }

    public function setCodigoPostal(int $codigo_postal): static
    {
        $this->codigo_postal = $codigo_postal;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

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
            $alumnoscurso->setFkAlumno($this);
        }

        return $this;
    }

    public function removeAlumnoscurso(Alumnoscursos $alumnoscurso): static
    {
        if ($this->alumnoscursos->removeElement($alumnoscurso)) {
            // set the owning side to null (unless already changed)
            if ($alumnoscurso->getFkAlumno() === $this) {
                $alumnoscurso->setFkAlumno(null);
            }
        }

        return $this;
    }
}
