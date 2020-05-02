<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StartupRepository")
 */
class Startup
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Media", fetch="EAGER")
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id", nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $one_pager;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_constitucion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cierre_ejercicio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fondice;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documento", mappedBy="startup", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $documentos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Status", mappedBy="startup", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Basic", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $basic;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Founder", cascade={"persist"})
     */
    private $founders;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Vertical")
     */
    private $verticales;


    public function __construct()
    {
        $this->documentos = new ArrayCollection();
        $this->status = new ArrayCollection();
        $this->founders = new ArrayCollection();
        $this->verticales = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getOnePager(): ?string
    {
        return $this->one_pager;
    }

    public function setOnePager(?string $one_pager): self
    {
        $this->one_pager = $one_pager;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getFechaConstitucion(): ?\DateTimeInterface
    {
        return $this->fecha_constitucion;
    }

    public function setFechaConstitucion(\DateTimeInterface $fecha_constitucion): self
    {
        $this->fecha_constitucion = $fecha_constitucion;

        return $this;
    }

    public function getCierreEjercicio(): ?string
    {
        return $this->cierre_ejercicio;
    }

    public function setCierreEjercicio(?string $cierre_ejercicio): self
    {
        $this->cierre_ejercicio = $cierre_ejercicio;

        return $this;
    }

    public function getFondice(): ?string
    {
        return $this->fondice;
    }

    public function setFondice(?string $fondice): self
    {
        $this->fondice = $fondice;

        return $this;
    }

    /**
     * @return Collection|Documento[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(Documento $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
            $documento->setStartup($this);
        }

        return $this;
    }

    public function removeDocumento(Documento $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getStartup() === $this) {
                $documento->setStartup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Status[]
     */
    public function getStatus(): Collection
    {
        return $this->status;
    }

    public function addStatus(Status $status): self
    {
        if (!$this->status->contains($status)) {
            $this->status[] = $status;
            $status->setStartup($this);
        }

        return $this;
    }

    public function removeStatus(Status $status): self
    {
        if ($this->status->contains($status)) {
            $this->status->removeElement($status);
            // set the owning side to null (unless already changed)
            if ($status->getStartup() === $this) {
                $status->setStartup(null);
            }
        }

        return $this;
    }

    public function getBasic(): ?Basic
    {
        return $this->basic;
    }

    public function setBasic(Basic $basic): self
    {
        $this->basic = $basic;

        return $this;
    }

    /**
     * @return Collection|Founder[]
     */
    public function getFounders(): Collection
    {
        return $this->founders;
    }

    public function addFounder(Founder $founder): self
    {
        if (!$this->founders->contains($founder)) {
            $this->founders[] = $founder;
        }

        return $this;
    }

    public function removeFounder(Founder $founder): self
    {
        if ($this->founders->contains($founder)) {
            $this->founders->removeElement($founder);
        }

        return $this;
    }

    /**
     * @return Collection|Vertical[]
     */
    public function getVerticales(): Collection
    {
        return $this->verticales;
    }

    public function addVerticale(Vertical $verticale): self
    {
        if (!$this->verticales->contains($verticale)) {
            $this->verticales[] = $verticale;
        }

        return $this;
    }

    public function removeVerticale(Vertical $verticale): self
    {
        if ($this->verticales->contains($verticale)) {
            $this->verticales->removeElement($verticale);
        }

        return $this;
    }

    public function __toString()
    {
        return (string)$this->getName();
    }

    public function getLogo(): ?Media
    {
        return $this->logo;
    }

    public function setLogo(?Media $logo): self
    {
        $this->logo = $logo;

        return $this;
    }



}
