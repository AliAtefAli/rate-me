<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'This role can make any thing in the project'
        ]);

        $owner = \App\Models\Role::create([
            'name' => 'owner',
            'display_name' => 'Store owner',
            'description' => 'This role can make any thing in his store'
        ]);
    }
}
