<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostTagFactory extends Factory
{

    public function definition(): array
    {
        return [
            "post_id" => Post::query()->inRandomOrder()->first()->id,
            "tag_id" => Tag::query()->inRandomOrder()->first()->id
        ];
    }
}
