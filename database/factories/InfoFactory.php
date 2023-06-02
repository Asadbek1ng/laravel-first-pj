<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Info>
 */
class InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' =>'1685507345-44D13CD8-C8E6-461D-A9AD-49E823A223D3.jpeg',
            'title' =>Str::random(10),
            'describtion' =>Str::random(10),

        ];
    }
}
