<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Menu::class, function (Faker $faker) {
    return [
        'ar' => ['name' => 'اسم المنيو'],
        'en' => ['name' => 'menu name'],
        'store_id' => $faker->numberBetween(1, 15),

    ];
});
