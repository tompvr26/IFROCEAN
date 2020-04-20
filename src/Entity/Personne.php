<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table(name="personne", indexes={@ORM\Index(name="fk_personne_prelevement1_idx", columns={"prelevement_idprelevement"})})
 * @ORM\Entity
 */
class Personne
{
    /**
     * @var int
     *
     * @ORM\Column(name="idpersonne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpersonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $nom = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $prenom = 'NULL';

    /**
     * @var \Prelevement
     *
     * @ORM\ManyToOne(targetEntity="Prelevement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prelevement_idprelevement", referencedColumnName="idprelevement")
     * })
     */
    private $prelevementIdprelevement;

    public function getIdpersonne(): ?int
    {
        return $this->idpersonne;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

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


}
