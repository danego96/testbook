<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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

Route::delete('/groups/{group}', [GroupController::class, 'destroy']);

Route::get('/students',[StudentController::class, 'index']);

Route::get('/students/{student}',[StudentController::class, 'show']);

Route::get('/students/create',[StudentController::class, 'create']);

Route::post('/students',[StudentController::class, 'store']);

Route::get('/students/{student}/edit',[StudentController::class, 'edit']);

Route::put('/students/{student}', [StudentController::class, 'update']);

Route::delete('/students/{student}', [StudentController::class, 'destroy']);

Route::get('/groups/{group}', [GroupController::class, 'show']);

Route::get('/subjects',[SubjectController::class, 'index']);

Route::get('/subjects/create',[SubjectController::class, 'create']);

Route::post('/subjects',[SubjectController::class, 'store']);

Route::get('/subjects/{subject}/edit',[SubjectController::class, 'edit']);

Route::put('/subjects/{subject}', [SubjectController::class, 'update']);

Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy']);

Route::get('/students/{student}/marks/create',[MarkController::class, 'create']);

Route::post('/students/{student}/marks',[MarkController::class, 'store']);