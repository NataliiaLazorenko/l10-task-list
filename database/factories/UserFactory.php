<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // 'definition' method - is the basic definition of what should we put into every single field of this database table
    // We can skip optional fields, but set some value for all the required fields
    public function definition(): array
    {
        return [
            // 'fake' function - uses PHP library 'Faker' and lets us generate some fake data
            // 'fake' returns, an object, which has methods and can generate names, emails, date etc.
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(), // will generate random, but unique emails
            'email_verified_at' => now(), // generates date
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // hashed password
            'remember_token' => Str::random(10), // the built in Laravel 'random' function generates a random string.
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    // 'unverified' is an example of custom method we can create on our own to reflect some specific states that we need.
    // This method will use all the properties the same way as in this definition method,
    // but will set 'email_verified_at' to Null. This way we can generate some unverified users
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
