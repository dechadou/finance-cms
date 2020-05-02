<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InversorStartupRepository")
 */
class InversorStartup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $porcentaje_participacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic", inversedBy="inversorStartups")
     */
    private $basic;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Inversor", inversedBy="inversorStartups")
     */
    private $inversor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPorcentajeParticipacion(): ?int
    {
        return $this->porcentaje_participacion;
    }

    public function setPorcentajeParticipacion(int $porcentaje_participacion): self
    {
        $this->porcentaje_participacion = $porcentaje_participacion;

        return $this;
    }


    public function getInversor(): ?Inversor
    {
        return $this->inversor;
    }

    public function setInversor(?Inversor $inversor): self
    {
        $this->inversor = $inversor;

        return $this;
    }

    public function getBasic(): ?Basic
    {
        return $this->basic;
    }

    public function setBasic(?Basic $basic): self
    {
        $this->basic = $basic;

        return $this;
    }
}
