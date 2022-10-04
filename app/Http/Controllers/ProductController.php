<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function show(Product $product): Response
    {

        return Inertia::render('ProductEdit', ['product' => $product, 'categories' => Category::all()]);
    }//route is show but we are returning ProductEdit? hmm 

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:2',
            'price' => 'required|integer',
            'description' => 'required|min:2',
            'category_id' => 'required|integer' //what if its not existing
        ]);

        Product::query()->create($validate);

    }

    public function update(Product $product, Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:2',
            'price' => 'required|integer',
            'description' => 'required|min:2',
            'category_id' => 'required|integer'//what if its not existing
        ]);

        $product->update($validate);

    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
