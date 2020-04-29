<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserProjectLikeRepository")
 */
class UserProjectLike
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userProjectLikes" , cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="userProjectLikes" , cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $projectliked;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProjectliked(): ?Project
    {
        return $this->projectliked;
    }

    public function setProjectliked(?Project $projectliked): self
    {
        $this->projectliked = $projectliked;

        return $this;
    }

    public function __toString()
    {
        return $this->getProjectliked() . $this->getUser();
    }
}
