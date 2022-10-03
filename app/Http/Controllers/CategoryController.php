<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard', ['categories' => Category::all()]);
    }

    public function show(Category $category): Response //Show products in a certain category
    {
        $category_id = $category->id; // Stored as variable because it is used twice (so we don't have to call the method twice)
        $products = Product::query()->where('category_id', $category_id)->with('pictures')->simplePaginate(3);

        return Inertia::render('ProductsByCategory', ['products' => $products, 'category_id' => $category_id, 'category_name' => $category->name]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2'
        ]);
        Category::query()->create($validated);

    }

    public function update(Category $category, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2'
        ]);

        $category->update($validated);

    }

}
