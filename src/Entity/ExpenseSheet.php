<?php

namespace App\Entity;

use App\Repository\ExpenseSheetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExpenseSheetRepository::class)
 */
class ExpenseSheet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="expenseSheets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userFk;

    /**
     * @ORM\ManyToOne(targetEntity=Month::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $month;

    /**
     * @ORM\ManyToOne(targetEntity=State::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numbersWarrant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $validatedAmounts;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modificationDate;

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

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getNumbersWarrant(): ?string
    {
        return $this->numbersWarrant;
    }

    public function setNumbersWarrant(string $numbersWarrant): self
    {
        $this->numbersWarrant = $numbersWarrant;

        return $this;
    }

    public function getValidatedAmounts(): ?string
    {
        return $this->validatedAmounts;
    }

    public function setValidatedAmounts(string $validatedAmounts): self
    {
        $this->validatedAmounts = $validatedAmounts;

        return $this;
    }

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modificationDate;
    }

    public function setModificationDate(\DateTimeInterface $modificationDate): self
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }
}
