<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->create([
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);

        \App\Models\User::factory(1)->create([
            'email' => 'member@example.com',
            'role' => 'member'
        ]);
        // ProductFactory doesn't work for storing images in local storage because a problem in faker.
        \App\Models\Product::factory(100)->create();
    }
}
