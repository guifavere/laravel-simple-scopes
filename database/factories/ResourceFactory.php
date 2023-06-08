<?php

use Faker\Generator as Faker;
use GuiFavere\LaravelSimpleScopes\Tests\Models\Resource;

$factory->define(Resource::class, fn (Faker $faker) => [
    'created_at' => $faker->dateTime(),
    'updated_at' => $faker->dateTime(),
]);
