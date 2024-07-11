<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Bird::class, mappedBy: 'place')]
    private Collection $birds;

    #[ORM\OneToMany(targetEntity: Battery::class, mappedBy: 'place')]
    private Collection $batteries;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->birds = new ArrayCollection();
        $this->batteries = new ArrayCollection();
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
            $bird->setPlace($this);
        }

        return $this;
    }

    public function removeBird(Bird $bird): static
    {
        if ($this->birds->removeElement($bird)) {
            // set the owning side to null (unless already changed)
            if ($bird->getPlace() === $this) {
                $bird->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Battery>
     */
    public function getBatteries(): Collection
    {
        return $this->batteries;
    }

    public function addBattery(Battery $battery): static
    {
        if (!$this->batteries->contains($battery)) {
            $this->batteries->add($battery);
            $battery->setPlace($this);
        }

        return $this;
    }

    public function removeBattery(Battery $battery): static
    {
        if ($this->batteries->removeElement($battery)) {
            // set the owning side to null (unless already changed)
            if ($battery->getPlace() === $this) {
                $battery->setPlace(null);
            }
        }

        return $this;
    }
}
