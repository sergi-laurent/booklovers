<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*Chat-gpt prompt: I want to create random codes for each group. 
        How do I adapt the GroupFactory to create random 6 digit codes, for example 98F81X:*/

        return [
            
            'name'=>fake()->city(),
            'description'=>fake()->sentence(),
            'code' => strtoupper(fake()->bothify('?#?#?#')), // Generates a mix of numbers and uppercase letters
        ];
    }
}
