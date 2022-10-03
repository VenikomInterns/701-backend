<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        collect([
            ['name' => 'Home'],
            ['name' => 'Garden'],
            ['name' => 'Building'],
            ['name' => 'Kids'],
        ])->each(function ($category) {
            return Category::query()->create($category);
        });
    }
}
