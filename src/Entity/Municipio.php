<?php

namespace App\Entity;

use App\Repository\MunicipioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MunicipioRepository::class)]
class Municipio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_departamento = null;

    #[ORM\Column(length: 150)]
    private ?string $nombre = null;

    #[ORM\ManyToOne(inversedBy: 'municipio')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Departamento $departamento = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDepartamento(): ?int
    {
        return $this->id_departamento;
    }

    public function setIdDepartamento(int $id_departamento): static
    {
        $this->id_departamento = $id_departamento;

        return $this;
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

    public function getDepartamento(): ?Departamento
    {
        return $this->departamento;
    }

    public function setDepartamento(?Departamento $departamento): static
    {
        $this->departamento = $departamento;

        return $this;
    }
}
