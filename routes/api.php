<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\MenuItem;

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

Route::prefix('/menu')->group(function () {
    Route::get('/{amount}', function (Request $request, $amount) {
        // create a random collection of unique items
        // $menuItems = [];
        // for($i = 0; $i<$amount;$i++){
        //     MenuItem::get()->random()
        // }
        // return $menuItems;
        return MenuItem::all();
    }); 
    Route::get('/sections', function () {
        return MealType::all();
    });
    Route::get('/', function () {
        return MenuItem::all();
    }); 
});