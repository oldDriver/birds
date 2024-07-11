<?php

namespace App\DataFixtures;

use App\Entity\BatteryType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BatteryTypeFixtures extends Fixture
{
    private static $types = [
        'NiCd',
        'LiPo',
        'NCM',
        'LiFePO4',
        'LiIon',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$types as $key => $name) {
            $type = new BatteryType();
            $type->setName($name);
            $manager->persist($type);
            $this->setReference('BatteryType_'.$key, $type);
        }

        $manager->flush();
    }
}
