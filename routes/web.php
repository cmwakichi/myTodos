<?php

use App\Http\Controllers\StatusController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
    Route::get('todo/create', [TodoController::class,'create']);
    Route::get('/todos', [TodoController::class,'index']);
    Route::post('/todos', [TodoController::class,'store']);
    Route::delete('todos/{todo}',[TodoController::class,'destroy']);
    Route::get('/todos/{todo}/edit',[TodoController::class,'edit']);
    Route::patch('/todos/{todo}', [TodoController::class, 'update']);
    Route::get('/status/create',[StatusController::class,'create']);
    Route::get('/status',[StatusController::class,'index']);
    Route::post('/status',[StatusController::class,'store']);
    Route::get('/statuses/{status}', [StatusController::class, 'show']);
});
