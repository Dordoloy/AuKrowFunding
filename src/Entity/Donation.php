<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DonationRepository")
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(columns={"user_id", "project_parent_id", "date_time"})})
 */
class Donation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Amount;

    /**
     * @ORM\Column(type="datetime")
     * @ORM\JoinColumn(nullable=false)
     */
    private $DateTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Donations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="donations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ProjectParent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->Amount;
    }

    public function setAmount(float $Amount): self
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getDateTime(): ?DateTimeInterface
    {
        return $this->DateTime;
    }

    public function setDateTime(DateTimeInterface $DateTime): self
    {
        $this->DateTime = $DateTime;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProjectParent(): ?Project
    {
        return $this->ProjectParent;
    }

    public function setProjectParent(?Project $ProjectParent): self
    {
        $this->ProjectParent = $ProjectParent;

        return $this;
    }

    public function __toString()
    {
        return "";
    }
}
