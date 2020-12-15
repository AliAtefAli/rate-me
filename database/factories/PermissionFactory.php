<?php

use App\Models\Permission;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Permission::class, function (Faker $faker) {
    return [
        'name' => 'permission',
        'display_name' => 'permission display name',
        'description' => 'permission description',
    ];
});
