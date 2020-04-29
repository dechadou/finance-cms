<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Type", mappedBy="type")
     */
    private $documentos;

    public function __toString()
    {
        return (string) $this->name;
    }

    public function __construct()
    {
        $this->documentos = new ArrayCollection();
    }

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

    /**
     * @return Collection|Type[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(Type $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
            $documento->setType($this);
        }

        return $this;
    }

    public function removeDocumento(Type $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getType() === $this) {
                $documento->setType(null);
            }
        }

        return $this;
    }
}
