<?php

use App\Models\Subscription;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'ar' => ['name' => 'الاشتراك', 'description' => 'وصف الاشتراك'],
        'en' => ['name' => 'Subscription', 'description' => 'description Subscription'],
        'from_date' => \Carbon\Carbon::now(),
        'to_date' => \Carbon\Carbon::now(),
        'payment_method' => 'paypal',

    ];
});
