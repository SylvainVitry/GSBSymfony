<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, minMessage="Le nom du produit doit être supérieur à 5 caractères")
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(min=5, max=1000, 
     *  minMessage="Le prix doit être supérieur à 5€",
     *  maxMessage="Le prix doit être inférieur à 1000€"
     * )
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remarques;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategorieProduit", inversedBy="produits")
     */
    private $categorieProduit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TestClinique", mappedBy="produit")
     */
    private $testClinique;

    public function __construct()
    {
        $this->testClinique = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getRemarques(): ?string
    {
        return $this->remarques;
    }

    public function setRemarques(string $remarques): self
    {
        $this->remarques = $remarques;

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

    public function getCategorieProduit(): ?CategorieProduit
    {
        return $this->categorieProduit;
    }

    public function setCategorieProduit(?CategorieProduit $categorieProduit): self
    {
        $this->categorieProduit = $categorieProduit;

        return $this;
    }

    /**
     * @return Collection|TestClinique[]
     */
    public function getTestClinique(): Collection
    {
        return $this->testClinique;
    }

    public function addTestClinique(TestClinique $testClinique): self
    {
        if (!$this->testClinique->contains($testClinique)) {
            $this->testClinique[] = $testClinique;
            $testClinique->setProduit($this);
        }

        return $this;
    }

    public function removeTestClinique(TestClinique $testClinique): self
    {
        if ($this->testClinique->contains($testClinique)) {
            $this->testClinique->removeElement($testClinique);
            // set the owning side to null (unless already changed)
            if ($testClinique->getProduit() === $this) {
                $testClinique->setProduit(null);
            }
        }

        return $this;
    }
}
