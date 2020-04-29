<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoRepository")
 */
class Documento
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="documentos")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Startup", inversedBy="documentos")
     */
    private $startup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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
}
