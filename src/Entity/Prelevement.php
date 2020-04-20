<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Prelevement
 *
 * @ORM\Table(name="prelevement")
 * @ORM\Entity
 */
class Prelevement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idprelevement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprelevement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PositionGPS", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $positiongps = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $type = 'NULL';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Espece", inversedBy="prelevementIdprelevement")
     * @ORM\JoinTable(name="prelevement_has_espece",
     *   joinColumns={
     *     @ORM\JoinColumn(name="prelevement_idprelevement", referencedColumnName="idprelevement")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Espece_idEspece", referencedColumnName="idEspece")
     *   }
     * )
     */
    private $especeIdespece;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->especeIdespece = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdprelevement(): ?int
    {
        return $this->idprelevement;
    }

    public function getPositiongps(): ?string
    {
        return $this->positiongps;
    }

    public function setPositiongps(?string $positiongps): self
    {
        $this->positiongps = $positiongps;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Espece[]
     */
    public function getEspeceIdespece(): Collection
    {
        return $this->especeIdespece;
    }

    public function addEspeceIdespece(Espece $especeIdespece): self
    {
        if (!$this->especeIdespece->contains($especeIdespece)) {
            $this->especeIdespece[] = $especeIdespece;
        }

        return $this;
    }

    public function removeEspeceIdespece(Espece $especeIdespece): self
    {
        if ($this->especeIdespece->contains($especeIdespece)) {
            $this->especeIdespece->removeElement($especeIdespece);
        }

        return $this;
    }

}
