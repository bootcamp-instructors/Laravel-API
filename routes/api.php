<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\MenuItem;
use App\Models\MealType;
use App\Models\Product;
use App\Models\Shipping;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

// need to make sure this change is reflected locally


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

Route::prefix('auth')->group(function () {

    Route::post('/register', [UserController::class, 'register']);

    Route::group(['middleware' => ['auth:api']], function () {
        // gets user with all order data
        Route::get('/user', [UserController::class, 'index']);
        // log out user
        Route::get('/logout', [UserController::class, 'logout']);
    });
});

Route::prefix('menu')->group(function () {
    Route::get('/section', function () {
    // get all menu section types
    return MealType::all()->random(1);
    });
    Route::get('/sections', function () {
        // get all menu section types
        return MealType::all();
    });
    Route::get('/item', function () {
        // get one unique item
        return MenuItem::with('mealType')->get()->random(1);
    });
    Route::get('/items/{amount}', function (Request $request, $amount) {
        // create a collection of unique items 
        return MenuItem::with('mealType')->get()->random($amount);
    });
    Route::get('/type/{type}', function (Request $request, $type) {
        // TODO: fail safely, use find instead of where
        // get 10 random meals of a specific type
        return MenuItem::with('mealType')->where("meal_type_id",$type)->get()->random(10);
    });

    Route::get('/type_amount/{type}/{amount}', function (Request $request, $type, $amount) {
        // get 10 random meals of a specific type
        if($amount <= 10) {
            return MenuItem::with('mealType')->where("meal_type_id",$type)->get()->random($amount);     
        }
        return "Request too large, try again with a smaller amount.";
    });
});

Route::prefix('store')->group(function () {
    Route::get('/products', function () {
        // get all menu section types
        return Product::all();
    });
    Route::get('/shippings', function () {
        // get all menu section types
        return Shipping::all();
    });
    Route::group(['middleware' => ['auth:api']], function () {
        // get all orders from user
        Route::get('/orders', [OrderController::class, 'index']);

        Route::prefix('order')->group(function () {
            // gets current newest order from user
            Route::get('/newest', [OrderController::class, 'newest']);
            // sets purchase date on current order and creates new empty order
            Route::get('/place', [OrderController::class, 'place']);
            // updates the current purchases
            Route::get('/update', [OrderController::class, 'update']);
            // gets specific newest order from user
            Route::get('/{id}', [OrderController::class, 'getById']);
        });
     });
});
