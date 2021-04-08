<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\MenuItem;
use App\Models\MealType;
use App\Models\Product;
use App\Models\Shipping;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [App\Http\Controllers\UsersController::class, 'register']);

Route::group(['middleware' => ['auth:api']], function () {
  Route::post('/logout', [App\Http\Controllers\UsersController::class, 'logout']);

// TODO:
    // Protected with Auth:
        // GET /store/cart
        // POST /store/cart/update
        // GET /store/cart/purchase
//     Route:get('/store/cart', function () {
//         // get all menu section types
//         return Cart::with('user_cart', 'cart_product')->where("meal_type_id",$type)->latest()->first();
//     });
});

// /api/menu/

Route::get('/menu/section', function () {
    // get all menu section types
    return MealType::all()->random(1);
});
Route::get('/menu/sections', function () {
    // get all menu section types
    return MealType::all();
});
Route::get('/menu/item', function () {
    // get one unique item
    return MenuItem::with('mealType')->get()->random(1);
});
Route::get('/menu/items/{amount}', function (Request $request, $amount) {
    // create a collection of unique items 
    return MenuItem::with('mealType')->get()->random($amount);
});
Route::get('/menu/type/{type}', function (Request $request, $type) {
    // TODO: fail safely, use find instead of where
    // get 10 random meals of a specific type
    return MenuItem::with('mealType')->where("meal_type_id",$type)->get()->random(10);
});

Route::get('/menu/type_amount/{type}/{amount}', function (Request $request, $type, $amount) {
    // get 10 random meals of a specific type
    if($amount <= 10) {
        return MenuItem::with('mealType')->where("meal_type_id",$type)->get()->random($amount);     
    }
    return "Request too large, try again with a smaller amount.";
});

// /api/store
Route::get('/store/products', function () {
    // get all menu section types
    return Product::all();
});
Route::get('/store/shipping', function () {
    // get all menu section types
    return Shipping::all();
});

