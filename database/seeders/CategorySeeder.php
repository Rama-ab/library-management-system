<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Short Story',
            'History',
            'Philosophy',
            'Science',
            'Economics',
            'Art',
            'Self-Help',
            'Religion',
            'Cooking',
            'Travel'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
