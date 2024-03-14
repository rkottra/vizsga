<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\RecipeController;
Route::post("recipes", [RecipeController::class, 'store']);
Route::get("recipes", [RecipeController::class, 'index']);
Route::get("recipes/{recipe}", [RecipeController::class, 'show'])->missing(function () {
    return response()->json('Nincs ilyen id-jú elem az adatbázisban', 404);
});

Route::get("recipes/{keyword}/{orderby}/{direction}", [RecipeController::class, 'search']);

Route::delete("recipes/{recipe}", [RecipeController::class, 'destroy'])->missing(function () {
    return response()->json('A recept nem létezik', 404);
});