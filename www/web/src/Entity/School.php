<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolRepository")
 */
class School
{
    /**
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Classroom", mappedBy="school")
     */
    private $Classroomes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
        $this->class_id = new ArrayCollection();
        $this->Classroomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Classroom[]
     */
    public function getClassroomes(): Collection
    {
        return $this->Classroomes;
    }

    public function addClassroom(Classroom $Classroom): self
    {
        if (!$this->Classroomes->contains($Classroom)) {
            $this->Classroomes[] = $Classroom;
            $Classroom->setSchool($this);
        }

        return $this;
    }

    public function removeClassroom(Classroom $Classroom): self
    {
        if ($this->Classroomes->contains($Classroom)) {
            $this->Classroomes->removeElement($Classroom);
            // set the owning side to null (unless already changed)
            if ($Classroom->getSchool() === $this) {
                $Classroom->setSchool(null);
            }
        }

        return $this;
    }







}
