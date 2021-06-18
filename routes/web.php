<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('imageUpload', [imageController::class, 'create']);
Route::post('imageUpload', [imageController::class, 'index']);
Route::get('getImage',[imageController::class, 'getLastImage']);