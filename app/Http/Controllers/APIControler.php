<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class APIControler extends Controller
{
    public function products(Category $category): JsonResource
    {
        $products = Product::query()->where('category_id', $category->id)->with('pictures')->get();
        return JsonResource::make($products);
    }

    public function categories(): JsonResource
    {
        return JsonResource::make(Category::all());
    }
}
