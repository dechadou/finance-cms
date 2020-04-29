<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    use CreatedAndUpdatedBy;
    use CreatedAndUpdatedAt;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Startup", inversedBy="status")
     */
    private $startup;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getStartup(): ?Startup
    {
        return $this->startup;
    }

    public function setStartup(?Startup $startup): self
    {
        $this->startup = $startup;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
