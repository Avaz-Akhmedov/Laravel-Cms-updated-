<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(),
            "is_active" => true,
            "category_id" => Category::query()->inRandomOrder()->first()->id,
            "content" => $this->faker->paragraph(12),
        ];
    }
}
