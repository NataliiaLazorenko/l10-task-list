<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 'factory' method lets us specify how many models we want to generate
        // 'create' method would create those models and store them inside the database
        \App\Models\User::factory(10)->create();
        // To generate models that would have 'unverified' state ('email_verified_at' column would be null),
        // we should call 'unverified' (the name of our custom method) method and then call 'create'
        \App\Models\User::factory(2)->unverified()->create();
        \App\Models\Task::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
