<?php

use App\Models\Subscription;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'ar' => ['name' => 'الاشتراك', 'description' => 'وصف الاشتراك'],
        'en' => ['name' => 'Subscription', 'description' => 'description Subscription'],
        'payment_method' => 'paypal',
        'start_date' => \Carbon\Carbon::now(),
        'end_date' => \Carbon\Carbon::now()->addDays(30),

    ];
});
