<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserSnippetRepository")
 */
class UserSnippet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userSnippets")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Snippet", inversedBy="userSnippets")
     */
    private $snippet;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSnippet(): ?Snippet
    {
        return $this->snippet;
    }

    public function setSnippet(?Snippet $snippet): self
    {
        $this->snippet = $snippet;

        return $this;
    }
}
