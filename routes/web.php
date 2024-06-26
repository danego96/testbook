<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/students/profile', [StudentController::class, 'viewProfile'])->name('profile');

Route::resources([
    'groups' => GroupController::class,
    'students' => StudentController::class,
    'subjects' => SubjectController::class,
]);

Route::get('/groups/{group}/table', [GroupController::class, 'table']);

/*Route::get('students/{student}/marks/create', [MarkController::class, 'create'])->name('students.marks.create');*/

Route::controller(MarkController::class)->group(function() {
    Route::get('students/{student}/marks/create', 'create')->name('students.marks.create');
    Route::post('students/{student}/marks', 'store')->name('students.marks.store');
    Route::get('students/{student}/marks/{mark}/edit','edit')->name('students.marks.edit');
    Route::put('students/{student}/marks/{mark}', 'update')->name('students.marks.update');
    Route::delete('students/{student}/marks/{mark}', 'destroy')->name('students.marks.destroy');
});


/*
Route::get('/groups', [GroupController::class, 'index'])->name('groups');

Route::get('/groups/create', [GroupController::class, 'create'])->middleware('auth');

Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');

Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->middleware('auth');

Route::put('/groups/{group}', [GroupController::class, 'update']);

Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->name('students');

Route::get('/students/create', [StudentController::class, 'create'])->middleware('auth');

Route::get('/students/{student}', [StudentController::class, 'show']);

Route::post('/students', [StudentController::class, 'store']);

Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->middleware('auth');

Route::put('/students/{student}', [StudentController::class, 'update']);

Route::delete('/students/{student}', [StudentController::class, 'destroy'])->middleware('auth');
 
Route::get('/groups/{group}', [GroupController::class, 'show']);

Route::get('/subjects', [SubjectController::class, 'index']);

Route::get('/subjects/create', [SubjectController::class, 'create'])->middleware('auth');

Route::post('/subjects', [SubjectController::class, 'store']);

Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->middleware('auth');

Route::put('/subjects/{subject}', [SubjectController::class, 'update']);

Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->middleware('auth');

Route::get('/students/{student}/marks/create', [MarkController::class, 'create']);

Route::post('/students/{student}/marks', [MarkController::class, 'store']);

Route::get('/students/{student}/marks/{mark}/edit', [MarkController::class, 'edit'])->middleware('auth');

Route::put('/students/{student}/marks/{mark}', [MarkController::class, 'update']);

Route::delete('/students/{student}/marks/{mark}', [MarkController::class, 'destroy'])->middleware('auth');

Route::get('students/{student}/profile', [StudentController::class, 'view_profile'])->name('profile');*/