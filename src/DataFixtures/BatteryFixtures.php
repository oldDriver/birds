<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BatteryFixtures extends Fixture implements DependentFixtureInterface
{
    private static $batteries = [
        [
            'type' => 0,
            'name' => '',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BatteryTypeFixtures::class,
        ];
    }
}
