<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 * @ORM\Table(name="players")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="gls_firstname")
     * @Assert\Length (
     *  min = 3,
     *  max = 255,
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, name="gls_lastname")
     * @Assert\Length (
     *  min = 3,
     *  max = 255,
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, name="gls_email")
     * @Assert\Length (
     *  min = 3,
     *  max = 255,
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="integer", name="gls_mirian")
     * @Assert\Length (
     *  min = 1,
     *  max = 16,
     * )
     */
    private $mirian;

    /**
     * @ORM\Column(type="string", length=40, name="gls_identifier")
     * @Assert\Length (
     *  min = 3,
     *  max = 40,
     * )
     */
    private $identifier;

    /**
     * @ORM\Column(type="datetime", name="gls_creation")
     * @Assert\Type("\DateTimeInterface")
     */
    private $creation;

    /**
     * @ORM\Column(type="datetime", name="gls_modification")
     * @Assert\Type("\DateTimeInterface")
     */
    private $modification;

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="player")
     */
    private $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getMirian(): ?int
    {
        return $this->mirian;
    }

    public function setMirian(int $mirian): self
    {
        $this->mirian = $mirian;

        return $this;
    }

    /**
     * Converts the entity in an array.
     */
    public function toArray()
    {
        dump($this);
        return get_object_vars($this);
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation;
    }

    public function setCreation(\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getModification(): ?\DateTimeInterface
    {
        return $this->modification;
    }

    public function setModification(\DateTimeInterface $modification): self
    {
        $this->modification = $modification;

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setPlayer($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getPlayer() === $this) {
                $character->setPlayer(null);
            }
        }

        return $this;
    }
}
