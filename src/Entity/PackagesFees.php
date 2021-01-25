<?php

namespace App\Entity;

use App\Repository\PackagesFeesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PackagesFeesRepository::class)
 */
class PackagesFees
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="packagesFees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userfk;

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

    public function getUserfk(): ?User
    {
        return $this->userfk;
    }

    public function setUserfk(?User $userfk): self
    {
        $this->userfk = $userfk;

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
