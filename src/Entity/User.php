<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(columns={"username", "email"})})
 */
class User implements UserInterface
{
    //region -------------------- Properties
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $facebookId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $googleId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $appleId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $instagramId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $linkedinId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="user", orphanRemoval=true)
     */
    private $Projects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Donation", mappedBy="user", orphanRemoval=true)
     */
    private $Donations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Parent")
     */
    private $Children;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="Children")
     */
    private $Parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="User", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProjectLike", mappedBy="user", orphanRemoval=true ,cascade={"persist"})
     */
    private $userProjectLikes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProjectDislike", mappedBy="user", orphanRemoval=true ,cascade={"persist"})
     */
    private $userProjectDislikes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProjectSubscription", mappedBy="user", orphanRemoval=true ,cascade={"persist"})
     */
    private $userProjectSubscriptions;

    //endregion

    //region -------------------- Function
    public function __construct()
    {
        $this->Projects = new ArrayCollection();
        $this->Donations = new ArrayCollection();
        $this->Parent = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->userProjectLikes = new ArrayCollection();
        $this->userProjectDislikes = new ArrayCollection();
        $this->userProjectSubscriptions = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param array $roles
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->Email;
    }

    /**
     * @param string|null $Email
     * @return $this
     */
    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFacebookId(): ?int
    {
        return $this->facebookId;
    }

    /**
     * @param int|null $facebookId
     * @return $this
     */
    public function setFacebookId(?int $facebookId): self
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGoogleId(): ?int
    {
        return $this->googleId;
    }

    /**
     * @param int|null $googleId
     * @return $this
     */
    public function setGoogleId(?int $googleId): self
    {
        $this->googleId = $googleId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAppleId(): ?int
    {
        return $this->appleId;
    }

    /**
     * @param int|null $appleId
     * @return $this
     */
    public function setAppleId(?int $appleId): self
    {
        $this->appleId = $appleId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getInstagramId(): ?int
    {
        return $this->instagramId;
    }

    /**
     * @param int|null $instagramId
     * @return $this
     */
    public function setInstagramId(?int $instagramId): self
    {
        $this->instagramId = $instagramId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLinkedinId(): ?int
    {
        return $this->linkedinId;
    }

    /**
     * @param int $linkedinId
     * @return $this
     */
    public function setLinkedinId(int $linkedinId): self
    {
        $this->linkedinId = $linkedinId;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->Projects;
    }

    /**
     * @param Project $project
     * @return $this
     */
    public function addProject(Project $project): self
    {
        if (!$this->Projects->contains($project)) {
            $this->Projects[] = $project;
            $project->setUser($this);
        }

        return $this;
    }

    /**
     * @param Project $project
     * @return $this
     */
    public function removeProject(Project $project): self
    {
        if ($this->Projects->contains($project)) {
            $this->Projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getUser() === $this) {
                $project->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Donation[]
     */
    public function getDonations(): Collection
    {
        return $this->Donations;
    }

    /**
     * @param Donation $donation
     * @return $this
     */
    public function addDonation(Donation $donation): self
    {
        if (!$this->Donations->contains($donation)) {
            $this->Donations[] = $donation;
            $donation->setUser($this);
        }

        return $this;
    }

    /**
     * @param Donation $donation
     * @return $this
     */
    public function removeDonation(Donation $donation): self
    {
        if ($this->Donations->contains($donation)) {
            $this->Donations->removeElement($donation);
            // set the owning side to null (unless already changed)
            if ($donation->getUser() === $this) {
                $donation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getParent(): Collection
    {
        return $this->Parent;
    }

    /**
     * @param User $parent
     * @return $this
     */
    public function addParent(self $parent): self
    {
        if (!$this->Parent->contains($parent)) {
            $this->Parent[] = $parent;
            $parent->setChildren($this);
        }

        return $this;
    }

    /**
     * @param User $parent
     * @return $this
     */
    public function removeParent(self $parent): self
    {
        if ($this->Parent->contains($parent)) {
            $this->Parent->removeElement($parent);
            // set the owning side to null (unless already changed)
            if ($parent->getChildren() === $this) {
                $parent->setChildren(null);
            }
        }

        return $this;
    }

    /**
     * @return $this|null
     */
    public function getChildren(): ?self
    {
        return $this->Children;
    }

    /**
     * @param User|null $Children
     * @return $this
     */
    public function setChildren(?self $Children): self
    {
        $this->Children = $Children;

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
            $comment->setUser($this);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getUsername();
    }


    /**
     * Get all project how the current user participate
     * @return ArrayCollection
     */
    public function getFinancedProject()
    {
        return $this->Projects;
    }

    //endregion


    /**
     * @return string|null
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @param string|null $picture
     * @return $this
     */
    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjectsLiked(): Collection
    {
        $projects = new ArrayCollection();
        foreach ($this->getUserProjectLikes() as $item) {
            $projects->add($item->getProjectliked());
        }
        return $projects;
    }

    /**
     * @param Project $projectsLiked
     * @return $this
     */
    public function addProjectsLiked(Project $projectsLiked): self
    {
        $this->addUserProjectLike((new UserProjectLike())->setUser($this)->setProjectliked($projectsLiked));
        return $this;
    }

    /**
     * @param Project $projectsLiked
     * @return $this
     */
    public function removeProjectsLiked(Project $projectsLiked): self
    {
        $this->removeUserProjectLike((new UserProjectLike())->setUser($this)->setProjectliked($projectsLiked));
        return $this;
    }

    /**
     * @param Project $project
     * @return bool
     */
    public function isProjectLiked(Project $project): bool
    {
        return $this->getProjectsLiked()->contains($project);
    }

    /**
     * @param Project $project
     * @return bool
     */
    public function isProjectDisliked(Project $project): bool
    {
        return $this->getProjectsDisliked()->contains($project);
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjectsDisliked(): Collection
    {
        $projects = new ArrayCollection();
        foreach ($this->getUserProjectDislikes() as $item) {
            $projects->add($item->getProject());
        }
        return $projects;
    }

    /**
     * @param Project $projectsDisliked
     * @return $this
     */
    public function addProjectsDisliked(Project $projectsDisliked): self
    {
        $this->addUserProjectDislike((new UserProjectDislike())->setUser($this)->setProject($projectsDisliked));
        return $this;
    }

    /**
     * @param Project $projectsDisliked
     * @return $this
     */
    public function removeProjectsDisliked(Project $projectsDisliked): self
    {
        $this->removeUserProjectDislike((new UserProjectDislike())->setUser($this)->setProject($projectsDisliked));
        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjectSubscribed(): Collection
    {
        $projects = new ArrayCollection();
        foreach ($this->getUserProjectSubscriptions() as $item) {
            $projects->add($item->getProject());
        }
        return new ArrayCollection(array_unique($projects->toArray()));
    }

    /**
     * @param Project $project
     * @return bool
     */
    public function isProjectSubscribe(Project $project): bool
    {
        return $this->getProjectSubscribed()->contains($project);
    }

    /**
     * @param Project $projectSubscribed
     * @return $this
     */
    public function addProjectSubscribed(Project $projectSubscribed): self
    {
        $this->addUserProjectSubscription((new UserProjectSubscription())->setUser($this)->setProject($projectSubscribed));
        return $this;
    }

    /**
     * @param Project $projectSubscribed
     * @return $this
     */
    public function removeProjectSubscribed(Project $projectSubscribed): self
    {
        $this->removeUserProjectSubscription((new UserProjectSubscription())->setUser($this)->setProject($projectSubscribed));
        return $this;
    }

    /**
     * @return Collection|UserProjectLike[]
     */
    public function getUserProjectLikes(): Collection
    {
        return $this->userProjectLikes;
    }

    /**
     * @param UserProjectLike $userProjectLike
     * @return $this
     */
    public function addUserProjectLike(UserProjectLike $userProjectLike): self
    {
        if (!$this->userProjectLikes->contains($userProjectLike)) {
            $this->userProjectLikes[] = $userProjectLike;
            $userProjectLike->setUser($this);
        }

        return $this;
    }

    /**
     * @param UserProjectLike $userProjectLike
     * @return $this
     */
    public function removeUserProjectLike(UserProjectLike $userProjectLike): self
    {
        if ($this->userProjectLikes->contains($userProjectLike)) {
            $this->userProjectLikes->removeElement($userProjectLike);
            // set the owning side to null (unless already changed)
            if ($userProjectLike->getUser() === $this) {
                $userProjectLike->setUser(null);
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

    /**
     * @param UserProjectDislike $userProjectDislike
     * @return $this
     */
    public function addUserProjectDislike(UserProjectDislike $userProjectDislike): self
    {
        if (!$this->userProjectDislikes->contains($userProjectDislike)) {
            $this->userProjectDislikes[] = $userProjectDislike;
            $userProjectDislike->setUser($this);
        }

        return $this;
    }

    /**
     * @param UserProjectDislike $userProjectDislike
     * @return $this
     */
    public function removeUserProjectDislike(UserProjectDislike $userProjectDislike): self
    {
        if ($this->userProjectDislikes->contains($userProjectDislike)) {
            $this->userProjectDislikes->removeElement($userProjectDislike);
            // set the owning side to null (unless already changed)
            if ($userProjectDislike->getUser() === $this) {
                $userProjectDislike->setUser(null);
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

    /**
     * @param UserProjectSubscription $userProjectSubscription
     * @return $this
     */
    public function addUserProjectSubscription(UserProjectSubscription $userProjectSubscription): self
    {
        if (!$this->userProjectSubscriptions->contains($userProjectSubscription)) {
            $this->userProjectSubscriptions[] = $userProjectSubscription;
            $userProjectSubscription->setUser($this);
        }

        return $this;
    }

    /**
     * @param UserProjectSubscription $userProjectSubscription
     * @return $this
     */
    public function removeUserProjectSubscription(UserProjectSubscription $userProjectSubscription): self
    {
        if ($this->userProjectSubscriptions->contains($userProjectSubscription)) {
            $this->userProjectSubscriptions->removeElement($userProjectSubscription);
            // set the owning side to null (unless already changed)
            if ($userProjectSubscription->getUser() === $this) {
                $userProjectSubscription->setUser(null);
            }
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
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }
}
