<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryBuController;
use App\Http\Controllers\BumdesController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PerspectiveController;
use App\Http\Controllers\AnswerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
Route::controller(BumdesController::class)->group(function () {
    Route::get('bumdes', 'index');
    Route::post('bumdes', 'store');
    Route::get('bumdes/{id}', 'show');
    Route::post('bumdes/{id}', 'update');
    Route::delete('bumdes/{id}', 'destroy');
}); 
Route::controller(CategoryController::class)->group(function () {
    Route::get('category', 'index');
    Route::post('category', 'store');
    Route::get('category/{id}', 'show');
    Route::put('category/{id}', 'update');
    Route::delete('category/{id}', 'destroy');
}); 

Route::controller(CategoryBuController::class)->group(function () {
    Route::get('category_bu', 'index');
    Route::post('category_bu', 'store');
    Route::get('category_bu/{id}', 'show');
    Route::put('category_bu/{id}', 'update');
    Route::delete('category_bu/{id}', 'destroy');
}); 

Route::controller(CompanyController::class)->group(function () {
    Route::get('company', 'index');
    Route::post('company', 'store');
    Route::get('company/{id}', 'show');
    Route::put('company/{id}', 'update');
    Route::delete('company/{id}', 'destroy');
}); 

Route::controller(PartnerController::class)->group(function () {
    Route::get('partner', 'index');
    Route::post('partner', 'store');
    Route::get('partner/{id}', 'show');
    Route::put('partner/{id}', 'update');
    Route::delete('partner/{id}', 'destroy');
}); 


Route::controller(IndicatorController::class)->group(function () {
    Route::get('indicator', 'index');
    Route::post('indicator', 'store');
    Route::get('indicator/{id}', 'show');
    Route::put('indicator/{id}', 'update');
    Route::delete('indicator/{id}', 'destroy');
}); 

Route::controller(PerspectiveController::class)->group(function () {
    Route::get('perspective', 'index');
    Route::post('perspective', 'store');
    Route::get('perspective/{id}', 'show');
    Route::put('perspective/{id}', 'update');
    Route::delete('perspective/{id}', 'destroy');
}); 

Route::controller(QuestionController::class)->group(function () {
    Route::get('question', 'index');
    Route::post('question', 'store');
    Route::get('question/{id}', 'show');
    Route::put('question/{id}', 'update');
    Route::delete('question/{id}', 'destroy');
}); 


Route::controller(AnswerController::class)->group(function () {
    Route::get('answer', 'index');
    Route::post('answer', 'store');
    Route::get('answer/{id}', 'show');
    Route::put('answer/{id}', 'update');
    Route::delete('answer/{id}', 'destroy');
}); 


