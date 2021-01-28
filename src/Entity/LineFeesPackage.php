<?php

namespace App\Entity;

use App\Repository\LineFeesPackageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LineFeesPackageRepository::class)
 */
class LineFeesPackage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lineFeesPackages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userFk;

    /**
     * @ORM\ManyToOne(targetEntity=Month::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $month;

    /**
     * @ORM\ManyToOne(targetEntity=PackageFees::class, inversedBy="lineFeesPackages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PackageFees;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserFk(): ?User
    {
        return $this->userFk;
    }

    public function setUserFk(?User $userFk): self
    {
        $this->userFk = $userFk;

        return $this;
    }

    public function getMonth(): ?Month
    {
        return $this->month;
    }

    public function setMonth(?Month $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getPackageFees(): ?PackageFees
    {
        return $this->PackageFees;
    }

    public function setPackageFees(?PackageFees $PackageFees): self
    {
        $this->PackageFees = $PackageFees;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
