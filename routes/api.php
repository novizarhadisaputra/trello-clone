<?php

use App\Http\Controllers\Api\CardController;
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

Route::prefix('card')->name('api.card')->group(function () {
    Route::get('/', [CardController::class, 'index'])->name('list');
    Route::post('/add', [CardController::class, 'store'])->name('store');
});
