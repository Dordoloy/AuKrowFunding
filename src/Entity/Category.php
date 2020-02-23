<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="categories")
     */
    private $Parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="Parent")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", inversedBy="categories")
     */
    private $Project;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->Project = new ArrayCollection();
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
     * @return Collection|self[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(self $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setParent($this);
        }

        return $this;
    }

    public function removeCategory(self $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getParent() === $this) {
                $category->setParent(null);
            }
        }

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->Parent;
    }

    public function setParent(?self $Parent): self
    {
        $this->Parent = $Parent;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProject(): Collection
    {
        return $this->Project;
    }

    public function addProject(Project $project): self
    {
        if (!$this->Project->contains($project)) {
            $this->Project[] = $project;
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->Project->contains($project)) {
            $this->Project->removeElement($project);
        }

        return $this;
    }
}
