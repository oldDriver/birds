<?php

namespace App\DataFixtures;

use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture
{
    private static $places = [
        'Berlin',
        'Paris',
        'London',
        'Barselona',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$places as $index => $name) {
            $place = new Place();
            $place->setName($name);
            $manager->persist($place);
            $this->setReference('Place_'.$index, $place);
        }

        $manager->flush();
    }
}
