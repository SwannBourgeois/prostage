<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nomLong;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nomCourt;

    /**
     * @ORM\ManyToMany(targetEntity=Stage::class, mappedBy="Formation")
     */
    private $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLong(): ?string
    {
        return $this->nomLong;
    }

    public function setNomLong(string $nomLong): self
    {
        $this->nomLong = $nomLong;

        return $this;
    }

    public function getNomCourt(): ?string
    {
        return $this->nomCourt;
    }

    public function setNomCourt(string $nomCourt): self
    {
        $this->nomCourt = $nomCourt;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Stage $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->addFormation($this);
        }

        return $this;
    }

    public function removeFormation(Stage $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            $formation->removeFormation($this);
        }

        return $this;
    }
}
