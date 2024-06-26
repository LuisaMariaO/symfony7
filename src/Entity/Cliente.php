<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   

    #[ORM\Column(length: 100)]
    private ?string $nombres = null;

    #[ORM\Column(length: 100)]
    private ?string $apellidos = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $razonSocial = null;

    #[ORM\Column]
    private ?int $idMunicipio = null;

    #[ORM\Column]
    private ?int $idDepartamento = null;

    #[ORM\OneToMany(targetEntity: Cuenta::class, mappedBy: 'cliente', orphanRemoval: true)]
    private Collection $cuentas;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipoId $tipoId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Municipio $municipio = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Departamento $departamento = null;

    #[ORM\OneToMany(targetEntity: Transaccion::class, mappedBy: 'cliente', orphanRemoval: true)]
    private Collection $transacciones;

    public function __construct()
    {
        $this->cuentas = new ArrayCollection();
        $this->transacciones = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): static
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): static
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getRazonSocial(): ?string
    {
        return $this->razonSocial;
    }

    public function setRazonSocial(?string $razonSocial): static
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    public function getIdMunicipio(): ?int
    {
        return $this->idMunicipio;
    }

    public function setIdMunicipio(int $idMunicipio): static
    {
        $this->idMunicipio = $idMunicipio;

        return $this;
    }

    public function getIdDepartamento(): ?int
    {
        return $this->idDepartamento;
    }

    public function setIdDepartamento(int $idDepartamento): static
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * @return Collection<int, Cuenta>
     */
    public function getCuentas(): Collection
    {
        return $this->cuentas;
    }

    public function addCuenta(Cuenta $cuenta): static
    {
        if (!$this->cuentas->contains($cuenta)) {
            $this->cuentas->add($cuenta);
            $cuenta->setCliente($this);
        }

        return $this;
    }

    public function removeCuenta(Cuenta $cuenta): static
    {
        if ($this->cuentas->removeElement($cuenta)) {
            // set the owning side to null (unless already changed)
            if ($cuenta->getCliente() === $this) {
                $cuenta->setCliente(null);
            }
        }

        return $this;
    }

    public function getTipoId(): ?TipoId
    {
        return $this->tipoId;
    }

    public function setTipoId(?TipoId $tipoId): static
    {
        $this->tipoId = $tipoId;

        return $this;
    }

    public function getMunicipio(): ?Municipio
    {
        return $this->municipio;
    }

    public function setMunicipio(?Municipio $municipio): static
    {
        $this->municipio = $municipio;

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

    /**
     * @return Collection<int, Transaccion>
     */
    public function getTransacciones(): Collection
    {
        return $this->transacciones;
    }

    public function addTransaccione(Transaccion $transaccione): static
    {
        if (!$this->transacciones->contains($transaccione)) {
            $this->transacciones->add($transaccione);
            $transaccione->setCliente($this);
        }

        return $this;
    }

    public function removeTransaccione(Transaccion $transaccione): static
    {
        if ($this->transacciones->removeElement($transaccione)) {
            // set the owning side to null (unless already changed)
            if ($transaccione->getCliente() === $this) {
                $transaccione->setCliente(null);
            }
        }

        return $this;
    }
}
