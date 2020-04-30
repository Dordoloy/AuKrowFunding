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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $miniature;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="ProjectsList")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statu;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Donation", mappedBy="ProjectParent")
     */
    private $donations;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="Project", orphanRemoval=true)
     */
    private $comments;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reward", mappedBy="Project", orphanRemoval=true)
     */
    private $rewards;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProjectLike", mappedBy="projectliked", orphanRemoval=true, cascade={"persist"})
     */
    private $userProjectLikes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProjectDislike", mappedBy="project", orphanRemoval=true, cascade={"persist"})
     */
    private $userProjectDislikes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProjectSubscription", mappedBy="project", orphanRemoval=true, cascade={"persist"})
     */
    private $userProjectSubscriptions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="projects")
     */
    private $categories;
    //endregion

    //region --------------- Properties
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
     * @param float $Goal
     * @return $this
     */
    public function setGoal(float $Goal): self
    {
        $this->goal = $Goal;

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
        return $this->getLikep()->count();
    }

    /**
     * @return int|null
     */
    public function getDown(): ?int
    {
        return $this->getDislike()->count();
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
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Status|null
     */
    public function getStatu(): ?Status
    {
        return $this->statu;
    }

    /**
     * @param Status|null $statu
     * @return $this
     */
    public function setStatu(?Status $statu): self
    {
        $this->statu = $statu;

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
            $donation->setProjectParent($this);
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
            if ($donation->getProjectParent() === $this) {
                $donation->setProjectParent(null);
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

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
        $this->tags = new ArrayCollection();
        $this->donations = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->userProjectLikes = new ArrayCollection();
        $this->userProjectDislikes = new ArrayCollection();
        $this->userProjectSubscriptions = new ArrayCollection();
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
        return $this->getSubscribe()->count();
    }

    /**
     * @return Collection|Reward[]
     */
    public function getRewards(): Collection
    {
        return $this->rewards;
    }

    public function addReward(Reward $reward): self
    {
        if (!$this->rewards->contains($reward)) {
            $this->rewards[] = $reward;
            $reward->setProject($this);
        }

        return $this;
    }

    public function removeReward(Reward $reward): self
    {
        if ($this->rewards->contains($reward)) {
            $this->rewards->removeElement($reward);
            // set the owning side to null (unless already changed)
            if ($reward->getProject() === $this) {
                $reward->setProject(null);
            }
        }

        return $this;
    }

    public function getRest(): float
    {
        $total = 0;
        foreach ($this->getDonations() as $don) {
            $total += $don->getAmount();
        }
        $rest = $this->getGoal() - $total;
        return $this->getGoal() - $total;
    }

    //endregion

    /**
     * @return Collection|User[]
     */
    public function getLikep(): Collection
    {
        $users = [];
        foreach ($this->getUserProjectLikes() as $userProjectLike) {
            array_push($users, $userProjectLike->getUser());
        }
        return new ArrayCollection($users);
    }

    public function addLikep(?User $user): self
    {
        if (!$this->getUserProjectLikes()->contains((new UserProjectLike())->setUser($user)->setProjectliked($this))) {
            $this->userProjectLikes->add((new userProjectLike())->setUser($user)->setProjectliked($this));
        }
        return $this;
    }

    public function removeLike(?User $user): self
    {
        foreach ($this->getUserProjectLikes() as $userProjectLike) {
            if ($userProjectLike->getUser() === $user) {
                $this->removeUserProjectLike($userProjectLike);
            }
        }
        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getDislike(): Collection
    {
        $users = [];
        foreach ($this->getUserProjectDislikes() as $userProjectDislike) {
            array_push($users, $userProjectDislike->getUser());
        }
        return new ArrayCollection($users);
    }

    public function addDislike(?User $user): self
    {
        if (!$this->getUserProjectDislikes()->contains((new UserProjectDislike())->setUser($user)->setProject($this))) {
            $this->userProjectDislikes->add((new UserProjectDislike())->setUser($user)->setProject($this));
        }
        return $this;
    }

    public function removeDislike(?User $user): self
    {
        foreach ($this->getUserProjectDislikes() as $projectDislike) {
            if ($projectDislike->getUser() === $user) {
                $this->removeUserProjectDislike($projectDislike);
            }
        }
        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getSubscribe(): Collection
    {
        $users = [];
        foreach ($this->getUserProjectSubscriptions() as $userProjectSubscription) {
            array_push($users, $userProjectSubscription->getUser());
        }
        return new ArrayCollection($users);
    }

    public function addSubscribe(User $user): self
    {
        if (!$this->getUserProjectSubscriptions()->contains((new UserProjectSubscription())->setUser($user)->setProject($this))) {
            $this->userProjectSubscriptions->add((new UserProjectSubscription())->setUser($user)->setProject($this));
        }

        return $this;
    }

    public function removeSubscribe(User $user): self
    {
        foreach ($this->getUserProjectSubscriptions() as $projectSubscription) {
            if ($projectSubscription->getUser() === $user) {
                $this->removeUserProjectSubscription($projectSubscription);
            }
        }
        return $this;
    }

    /**
     * @return Collection|UserProjectLike[]
     */
    public function getUserProjectLikes(): Collection
    {
        return $this->userProjectLikes;
    }

    public function addUserProjectLike(UserProjectLike $userProjectLike): self
    {
        if (!$this->userProjectLikes->contains($userProjectLike)) {
            $this->userProjectLikes[] = $userProjectLike;
            $userProjectLike->setProjectliked($this);
        }

        return $this;
    }

    public function removeUserProjectLike(UserProjectLike $userProjectLike): self
    {
        if ($this->userProjectLikes->contains($userProjectLike)) {
            $this->userProjectLikes->removeElement($userProjectLike);
            // set the owning side to null (unless already changed)
            if ($userProjectLike->getProjectliked() === $this) {
                $userProjectLike->setProjectliked(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserProjectDislike[]
     */
    public function getUserProjectDislikes(): Collection
    {
        return $this->userProjectDislikes;
    }

    public function addUserProjectDislike(UserProjectDislike $userProjectDislike): self
    {
        if (!$this->userProjectDislikes->contains($userProjectDislike)) {
            $this->userProjectDislikes[] = $userProjectDislike;
            $userProjectDislike->setProject($this);
        }

        return $this;
    }

    public function removeUserProjectDislike(UserProjectDislike $userProjectDislike): self
    {
        if ($this->userProjectDislikes->contains($userProjectDislike)) {
            $this->userProjectDislikes->removeElement($userProjectDislike);
            // set the owning side to null (unless already changed)
            if ($userProjectDislike->getProject() === $this) {
                $userProjectDislike->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserProjectSubscription[]
     */
    public function getUserProjectSubscriptions(): Collection
    {
        return $this->userProjectSubscriptions;
    }

    public function addUserProjectSubscription(UserProjectSubscription $userProjectSubscription): self
    {
        if (!$this->userProjectSubscriptions->contains($userProjectSubscription)) {
            $this->userProjectSubscriptions[] = $userProjectSubscription;
            $userProjectSubscription->setProject($this);
        }

        return $this;
    }

    public function removeUserProjectSubscription(UserProjectSubscription $userProjectSubscription): self
    {
        if ($this->userProjectSubscriptions->contains($userProjectSubscription)) {
            $this->userProjectSubscriptions->removeElement($userProjectSubscription);
            // set the owning side to null (unless already changed)
            if ($userProjectSubscription->getProject() === $this) {
                $userProjectSubscription->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function __toString()
    {
        return $this->getTitle();
    }

}
