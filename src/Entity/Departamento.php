<?php

namespace App\Entity;

use App\Repository\DepartamentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartamentoRepository::class)]
class Departamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\OneToMany(targetEntity: Municipio::class, mappedBy: 'departamento')]
    private Collection $municipio;

    public function __construct()
    {
        $this->municipio = new ArrayCollection();
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

    /**
     * @return Collection<int, Municipio>
     */
    public function getMunicipio(): Collection
    {
        return $this->municipio;
    }

    public function addMunicipio(Municipio $municipio): static
    {
        if (!$this->municipio->contains($municipio)) {
            $this->municipio->add($municipio);
            $municipio->setDepartamento($this);
        }

        return $this;
    }

    public function removeMunicipio(Municipio $municipio): static
    {
        if ($this->municipio->removeElement($municipio)) {
            // set the owning side to null (unless already changed)
            if ($municipio->getDepartamento() === $this) {
                $municipio->setDepartamento(null);
            }
        }

        return $this;
    }
}
