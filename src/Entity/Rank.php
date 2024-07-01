<?php

namespace App\Entity;

use App\Repository\RankRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: RankRepository::class)]
class Rank
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $ranking = null;

    #[ORM\OneToMany(targetEntity: Military::class, mappedBy: 'rank')]
    private ArrayCollection $militaries;

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

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(int $ranking): static
    {
        $this->ranking = $ranking;

        return $this;
    }
}
