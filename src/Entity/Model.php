<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Model
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Bird::class, mappedBy: 'model')]
    private Collection $birds;

    #[ORM\ManyToOne(targetEntity: Make::class, inversedBy: 'models')]
    #[ORM\JoinColumn(name: 'model_id', referencedColumnName: 'id')]
    private Make $make;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->birds = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Bird>
     */
    public function getBirds(): Collection
    {
        return $this->birds;
    }

    public function addBird(Bird $bird): static
    {
        if (!$this->birds->contains($bird)) {
            $this->birds->add($bird);
            $bird->setModel($this);
        }

        return $this;
    }

    public function removeBird(Bird $bird): static
    {
        if ($this->birds->removeElement($bird)) {
            // set the owning side to null (unless already changed)
            if ($bird->getModel() === $this) {
                $bird->setModel(null);
            }
        }

        return $this;
    }

    public function getMake(): ?Make
    {
        return $this->make;
    }

    public function setMake(?Make $make): static
    {
        $this->make = $make;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
