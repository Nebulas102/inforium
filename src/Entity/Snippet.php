<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SnippetRepository")
 */
class Snippet
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
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="snippets")
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserSnippet", mappedBy="snippet")
     */
    private $userSnippets;

    public function __construct()
    {
        $this->userSnippets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|UserSnippet[]
     */
    public function getUserSnippets(): Collection
    {
        return $this->userSnippets;
    }

    public function addUserSnippet(UserSnippet $userSnippet): self
    {
        if (!$this->userSnippets->contains($userSnippet)) {
            $this->userSnippets[] = $userSnippet;
            $userSnippet->setSnippet($this);
        }

        return $this;
    }

    public function removeUserSnippet(UserSnippet $userSnippet): self
    {
        if ($this->userSnippets->contains($userSnippet)) {
            $this->userSnippets->removeElement($userSnippet);
            // set the owning side to null (unless already changed)
            if ($userSnippet->getSnippet() === $this) {
                $userSnippet->setSnippet(null);
            }
        }

        return $this;
    }
}
