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
        \App\Models\Product::factory(1000)->create();
    }
}
