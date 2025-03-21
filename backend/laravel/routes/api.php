<?php

use App\Adapter\Controller\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/games/search', [GameController::class, 'search']);
Route::get('/games/{id}', [GameController::class, 'get'])
    ->where(['id' => '[0-9]+']);