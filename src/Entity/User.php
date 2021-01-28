<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hireDate;

    /**
     * @ORM\OneToMany(targetEntity=LineFeesPackage::class, mappedBy="userFk", orphanRemoval=true)
     */
    private $lineFeesPackages;

    /**
     * @ORM\OneToMany(targetEntity=LineChargesOutsideTheBundle::class, mappedBy="userFk", orphanRemoval=true)
     */
    private $lineChargesOutsideTheBundles;

    /**
     * @ORM\OneToMany(targetEntity=ExpenseSheet::class, mappedBy="userFk", orphanRemoval=true)
     */
    private $expenseSheets;

    public function __construct()
    {
        $this->lineFeesPackages = new ArrayCollection();
        $this->lineChargesOutsideTheBundles = new ArrayCollection();
        $this->expenseSheets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserName(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getHireDate(): ?string
    {
        return $this->hireDate;
    }

    public function setHireDate(?string $hireDate): self
    {
        $this->hireDate = $hireDate;

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
            $lineFeesPackage->setUserFk($this);
        }

        return $this;
    }

    public function removeLineFeesPackage(LineFeesPackage $lineFeesPackage): self
    {
        if ($this->lineFeesPackages->removeElement($lineFeesPackage)) {
            // set the owning side to null (unless already changed)
            if ($lineFeesPackage->getUserFk() === $this) {
                $lineFeesPackage->setUserFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LineChargesOutsideTheBundle[]
     */
    public function getLineChargesOutsideTheBundles(): Collection
    {
        return $this->lineChargesOutsideTheBundles;
    }

    public function addLineChargesOutsideTheBundle(LineChargesOutsideTheBundle $lineChargesOutsideTheBundle): self
    {
        if (!$this->lineChargesOutsideTheBundles->contains($lineChargesOutsideTheBundle)) {
            $this->lineChargesOutsideTheBundles[] = $lineChargesOutsideTheBundle;
            $lineChargesOutsideTheBundle->setUserFk($this);
        }

        return $this;
    }

    public function removeLineChargesOutsideTheBundle(LineChargesOutsideTheBundle $lineChargesOutsideTheBundle): self
    {
        if ($this->lineChargesOutsideTheBundles->removeElement($lineChargesOutsideTheBundle)) {
            // set the owning side to null (unless already changed)
            if ($lineChargesOutsideTheBundle->getUserFk() === $this) {
                $lineChargesOutsideTheBundle->setUserFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ExpenseSheet[]
     */
    public function getExpenseSheets(): Collection
    {
        return $this->expenseSheets;
    }

    public function addExpenseSheet(ExpenseSheet $expenseSheet): self
    {
        if (!$this->expenseSheets->contains($expenseSheet)) {
            $this->expenseSheets[] = $expenseSheet;
            $expenseSheet->setUserFk($this);
        }

        return $this;
    }

    public function removeExpenseSheet(ExpenseSheet $expenseSheet): self
    {
        if ($this->expenseSheets->removeElement($expenseSheet)) {
            // set the owning side to null (unless already changed)
            if ($expenseSheet->getUserFk() === $this) {
                $expenseSheet->setUserFk(null);
            }
        }

        return $this;
    }

}
