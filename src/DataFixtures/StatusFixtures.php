<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture
{
    private static $statuses = [
        [
            'name' => 'Active',
            'isActive' => true,
        ],
        [
            'name' => 'Lost',
            'isActive' => true,
        ],
        [
            'name' => 'Reparation',
            'isActive' => true,
        ],
        [
            'name' => 'Idle',
            'isActive' => true,
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$statuses as $index => $item) {
            $status = new Status();
            $status->setName($item['name']);
            $status->setActive($item['isActive']);
            $manager->persist($status);
            $this->setReference('Status_'.$index, $status);
        }

        $manager->flush();
    }
}
