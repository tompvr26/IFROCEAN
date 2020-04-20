<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville", indexes={@ORM\Index(name="fk_Ville_Departement1_idx", columns={"Departement_idDepartement"})})
 * @ORM\Entity
 */
class Ville
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVille", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomVille", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $nomville = 'NULL';

    /**
     * @var \Departement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Departement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Departement_idDepartement", referencedColumnName="idDepartement")
     * })
     */
    private $departementIddepartement;

    public function getIdville(): ?int
    {
        return $this->idville;
    }

    public function getNomville(): ?string
    {
        return $this->nomville;
    }

    public function setNomville(?string $nomville): self
    {
        $this->nomville = $nomville;

        return $this;
    }

    public function getDepartementIddepartement(): ?Departement
    {
        return $this->departementIddepartement;
    }

    public function setDepartementIddepartement(?Departement $departementIddepartement): self
    {
        $this->departementIddepartement = $departementIddepartement;

        return $this;
    }


}
