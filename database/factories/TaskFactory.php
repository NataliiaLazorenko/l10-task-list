<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'fake' function will get us access to faker object
            // We can either use functions or properties from faker object (eg. sentence). Properties would use default.
            // Functions let us specify some options if we'd like to customize how things are generated
            'title' => fake()->sentence,
            // 'paragraph' will generate a little longer text
            'description' => fake()->paragraph,
            'long_description' => fake()->paragraph(7, true),
            // tasks would be randomly completed or not completed
            'completed' => fake()->boolean,
        ];
    }
}
