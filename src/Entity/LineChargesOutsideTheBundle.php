<?php

namespace App\Entity;

use App\Repository\LineChargesOutsideTheBundleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LineChargesOutsideTheBundleRepository::class)
 */
class LineChargesOutsideTheBundle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lineChargesOutsideTheBundles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userFk;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wording;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getWording(): ?string
    {
        return $this->wording;
    }

    public function setWording(string $wording): self
    {
        $this->wording = $wording;

        return $this;
    }
}
