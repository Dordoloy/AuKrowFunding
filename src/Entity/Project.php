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
    //region --------------- Properties
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="float")
     */
    private $goal;
    /**
     * @ORM\Column(type="date")
     */
    private $limitDate;
    /**
     * @ORM\Column(type="integer")
     */
    private $report;
    /**
     * @ORM\Column(type="integer")
     */
    private $up;
    /**
     * @ORM\Column(type="integer")
     */
    private $down;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $miniature;
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
    private $status;
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
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    //endregion

    //region --------------- Properties Fonctions
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return float|null
     */
    public function getGoal(): ?float
    {
        return $this->goal;
    }

    /**
     * @param float $Objectif
     * @return $this
     */
    public function setGoal(float $Objectif): self
    {
        $this->goal = $Objectif;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getLimitDate(): ?DateTimeInterface
    {
        return $this->limitDate;
    }

    /**
     * @param DateTimeInterface $limitDate
     * @return $this
     */
    public function setLimitDate(DateTimeInterface $limitDate): self
    {
        $this->limitDate = $limitDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReport(): ?int
    {
        return $this->report;
    }

    /**
     * @param int $report
     * @return $this
     */
    public function setReport(int $report): self
    {
        $this->report = $report;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUp(): ?int
    {
        return $this->up;
    }

    /**
     * @param int $up
     * @return $this
     */
    public function setUp(int $up): self
    {
        $this->up = $up;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDown(): ?int
    {
        return $this->down;
    }

    /**
     * @param int $down
     * @return $this
     */
    public function setDown(int $down): self
    {
        $this->down = $down;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMiniature(): ?string
    {
        return $this->miniature;
    }

    /**
     * @param string|null $Minature
     * @return $this
     */
    public function setMiniature(?string $Minature): self
    {
        $this->miniature = $Minature;

        return $this;
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    /**
     * @param Subscription $subscription
     * @return $this
     */
    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
            $subscription->setProject($this);
        }

        return $this;
    }

    /**
     * @param Subscription $subscription
     * @return $this
     */
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

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return $this
     */
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

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addProject($this);
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @param Status|null $status
     * @return $this
     */
    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Donation[]
     */
    public function getDonations(): Collection
    {
        return $this->donations;
    }

    /**
     * @param Donation $donation
     * @return $this
     */
    public function addDonation(Donation $donation): self
    {
        if (!$this->donations->contains($donation)) {
            $this->donations[] = $donation;
            $donation->setProject($this);
        }

        return $this;
    }

    /**
     * @param Donation $donation
     * @return $this
     */
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

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setProject($this);
        }

        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
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

    /**
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addProject($this);
        }

        return $this;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removeProject($this);
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function __toString()
    {
        return $this->getDescription();
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    //endregion

    //region --------------- Function
    //region --------------- Constructor
    /**
     * Project constructor.
     */
    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->donations = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }
    //endregion

    /**
     * Compute the number of Donation
     * @return int
     */
    public function getNumberOfDonation(): int
    {
        return $this->getDonations()->count();
    }

    /**
     * Compute the number of Subscription
     * @return int
     */
    public function getNumberOfShares(): int
    {
        return $this->getSubscriptions()->count();
    }
    //endregion
}
