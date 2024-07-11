<?php

namespace App\DataFixtures;

use App\Entity\Model;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModelFixtures extends Fixture
{
    private static $models = [
        [
            'make' => 0,
            'name' => 'Mavic 3',
        ],
        [
            'make' => 0,
            'name' => 'Mavic 3 Classic',
        ],
        [
            'make' => 0,
            'name' => 'Mavic 3 Pro',
        ],
        [
            'make' => 0,
            'name' => 'Mavic 3 Enterprise',
        ],
        [
            'make' => 0,
            'name' => 'Mavic 2 Enterprise',
        ],
        [
            'make' => 0,
            'name' => 'Mavic 3 Fly',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$models as $index => $item) {
            $model = new Model();
            $model->setName($item['name']);
            $model->setMake($this->getReference('Make_'.$item['make']));
            $manager->persist($model);
            $this->setReference('Model_'.$index, $model);
        }

        $manager->flush();
    }
}
