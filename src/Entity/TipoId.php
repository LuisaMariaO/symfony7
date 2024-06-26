<?php

namespace App\Entity;

use App\Repository\TipoIdRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoIdRepository::class)]
class TipoId
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $tipo = null;

    #[ORM\OneToOne(mappedBy: 'tipoId', cascade: ['persist', 'remove'])]
    private ?Cliente $cliente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente): static
    {
        // set the owning side of the relation if necessary
        if ($cliente->getTipoId() !== $this) {
            $cliente->setTipoId($this);
        }

        $this->cliente = $cliente;

        return $this;
    }
}
