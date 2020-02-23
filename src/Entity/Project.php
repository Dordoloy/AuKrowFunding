<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
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
    private $Objectif;

    /**
     * @ORM\Column(type="date")
     */
    private $LimitDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $Report;

    /**
     * @ORM\Column(type="integer")
     */
    private $Up;

    /**
     * @ORM\Column(type="integer")
     */
    private $down;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Minature;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subscription", mappedBy="Project", orphanRemoval=true)
     */
    private $subscriptions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", mappedBy="Projects")
     */
    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="Projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Statu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Donation", mappedBy="Project")
     */
    private $donations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="Project", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", mappedBy="Project")
     */
    private $categories;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->donations = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectif(): ?float
    {
        return $this->Objectif;
    }

    public function setObjectif(float $Objectif): self
    {
        $this->Objectif = $Objectif;

        return $this;
    }

    public function getLimitDate(): ?DateTimeInterface
    {
        return $this->LimitDate;
    }

    public function setLimitDate(DateTimeInterface $LimitDate): self
    {
        $this->LimitDate = $LimitDate;

        return $this;
    }

    public function getReport(): ?int
    {
        return $this->Report;
    }

    public function setReport(int $Report): self
    {
        $this->Report = $Report;

        return $this;
    }

    public function getUp(): ?int
    {
        return $this->Up;
    }

    public function setUp(int $Up): self
    {
        $this->Up = $Up;

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getMinature(): ?string
    {
        return $this->Minature;
    }

    public function setMinature(?string $Minature): self
    {
        $this->Minature = $Minature;

        return $this;
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
            $subscription->setProject($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->contains($subscription)) {
            $this->subscriptions->removeElement($subscription);
            // set the owning side to null (unless already changed)
            if ($subscription->getProject() === $this) {
                $subscription->setProject(null);
            }
        }

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

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addProject($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeProject($this);
        }

        return $this;
    }

    public function getStatu(): ?Status
    {
        return $this->Statu;
    }

    public function setStatu(?Status $Statu): self
    {
        $this->Statu = $Statu;

        return $this;
    }

    /**
     * @return Collection|Donation[]
     */
    public function getDonations(): Collection
    {
        return $this->donations;
    }

    public function addDonation(Donation $donation): self
    {
        if (!$this->donations->contains($donation)) {
            $this->donations[] = $donation;
            $donation->setProject($this);
        }

        return $this;
    }

    public function removeDonation(Donation $donation): self
    {
        if ($this->donations->contains($donation)) {
            $this->donations->removeElement($donation);
            // set the owning side to null (unless already changed)
            if ($donation->getProject() === $this) {
                $donation->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setProject($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getProject() === $this) {
                $comment->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addProject($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removeProject($this);
        }

        return $this;
    }
}
