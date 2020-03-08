<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
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
     * @ORM\OneToMany(targetEntity="App\Entity\Subscription", mappedBy="User", orphanRemoval=true)
     */
    private $subscriptions;

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
    private $Child;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="Child")
     */
    private $Parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="User", orphanRemoval=true)
     */
    private $comments;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
        $this->Projects = new ArrayCollection();
        $this->Donations = new ArrayCollection();
        $this->Parent = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->username;
    }

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

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getFacebookId(): ?int
    {
        return $this->facebookId;
    }

    public function setFacebookId(?int $facebookId): self
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    public function getGoogleId(): ?int
    {
        return $this->googleId;
    }

    public function setGoogleId(?int $googleId): self
    {
        $this->googleId = $googleId;

        return $this;
    }

    public function getAppleId(): ?int
    {
        return $this->appleId;
    }

    public function setAppleId(?int $appleId): self
    {
        $this->appleId = $appleId;

        return $this;
    }

    public function getInstagramId(): ?int
    {
        return $this->instagramId;
    }

    public function setInstagramId(?int $instagramId): self
    {
        $this->instagramId = $instagramId;

        return $this;
    }

    public function getLinkedinId(): ?int
    {
        return $this->linkedinId;
    }

    public function setLinkedinId(int $linkedinId): self
    {
        $this->linkedinId = $linkedinId;

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
            $subscription->setUser($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->contains($subscription)) {
            $this->subscriptions->removeElement($subscription);
            // set the owning side to null (unless already changed)
            if ($subscription->getUser() === $this) {
                $subscription->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->Projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->Projects->contains($project)) {
            $this->Projects[] = $project;
            $project->setUser($this);
        }

        return $this;
    }

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

    public function addDonation(Donation $donation): self
    {
        if (!$this->Donations->contains($donation)) {
            $this->Donations[] = $donation;
            $donation->setUser($this);
        }

        return $this;
    }

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

    public function addParent(self $parent): self
    {
        if (!$this->Parent->contains($parent)) {
            $this->Parent[] = $parent;
            $parent->setChild($this);
        }

        return $this;
    }

    public function removeParent(self $parent): self
    {
        if ($this->Parent->contains($parent)) {
            $this->Parent->removeElement($parent);
            // set the owning side to null (unless already changed)
            if ($parent->getChild() === $this) {
                $parent->setChild(null);
            }
        }

        return $this;
    }

    public function getChild(): ?self
    {
        return $this->Child;
    }

    public function setChild(?self $Child): self
    {
        $this->Child = $Child;

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
            $comment->setUser($this);
        }

        return $this;
    }

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
