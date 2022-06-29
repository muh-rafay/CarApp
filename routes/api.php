<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\MainController;
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


Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [LoginController::class, 'register']);

});


Route::group([
    'middleware' => 'jwt.auth',
], function ($router) {
   Route::get('get-category', [MainController::class, 'getCategory']);
    Route::post('add-category', [MainController::class, 'addCategory']);
    Route::post('edit-category', [MainController::class, 'editCategory']);
    Route::get('get-cars', [MainController::class, 'getCars']);
    Route::post('add-car', [MainController::class, 'addCar']);
    Route::post('edit-car', [MainController::class, 'editCar']);
});
