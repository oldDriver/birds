<?php

namespace App\DataFixtures;

use App\Entity\Position;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PositionFixtures extends Fixture
{
    private static $positions = [
        'водитель',
        'рядовой',
        'комбат',
        'каптерщик',
        'повар',
        'оружейник'
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::$positions as $index => $name) {
            $position = new Position();
            $position->setName($name);
            $manager->persist($position);
            $this->setReference('Position_'.$index, $position);
        }

        $manager->flush();
    }
}
