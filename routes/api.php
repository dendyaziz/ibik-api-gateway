<?php

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

Route::prefix('/v1')->group(function () {
    // Rute e-Learning
    Route::get('/students', fn() => Http::get(env('APP_URL_ELEARNING') . '/students')->json());
    Route::get('/students/{id}', fn($id) => Http::get(env('APP_URL_ELEARNING') . "/students/$id")->json());
    Route::post('/students', fn(Request $request) => Http::post(env('APP_URL_ELEARNING') . '/students', $request->all())->json());
    Route::put('/students/{student_number}', fn(Request $request, $studentNumber) => Http::put(env('APP_URL_ELEARNING') . "/students/$studentNumber", $request->all())->json());
    Route::delete('/students/{id}', fn($id) => Http::delete(env('APP_URL_ELEARNING') . "/students/$id")->json());

    // Rute finance
    Route::get('/bills', fn() => Http::get(env('APP_URL_FINCANCE') . '/bills')->json());
});
