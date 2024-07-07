<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private static $users = [
        [
            'username' => 'admin',
            'password' => 'admin',
            'roles' => ['ROLE_ADMIN'],
        ],
        [
            'username' => 'user',
            'password' => 'user',
            'roles' => [],
        ],
    ];

    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
        // /parent::__construct();
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::$users as $item) {
            $user = new User();
            $user->setUsername($item['username']);
            $hashedPassword = $this->passwordHasher->hashPassword($user, $item['password']);
            $user->setPassword($hashedPassword);
            $user->setRoles($item['roles']);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
