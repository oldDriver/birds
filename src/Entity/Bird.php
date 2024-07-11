<?php

namespace App\Entity;

use App\Repository\BirdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BirdRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Bird
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $serialNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tailNumber = null;

    #[ORM\ManyToOne(targetEntity: Make::class, inversedBy: 'birds')]
    #[ORM\JoinColumn(name: 'make_id', referencedColumnName: 'id', nullable: false)]
    private Make $make;

    #[ORM\ManyToOne(targetEntity: Model::class, inversedBy: 'birds')]
    #[ORM\JoinColumn(name: 'model_id', referencedColumnName: 'id', nullable: false)]
    private Model $model;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'birds')]
    #[ORM\JoinColumn(name: 'status_id', referencedColumnName: 'id', nullable: false)]
    private Status $status;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'birds')]
    #[ORM\JoinColumn(name: 'team_id', referencedColumnName: 'id', nullable: false)]
    private Team $team;

    #[ORM\OneToMany(targetEntity: Battery::class, mappedBy: 'bird')]
    private Collection $batteries;

    #[ORM\ManyToOne(targetEntity: Place::class, inversedBy: 'birds')]
    #[ORM\JoinColumn(name: 'place_id', referencedColumnName: 'id')]
    private Place $place;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
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

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(string $serialNumber): static
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

    public function getTailNumber(): ?string
    {
        return $this->tailNumber;
    }

    public function setTailNumber(?string $tailNumber): static
    {
        $this->tailNumber = $tailNumber;

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

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

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
            $battery->setBird($this);
        }

        return $this;
    }

    public function removeBattery(Battery $battery): static
    {
        if ($this->batteries->removeElement($battery)) {
            // set the owning side to null (unless already changed)
            if ($battery->getBird() === $this) {
                $battery->setBird(null);
            }
        }

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): static
    {
        $this->place = $place;

        return $this;
    }
}
