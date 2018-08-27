<?php
declare(strict_types=1);
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20,  unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255,  unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank(groups={"registration"})
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", options={"default" : true})
     */
    private $is_active;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Regex("/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $country;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Interview", inversedBy="users_completed")
     */
    private $quizzes_completed;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
        $this->is_active = true;
        $this->quizzes_completed = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles()
    {

        return $this->roles;
    }
    public function eraseCredentials()
    {
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(?string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(?string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Interview[]
     */
    public function getQuizzesCompleted(): Collection
    {
        return $this->quizzes_completed;
    }

    public function addQuizzesCompleted(Interview $quizzesCompleted): self
    {
        if (!$this->quizzes_completed->contains($quizzesCompleted)) {
            $this->quizzes_completed[] = $quizzesCompleted;
        }

        return $this;
    }

    public function removeQuizzesCompleted(Interview $quizzesCompleted): self
    {
        if ($this->quizzes_completed->contains($quizzesCompleted)) {
            $this->quizzes_completed->removeElement($quizzesCompleted);
        }

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function updateScore(int $result): self
    {
        $this->score += $result;

        return $this;
    }

}
