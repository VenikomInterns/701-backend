<?php

namespace Database\Seeders;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($x = 1; $x < 17; $x++) {
            $product = Product::query()->find($x);

            for ($y = 0; $y < 2; $y++) {
                $product->pictures()->create([
                    'path' => '../storage/images/salt_shaker.jpg'
                ]);
            }
        }
    }
}
