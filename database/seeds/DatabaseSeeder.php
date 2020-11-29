<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        factory(\App\Models\User::class, 50)->create();
//        factory(\App\Models\Category::class, 5)->create();
//        factory(\App\Models\Store::class, 15)->create();
//        factory(\App\Models\Menu::class, 50)->create();
//        factory(\App\Models\Product::class, 200)->create();
        factory(\App\Models\Setting::class)->create();
//        factory(\App\Models\Subscription::class, 3)->create();
    }
}
