<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CourseRepository")
 */
class Course
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="courses")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Btw", inversedBy="courses")
     */
    private $btw;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCourse", mappedBy="course")
     */
    private $userCourses;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Invoice", mappedBy="course")
     */
    private $invoices;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PaymentMethod", inversedBy="courses")
     */
    private $payment_method;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TutorialCollection", mappedBy="course")
     */
    private $tutorial_collections;

    public function __construct()
    {
        $this->userCourses = new ArrayCollection();
        $this->invoices = new ArrayCollection();
        $this->payment_method = new ArrayCollection();
        $this->tutorial_collections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getBtw(): ?Btw
    {
        return $this->btw;
    }

    public function setBtw(?Btw $btw): self
    {
        $this->btw = $btw;

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
            $userCourse->setCourse($this);
        }

        return $this;
    }

    public function removeUserCourse(UserCourse $userCourse): self
    {
        if ($this->userCourses->contains($userCourse)) {
            $this->userCourses->removeElement($userCourse);
            // set the owning side to null (unless already changed)
            if ($userCourse->getCourse() === $this) {
                $userCourse->setCourse(null);
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
            $invoice->addCourse($this);
        }

        return $this;
    }

    public function removeInvoice(Invoice $invoice): self
    {
        if ($this->invoices->contains($invoice)) {
            $this->invoices->removeElement($invoice);
            $invoice->removeCourse($this);
        }

        return $this;
    }

    /**
     * @return TutorialCollection|PaymentMethod[]
     */
    public function getPaymentMethod(): Collection
    {
        return $this->payment_method;
    }

    public function addPaymentMethod(PaymentMethod $paymentMethod): self
    {
        if (!$this->payment_method->contains($paymentMethod)) {
            $this->payment_method[] = $paymentMethod;
        }

        return $this;
    }

    public function removePaymentMethod(PaymentMethod $paymentMethod): self
    {
        if ($this->payment_method->contains($paymentMethod)) {
            $this->payment_method->removeElement($paymentMethod);
        }

        return $this;
    }

    /**
     * @return TutorialCollection|TutorialCollection[]
     */
    public function getTutorialCollections(): Collection
    {
        return $this->tutorial_collections;
    }

    public function addCollection(TutorialCollection $tutorialCollection): self
    {
        if (!$this->tutorial_collections->contains($tutorialCollection)) {
            $this->tutorial_collections[] = $tutorialCollection;
            $tutorialCollection->setCourse($this);
        }

        return $this;
    }

    public function removeTutorialCollection(TutorialCollection $tutorialCollection): self
    {
        if ($this->tutorial_collections->contains($tutorialCollection)) {
            $this->tutorial_collections->removeElement($tutorialCollection);
            // set the owning side to null (unless already changed)
            if ($tutorialCollection->getCourse() === $this) {
                $tutorialCollection->setCourse(null);
            }
        }

        return $this;
    }
}
