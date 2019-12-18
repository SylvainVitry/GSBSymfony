<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaladieRepository")
 */
class Maladie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Testeur", mappedBy="maladie")
     */
    private $testeurs;

    public function __construct()
    {
        $this->testeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Testeur[]
     */
    public function getTesteurs(): Collection
    {
        return $this->testeurs;
    }

    public function addTesteur(Testeur $testeur): self
    {
        if (!$this->testeurs->contains($testeur)) {
            $this->testeurs[] = $testeur;
            $testeur->setMaladie($this);
        }

        return $this;
    }

    public function removeTesteur(Testeur $testeur): self
    {
        if ($this->testeurs->contains($testeur)) {
            $this->testeurs->removeElement($testeur);
            // set the owning side to null (unless already changed)
            if ($testeur->getMaladie() === $this) {
                $testeur->setMaladie(null);
            }
        }

        return $this;
    }
}
