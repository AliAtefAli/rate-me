<?php

use App\Models\Role;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Role::class, function (Faker $faker) {

    return [
        'name' => 'role',
        'display_name' => 'role display name',
        'description' => 'role description',
    ];

});
