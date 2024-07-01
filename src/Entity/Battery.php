<?php

namespace App\Entity;

use App\Repository\BatteryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BatteryRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Battery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $serialNumber = null;

    #[ORM\ManyToOne(targetEntity: BatteryType::class, inversedBy: 'batteries')]
    #[ORM\JoinColumn(name: 'type_id', referencedColumnName: 'id')]
    private \BatteryType $type;

    #[ORM\ManyToOne(targetEntity: Bird::class, inversedBy: 'batteries')]
    #[ORM\JoinColumn(name: 'bird_id', referencedColumnName: 'id')]
    private \Bird $bird;

    #[ORM\ManyToOne(targetEntity: Place::class, inversedBy: 'batteries')]
    #[ORM\JoinColumn(name: 'place_id', referencedColumnName: 'id')]
    private \Place $place;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

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

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(string $serialNumber): static
    {
        $this->serialNumber = $serialNumber;

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
}
