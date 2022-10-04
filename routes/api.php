<?php

use App\Http\Controllers\APIControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//when we have /products/{id}, we expect to receive productId not category_id.
Route::get('/products/{category}', [APIControler::class, 'products'])->name('Api_products');
Route::get('/categories', [APIControler::class, 'categories'])->name('Api_categories');
//its much easier if you use apiResources. Also this doesnt follow laravel route naming convetions.