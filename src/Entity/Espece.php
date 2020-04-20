<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Espece
 *
 * @ORM\Table(name="espece")
 * @ORM\Entity
 */
class Espece
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEspece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idespece;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $nom = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="genre", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $genre = 'NULL';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Prelevement", mappedBy="especeIdespece")
     */
    private $prelevementIdprelevement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prelevementIdprelevement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdespece(): ?int
    {
        return $this->idespece;
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

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection|Prelevement[]
     */
    public function getPrelevementIdprelevement(): Collection
    {
        return $this->prelevementIdprelevement;
    }

    public function addPrelevementIdprelevement(Prelevement $prelevementIdprelevement): self
    {
        if (!$this->prelevementIdprelevement->contains($prelevementIdprelevement)) {
            $this->prelevementIdprelevement[] = $prelevementIdprelevement;
            $prelevementIdprelevement->addEspeceIdespece($this);
        }

        return $this;
    }

    public function removePrelevementIdprelevement(Prelevement $prelevementIdprelevement): self
    {
        if ($this->prelevementIdprelevement->contains($prelevementIdprelevement)) {
            $this->prelevementIdprelevement->removeElement($prelevementIdprelevement);
            $prelevementIdprelevement->removeEspeceIdespece($this);
        }

        return $this;
    }

}
