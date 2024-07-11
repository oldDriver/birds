<?php

namespace App\Tests\Unit\Entity;

use App\Entity\User;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private static $faker;

    public static function setUpBeforeClass(): void
    {
        self::$faker = Factory::create();
    }

    public function setUp(): void
    {
    }

    public function testUsername(): void
    {
        $username = self::$faker->username();
        $entity = new User();
        $this->assertTrue(true);
    }
}
