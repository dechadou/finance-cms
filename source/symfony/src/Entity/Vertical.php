<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerticalRepository")
 */
class Vertical
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Startup", inversedBy="verticales")
     */
    private $startup;

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

    public function getStartup(): ?Startup
    {
        return $this->startup;
    }

    public function setStartup(?Startup $startup): self
    {
        $this->startup = $startup;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }
}
