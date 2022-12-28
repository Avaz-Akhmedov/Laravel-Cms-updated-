<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        Category::query()->insert([
            [
                'name' => 'sport',
                'is_active' => true
            ],
            [
                'name' => 'health',
                'is_active' => true
            ],
            [
                'name' => 'education',
                'is_active' => true
            ],
            [
                'name' => 'lifestyle',
                'is_active' => true
            ],
            [
                'name' => 'technology',
                'is_active' => true
            ],
            [
                'name' => 'cooking',
                'is_active' => true
            ],
        ]);
    }
}
