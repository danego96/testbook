<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/groups',[GroupController::class, 'index']);

Route::get('/groups/create',[GroupController::class, 'create']);

Route::post('/groups',[GroupController::class, 'store']);

Route::get('/groups/{group}/edit',[GroupController::class, 'edit']);

Route::put('/groups/{group}', [GroupController::class, 'update']);