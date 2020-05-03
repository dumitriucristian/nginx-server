<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolClassRepository")
 */
class SchoolClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"classdata"})
     */
    private $name;

    /**
     * @Groups({"classdata"})
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @Groups({"classdata"})
     * @ORM\Column(type="string", length=255)
     */
    private $class_index;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\School", inversedBy="schoolClasses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Courses", mappedBy="SchoolClass")
     */
    private $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getClassIndex(): ?string
    {
        return $this->class_index;
    }

    public function setClassIndex(string $class_index): self
    {
        $this->class_index = $class_index;

        return $this;
    }

    public function getSchool(): ?school
    {
        return $this->school;
    }

    public function setSchool(?school $school): self
    {
        $this->school = $school;

        return $this;
    }

    /**
     * @return Collection|Courses[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Courses $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setSchoolClass($this);
        }

        return $this;
    }

    public function removeCourse(Courses $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            // set the owning side to null (unless already changed)
            if ($course->getSchoolClass() === $this) {
                $course->setSchoolClass(null);
            }
        }

        return $this;
    }


}
