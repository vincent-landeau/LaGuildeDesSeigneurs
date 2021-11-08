<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
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
     * @ORM\Column(type="string")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $mirian;


    /**
     * @ORM\Column(type="datetime")
     */
    private $creation;


    /**
     * @ORM\Column(type="datetime")
     */
    private $modification;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getMirian(): int
    {
        return $this->mirian;
    }

    /**
     * @param int $mirian
     */
    public function setMirian(int $mirian): self
    {
        $this->mirian = $mirian;

        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getCreation(): ?DateTime
    {
        return $this->creation;
    }

    /**
     * @param DateTime $creation
     */
    public function setCreation(DateTime $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getModification(): ?DateTime
    {
        return $this->modification;
    }

    /**
     * @param DateTime $modification
     */
    public function setModification(DateTime $modification): self
    {
        $this->modification = $modification;

        return $this;
    }



}