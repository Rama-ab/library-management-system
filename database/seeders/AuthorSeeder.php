<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            'moner kfpri',
            'hala hasan',
            'ayham ibrahim',
            'ali saleh'

        ];

        foreach ($authors as $author) {
            Author::create(['name'=> $author]);
        }
    }
}
