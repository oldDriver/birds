<?php

namespace App\DataFixtures;

use App\Entity\Rank;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RankFixtures extends Fixture
{
    private static $ranks = [
        [
            'name' => 'Рекурут',
            'ranking' => 1,
        ],
        [
            'name' => 'Солдат',
            'ranking' => 2,
        ],
        [
            'name' => 'Старший солдат',
            'ranking' => 3,
        ],
        [
            'name' => 'Молодший сержант',
            'ranking' => 4,
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$ranks as $index => $item) {
            $rank = new Rank();
            $rank->setName($item['name']);
            $rank->setRanking($item['ranking']);
            $manager->persist($rank);
            $this->setReference('Rank_'.$index, $rank);

        }
        $manager->flush();
    }
}
