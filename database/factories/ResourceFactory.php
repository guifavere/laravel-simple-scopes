<?php

use Faker\Generator as Faker;
use GuiFavere\LaravelSimpleScopes\Tests\Resource;

$factory->define(Resource::class, fn (Faker $faker) => [
    'name' => $faker->words(3, true),
    'created_at' => $faker->dateTime(),
    'updated_at' => $faker->dateTime(),
]);
