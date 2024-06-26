<?php

namespace App\Entity;

use App\Repository\CuentaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuentaRepository::class)]
class Cuenta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;




    #[ORM\Column]
    private ?float $saldo = null;

    #[ORM\ManyToOne(inversedBy: 'cuentas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cliente $cliente = null;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getSaldo(): ?float
    {
        return $this->saldo;
    }

    public function setSaldo(float $saldo): static
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): static
    {
        $this->cliente = $cliente;

        return $this;
    }

}
