<?php

namespace App\DataFixtures;

use App\Entity\Military;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MilitaryFixtures extends Fixture implements DependentFixtureInterface
{
    private static $militaries = [
        [
            'first_name' => 'Military1',
            'middle_name' => 'J.',
            'last_name' => 'USA',
            'rank' => 0,
            'position' => 4,
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$militaries as $index => $item) {
            $military = new Military();
            $military->setFirstName($item['first_name']);
            $military->setMiddleName($item['middle_name']);
            $military->setLastName($item['last_name']);
            $military->setRank($this->getReference('Rank_'.$item['rank']));
            $military->setPosition($this->getReference('Position_'.$item['position']));
            $manager->persist($military);
            $this->setReference('Military_'.$index, $military);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RankFixtures::class,
            PositionFixtures::class,
            TeamFixtures::class,
        ];
    }
}
