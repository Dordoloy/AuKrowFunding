<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1500)
     */
    private $Message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateTile;

    /**
     * @ORM\Column(type="integer")
     */
    private $up;

    /**
     * @ORM\Column(type="integer")
     */
    private $down;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }

    public function getDateTile(): ?DateTimeInterface
    {
        return $this->DateTile;
    }

    public function setDateTile(DateTimeInterface $DateTile): self
    {
        $this->DateTile = $DateTile;

        return $this;
    }

    public function getUp(): ?int
    {
        return $this->up;
    }

    public function setUp(int $up): self
    {
        $this->up = $up;

        return $this;
    }

    public function getDown(): ?int
    {
        return $this->down;
    }

    public function setDown(int $down): self
    {
        $this->down = $down;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
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
}
