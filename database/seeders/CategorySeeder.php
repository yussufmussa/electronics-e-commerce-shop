<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Phones'],
            ['name' => 'Computers'],
            ['name' => 'Smart watches'],
            ['name' => 'Earphones'],
            ['name' => 'Smart tv'],
            ['name' => 'Refregirators'],
            ['name' => 'Tablets'],
            ['name' => 'Playstation'],

        ];

        
        foreach($categories as $index => $category){
            $slug = Str::slug($category['name']);
            Category::create(['name' => $category['name'], 'slug' => $slug, 'category_photo' => '']);
        }
    }
}
