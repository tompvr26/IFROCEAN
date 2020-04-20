<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Plage
 *
 * @ORM\Table(name="plage", indexes={@ORM\Index(name="fk_Plage_Ville_idx", columns={"Ville_idVille"}), @ORM\Index(name="fk_Plage_prelevement1_idx", columns={"prelevement_idprelevement"})})
 * @ORM\Entity
 */
class Plage
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPlage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idplage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $nom = 'NULL';

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ville_idVille", referencedColumnName="idVille")
     * })
     */
    private $villeIdville;

    /**
     * @var \Prelevement
     *
     * @ORM\ManyToOne(targetEntity="Prelevement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prelevement_idprelevement", referencedColumnName="idprelevement")
     * })
     */
    private $prelevementIdprelevement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Etude", mappedBy="plageIdplage")
     */
    private $etudeIdetude;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudeIdetude = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdplage(): ?int
    {
        return $this->idplage;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVilleIdville(): ?Ville
    {
        return $this->villeIdville;
    }

    public function setVilleIdville(?Ville $villeIdville): self
    {
        $this->villeIdville = $villeIdville;

        return $this;
    }

    public function getPrelevementIdprelevement(): ?Prelevement
    {
        return $this->prelevementIdprelevement;
    }

    public function setPrelevementIdprelevement(?Prelevement $prelevementIdprelevement): self
    {
        $this->prelevementIdprelevement = $prelevementIdprelevement;

        return $this;
    }

    /**
     * @return Collection|Etude[]
     */
    public function getEtudeIdetude(): Collection
    {
        return $this->etudeIdetude;
    }

    public function addEtudeIdetude(Etude $etudeIdetude): self
    {
        if (!$this->etudeIdetude->contains($etudeIdetude)) {
            $this->etudeIdetude[] = $etudeIdetude;
            $etudeIdetude->addPlageIdplage($this);
        }

        return $this;
    }

    public function removeEtudeIdetude(Etude $etudeIdetude): self
    {
        if ($this->etudeIdetude->contains($etudeIdetude)) {
            $this->etudeIdetude->removeElement($etudeIdetude);
            $etudeIdetude->removePlageIdplage($this);
        }

        return $this;
    }

}
