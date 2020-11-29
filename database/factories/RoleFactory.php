<?php

use App\Models\Role;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Role::class, function (Faker $faker) {

//    $admin = [
//        'name' => 'admin',
//    ];
//    $store = [
//        'name' => 'store',
//    ];
//    $user = [
//        'name' => 'user',
//    ];

    return [
        ['name' => 'admin'],
        ['name' => 'store'],
        ['name' => 'user'],

    ];

});
