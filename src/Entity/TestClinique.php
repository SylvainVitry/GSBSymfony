<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestCliniqueRepository")
 */
class TestClinique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreTesteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomClinique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rueClinique;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $codePostalClinique;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $villeClinique;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomMedecin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="testClinique")
     */
    private $produit;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Testeur", mappedBy="testsClinique")
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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getNombreTesteur(): ?int
    {
        return $this->nombreTesteur;
    }

    public function setNombreTesteur(int $nombreTesteur): self
    {
        $this->nombreTesteur = $nombreTesteur;

        return $this;
    }

    public function getNomClinique(): ?string
    {
        return $this->nomClinique;
    }

    public function setNomClinique(string $nomClinique): self
    {
        $this->nomClinique = $nomClinique;

        return $this;
    }

    public function getRueClinique(): ?string
    {
        return $this->rueClinique;
    }

    public function setRueClinique(string $rueClinique): self
    {
        $this->rueClinique = $rueClinique;

        return $this;
    }

    public function getCodePostalClinique(): ?string
    {
        return $this->codePostalClinique;
    }

    public function setCodePostalClinique(string $codePostalClinique): self
    {
        $this->codePostalClinique = $codePostalClinique;

        return $this;
    }

    public function getVilleClinique(): ?string
    {
        return $this->villeClinique;
    }

    public function setVilleClinique(string $villeClinique): self
    {
        $this->villeClinique = $villeClinique;

        return $this;
    }

    public function getNomMedecin(): ?string
    {
        return $this->nomMedecin;
    }

    public function setNomMedecin(string $nomMedecin): self
    {
        $this->nomMedecin = $nomMedecin;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

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
            $testeur->addTestsClinique($this);
        }

        return $this;
    }

    public function removeTesteur(Testeur $testeur): self
    {
        if ($this->testeurs->contains($testeur)) {
            $this->testeurs->removeElement($testeur);
            $testeur->removeTestsClinique($this);
        }

        return $this;
    }
}
