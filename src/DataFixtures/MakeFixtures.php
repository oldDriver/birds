<?php

namespace App\DataFixtures;

use App\Entity\Make;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MakeFixtures extends Fixture
{
    private static $makes = [
        'DJI',
        'Autel Robotics',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$makes as $key => $name) {
            $object = new Make();
            $object->setName($name);
            $manager->persist($object);
            $this->addReference('Make_'.$key, $object);
        }

        $manager->flush();
    }
}
