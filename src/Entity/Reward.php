<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RewardRepository")
 */
class Reward
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $Level;

    /**
     * @ORM\Column(type="string", length=1500)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="rewards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getProject() . " reach " . $this->getLevel();
    }

    public function getProject(): ?Project
    {
        return $this->Project;
    }

    public function setProject(?Project $Project): self
    {
        $this->Project = $Project;

        return $this;
    }

    public function getLevel(): ?float
    {
        return $this->Level;
    }

    public function setLevel(float $Level): self
    {
        $this->Level = $Level;

        return $this;
    }

}
