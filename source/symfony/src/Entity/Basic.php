<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BasicRepository")
 */
class Basic
{
    use CreatedAndUpdatedAt;
    use CreatedAndUpdatedBy;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $batch;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_invertido_gridx;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $invertido_gridx_follow;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $invertido_gridx;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $empleados;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reformas_estatuto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estatuto;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valuacion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $registro_acciones_inicial;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InversorStartup", mappedBy="basic", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $inversorStartups;


    public function __construct()
    {
        $this->inversorStartups = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBatch(): ?int
    {
        return $this->batch;
    }

    public function setBatch(int $batch): self
    {
        $this->batch = $batch;

        return $this;
    }

    public function getTotalInvertidoGridx(): ?float
    {
        return $this->total_invertido_gridx;
    }

    public function setTotalInvertidoGridx(float $total_invertido_gridx): self
    {
        $this->total_invertido_gridx = $total_invertido_gridx;

        return $this;
    }

    public function getInvertidoGridxFollow(): ?float
    {
        return $this->invertido_gridx_follow;
    }

    public function setInvertidoGridxFollow(float $invertido_gridx_follow): self
    {
        $this->invertido_gridx_follow = $invertido_gridx_follow;

        return $this;
    }

    public function getInvertidoGridx(): ?float
    {
        return $this->invertido_gridx;
    }

    public function setInvertidoGridx(float $invertido_gridx): self
    {
        $this->invertido_gridx = $invertido_gridx;

        return $this;
    }

    public function getEmpleados(): ?int
    {
        return $this->empleados;
    }

    public function setEmpleados(?int $empleados): self
    {
        $this->empleados = $empleados;

        return $this;
    }

    public function getReformasEstatuto(): ?string
    {
        return $this->reformas_estatuto;
    }

    public function setReformasEstatuto(?string $reformas_estatuto): self
    {
        $this->reformas_estatuto = $reformas_estatuto;

        return $this;
    }

    public function getEstatuto(): ?string
    {
        return $this->estatuto;
    }

    public function setEstatuto(?string $estatuto): self
    {
        $this->estatuto = $estatuto;

        return $this;
    }

    public function getValuacion(): ?float
    {
        return $this->valuacion;
    }

    public function setValuacion(?float $valuacion): self
    {
        $this->valuacion = $valuacion;

        return $this;
    }

    public function getRegistroAccionesInicial(): ?string
    {
        return $this->registro_acciones_inicial;
    }

    public function setRegistroAccionesInicial(?string $registro_acciones_inicial): self
    {
        $this->registro_acciones_inicial = $registro_acciones_inicial;

        return $this;
    }

    /**
     * @return Collection|InversorStartup[]
     */
    public function getInversorStartups(): Collection
    {
        return $this->inversorStartups;
    }

    public function addInversorStartup(InversorStartup $inversorStartup): self
    {
        if (!$this->inversorStartups->contains($inversorStartup)) {
            $this->inversorStartups[] = $inversorStartup;
            $inversorStartup->setBasic($this);
        }

        return $this;
    }

    public function removeInversorStartup(InversorStartup $inversorStartup): self
    {
        if ($this->inversorStartups->contains($inversorStartup)) {
            $this->inversorStartups->removeElement($inversorStartup);
            // set the owning side to null (unless already changed)
            if ($inversorStartup->getBasic() === $this) {
                $inversorStartup->setBasic(null);
            }
        }

        return $this;
    }
}
