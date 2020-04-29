<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InversorRepository")
 */
class Inversor
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $porcentaje_participacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getPorcentajeParticipacion(): ?string
    {
        return $this->porcentaje_participacion;
    }

    public function setPorcentajeParticipacion(string $porcentaje_participacion): self
    {
        $this->porcentaje_participacion = $porcentaje_participacion;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function __toString()
    {
       return (string) $this->getName();
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'logo' => $this->getLogo(),
            'porcentaje_participacion' => $this->getPorcentajeParticipacion(),
            'website' => $this->getWebsite()
        ];
    }
}
