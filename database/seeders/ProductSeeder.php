<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($x = 1; $x < 5; $x++) {
            $category = Category::query()->find($x);

            for ($y = 0; $y < 4; $y++) {
                $category->products()->create([
                    'name' => Str::random(5),
                    'price' => 100,
                    'description' => Str::random(20),
                ]);
            } //good. but this looks more like Factory. You can use factories instead
        }
    } //good
}
