<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Cronaca','Cultura e Cinema','Fotografia','Sport'];
        for($index = 0; $index < count($categories); $index++){
            $newCategory = new Category();
            $newCategory->name = $categories[$index];
            $newCategory->slug = Category::generateSlug($newCategory->name);
            $newCategory->save();
        }
    }
}
