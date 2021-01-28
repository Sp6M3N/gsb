<?php

namespace App\Entity;

use App\Repository\PackageFeesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PackageFeesRepository::class)
 */
class PackageFees
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wording;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $amount;

    /**
     * @ORM\OneToMany(targetEntity=LineFeesPackage::class, mappedBy="PackageFees", orphanRemoval=true)
     */
    private $lineFeesPackages;

    public function __construct()
    {
        $this->lineFeesPackages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWording(): ?string
    {
        return $this->wording;
    }

    public function setWording(string $wording): self
    {
        $this->wording = $wording;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return Collection|LineFeesPackage[]
     */
    public function getLineFeesPackages(): Collection
    {
        return $this->lineFeesPackages;
    }

    public function addLineFeesPackage(LineFeesPackage $lineFeesPackage): self
    {
        if (!$this->lineFeesPackages->contains($lineFeesPackage)) {
            $this->lineFeesPackages[] = $lineFeesPackage;
            $lineFeesPackage->setPackageFees($this);
        }

        return $this;
    }

    public function removeLineFeesPackage(LineFeesPackage $lineFeesPackage): self
    {
        if ($this->lineFeesPackages->removeElement($lineFeesPackage)) {
            // set the owning side to null (unless already changed)
            if ($lineFeesPackage->getPackageFees() === $this) {
                $lineFeesPackage->setPackageFees(null);
            }
        }

        return $this;
    }
}
