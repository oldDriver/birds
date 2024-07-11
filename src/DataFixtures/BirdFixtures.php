<?php

namespace App\DataFixtures;

use App\Entity\Bird;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BirdFixtures extends Fixture implements DependentFixtureInterface
{
    private static $birds = [
        [
            'name' => 'Name 1',
            'make' => 0,
            'model' => 0,
            'status' => 0,
            'team' => 0,
            'serial' => '123456789',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$birds as $key => $item) {
            $bird = new Bird();
            $bird->setName($item['name']);
            $bird->setMake($this->getReference('Make_'.$item['make']));
            $bird->setModel($this->getReference('Model_'.$item['model']));
            $bird->setStatus($this->getReference('Status_'.$item['status']));
            $bird->setTeam($this->getReference('Team_'.$item['team']));
            $bird->setSerialNumber($item['serial']);
            $manager->persist($bird);
            $this->setReference('Bird_'.$key, $bird);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PlaceFixtures::class,
            MakeFixtures::class,
            ModelFixtures::class,
            StatusFixtures::class,
            TeamFixtures::class,
        ];
    }
}
