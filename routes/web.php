<?php

use App\Http\Controllers\MineController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MineController::class, 'index']);
Route::get('/click/{id}', [MineController::class, 'click'])->name('click');
