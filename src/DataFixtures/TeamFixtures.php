<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    private static $teams = [
        'The Untouchables',
        'Wild',
        'The Expendables',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$teams as $index => $name) {
            $team = new Team();
            $team->setName($name);
            $manager->persist($team);
            $this->setReference('Team_'.$index, $team);
        }

        $manager->flush();
    }
}
