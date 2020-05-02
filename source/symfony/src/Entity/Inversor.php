<?php

namespace App\Entity;

use App\Traits\CreatedAndUpdatedAt;
use App\Traits\CreatedAndUpdatedBy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Media", fetch="EAGER")
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id", nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InversorStartup", mappedBy="inversor")
     */
    private $inversorStartups;


    public function __construct()
    {
        $this->startup = new ArrayCollection();
        $this->inversorStartups = new ArrayCollection();
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
            'website' => $this->getWebsite()
        ];
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
            $inversorStartup->setInversor($this);
        }

        return $this;
    }

    public function removeInversorStartup(InversorStartup $inversorStartup): self
    {
        if ($this->inversorStartups->contains($inversorStartup)) {
            $this->inversorStartups->removeElement($inversorStartup);
            // set the owning side to null (unless already changed)
            if ($inversorStartup->getInversor() === $this) {
                $inversorStartup->setInversor(null);
            }
        }

        return $this;
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
