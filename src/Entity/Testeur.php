<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TesteurRepository")
 */
class Testeur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TestClinique", inversedBy="testeurs")
     */
    private $testsClinique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Maladie", inversedBy="testeurs")
     */
    private $maladie;

    public function __construct()
    {
        $this->testsClinique = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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

    /**
     * @return Collection|TestClinique[]
     */
    public function getTestsClinique(): Collection
    {
        return $this->testsClinique;
    }

    public function addTestsClinique(TestClinique $testClinique): self
    {
        if (!$this->testsClinique->contains($testClinique)) {
            $this->testsClinique[] = $testClinique;
        }

        return $this;
    }

    public function removeTestsClinique(TestClinique $testClinique): self
    {
        if ($this->testsClinique->contains($testClinique)) {
            $this->testsClinique->removeElement($testClinique);
        }

        return $this;
    }

    public function getMaladie(): ?Maladie
    {
        return $this->maladie;
    }

    public function setMaladie(?Maladie $maladie): self
    {
        $this->maladie = $maladie;

        return $this;
    }
}
