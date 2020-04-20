<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Etude
 *
 * @ORM\Table(name="etude", indexes={@ORM\Index(name="fk_Etude_personne1_idx", columns={"personne_idpersonne"}), @ORM\Index(name="fk_Etude_prelevement1_idx", columns={"prelevement_idprelevement"})})
 * @ORM\Entity
 */
class Etude
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEtude", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idetude;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $date = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SuperficieEtudier", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $superficieetudier = 'NULL';

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personne_idpersonne", referencedColumnName="idpersonne")
     * })
     */
    private $personneIdpersonne;

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
     * @ORM\ManyToMany(targetEntity="Plage", inversedBy="etudeIdetude")
     * @ORM\JoinTable(name="etude_has_plage",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Etude_idEtude", referencedColumnName="idEtude")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Plage_idPlage", referencedColumnName="idPlage")
     *   }
     * )
     */
    private $plageIdplage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plageIdplage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdetude(): ?int
    {
        return $this->idetude;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSuperficieetudier(): ?string
    {
        return $this->superficieetudier;
    }

    public function setSuperficieetudier(?string $superficieetudier): self
    {
        $this->superficieetudier = $superficieetudier;

        return $this;
    }

    public function getPersonneIdpersonne(): ?Personne
    {
        return $this->personneIdpersonne;
    }

    public function setPersonneIdpersonne(?Personne $personneIdpersonne): self
    {
        $this->personneIdpersonne = $personneIdpersonne;

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
     * @return Collection|Plage[]
     */
    public function getPlageIdplage(): Collection
    {
        return $this->plageIdplage;
    }

    public function addPlageIdplage(Plage $plageIdplage): self
    {
        if (!$this->plageIdplage->contains($plageIdplage)) {
            $this->plageIdplage[] = $plageIdplage;
        }

        return $this;
    }

    public function removePlageIdplage(Plage $plageIdplage): self
    {
        if ($this->plageIdplage->contains($plageIdplage)) {
            $this->plageIdplage->removeElement($plageIdplage);
        }

        return $this;
    }

}
