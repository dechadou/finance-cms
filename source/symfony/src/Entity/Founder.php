<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FounderRepository")
 */
class Founder
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genero;

    /**
     * @ORM\Column(type="boolean")
     */
    private $PHD;

    /**
     * @ORM\Column(type="boolean")
     */
    private $CONICET;


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

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getPHD(): ?bool
    {
        return $this->PHD;
    }

    public function setPHD(bool $PHD): self
    {
        $this->PHD = $PHD;

        return $this;
    }

    public function getCONICET(): ?bool
    {
        return $this->CONICET;
    }

    public function setCONICET(bool $CONICET): self
    {
        $this->CONICET = $CONICET;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }
}
