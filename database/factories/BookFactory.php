<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [

            /*Chat-Gpt Prompt:
            Can I create fake links in the seeder?
            */
            
            'title'=>fake()->sentence(),
            'summary'=>$this->getSummary(),
            'author'=>fake()->name(),
            'amazon_link' => "https://www.amazon.com/dp/" . Str::random(10) . "?tag=your-affiliate-id",

        ];
    }

    private function getSummary(): string
    {
        $summary ='';
        for($x = 0; $x < rand(1,3); $x++){
            $summary.= '<p>'.fake()->realTextBetween(100,450).'</p>';
        }

        return $summary;
    }
}
