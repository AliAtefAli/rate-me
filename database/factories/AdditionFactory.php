<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Addition::class, function (Faker $faker) {
    return [
        'ar' => ['name' => $faker->name, 'description' => $faker->paragraph],
        'en' => ['name' => $faker->name, 'description' => $faker->paragraph],
        'product_id' => $faker->numberBetween(1, 10),
    ];
});
