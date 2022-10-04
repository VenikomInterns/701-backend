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
        //what if we have thousands of products?
        return JsonResource::make($products); //when returning collection we need to use JsonResource::collection()
    }

    public function categories(): JsonResource
    {
        return JsonResource::make(Category::all()); //JsonResource::collection()
    }
}
