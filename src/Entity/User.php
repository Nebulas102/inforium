<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="user")
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Course", mappedBy="author")
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCourse", mappedBy="user")
     */
    private $userCourses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Invoice", mappedBy="user")
     */
    private $invoices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Snippet", mappedBy="author")
     */
    private $snippets;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserSnippet", mappedBy="user")
     */
    private $userSnippets;

    public function __construct()
    {
        parent::__construct();
        $this->posts = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->userCourses = new ArrayCollection();
        $this->invoices = new ArrayCollection();
        $this->snippets = new ArrayCollection();
        $this->userSnippets = new ArrayCollection();
        // your own logic
    }

    /**
     * @return TutorialCollection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setUser($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getUser() === $this) {
                $post->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return TutorialCollection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setAuthor($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            // set the owning side to null (unless already changed)
            if ($course->getAuthor() === $this) {
                $course->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return TutorialCollection|UserCourse[]
     */
    public function getUserCourses(): Collection
    {
        return $this->userCourses;
    }

    public function addUserCourse(UserCourse $userCourse): self
    {
        if (!$this->userCourses->contains($userCourse)) {
            $this->userCourses[] = $userCourse;
            $userCourse->setUser($this);
        }

        return $this;
    }

    public function removeUserCourse(UserCourse $userCourse): self
    {
        if ($this->userCourses->contains($userCourse)) {
            $this->userCourses->removeElement($userCourse);
            // set the owning side to null (unless already changed)
            if ($userCourse->getUser() === $this) {
                $userCourse->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return TutorialCollection|Invoice[]
     */
    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    public function addInvoice(Invoice $invoice): self
    {
        if (!$this->invoices->contains($invoice)) {
            $this->invoices[] = $invoice;
            $invoice->setUser($this);
        }

        return $this;
    }

    public function removeInvoice(Invoice $invoice): self
    {
        if ($this->invoices->contains($invoice)) {
            $this->invoices->removeElement($invoice);
            // set the owning side to null (unless already changed)
            if ($invoice->getUser() === $this) {
                $invoice->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Snippet[]
     */
    public function getSnippets(): Collection
    {
        return $this->snippets;
    }

    public function addSnippet(Snippet $snippet): self
    {
        if (!$this->snippets->contains($snippet)) {
            $this->snippets[] = $snippet;
            $snippet->setAuthor($this);
        }

        return $this;
    }

    public function removeSnippet(Snippet $snippet): self
    {
        if ($this->snippets->contains($snippet)) {
            $this->snippets->removeElement($snippet);
            // set the owning side to null (unless already changed)
            if ($snippet->getAuthor() === $this) {
                $snippet->setAuthor(null);
            }
        }

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
            $userSnippet->setUser($this);
        }

        return $this;
    }

    public function removeUserSnippet(UserSnippet $userSnippet): self
    {
        if ($this->userSnippets->contains($userSnippet)) {
            $this->userSnippets->removeElement($userSnippet);
            // set the owning side to null (unless already changed)
            if ($userSnippet->getUser() === $this) {
                $userSnippet->setUser(null);
            }
        }

        return $this;
    }
}