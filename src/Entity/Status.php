<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="statu")
     */
    private $ProjectsList;

    public function __construct()
    {
        $this->ProjectsList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjectsList(): Collection
    {
        return $this->ProjectsList;
    }

    public function addProject(Project $project): self
    {
        if (!$this->ProjectsList->contains($project)) {
            $this->ProjectsList[] = $project;
            $project->setStatu($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->ProjectsList->contains($project)) {
            $this->ProjectsList->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getStatu() === $this) {
                $project->setStatu(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
